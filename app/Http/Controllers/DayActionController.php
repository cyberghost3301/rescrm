<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request; use App\Models\{Loan,Payment,LedgerEntry,Notification}; use DB;
class DayActionController extends Controller {
    public function index(){ 

        return view('dayaction.index'); 
    }

    // public function listByDay(Request $r){
    //     $r->validate(['day'=>['required','in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday']]);
    //     $loans = Loan::with('customer')
    //         ->where('weekly_installment_day',$r->day)
    //         ->where('total_amount_remaining','>',0)
    //         ->orderBy('customer_id')->get();
    //     return view('dayaction.index', compact('loans'));
    // }




public function listByDay(Request $r)
{
    $r->validate(['day'=>['required','in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday']]);

    $loans = Loan::with('customer')
        ->where('weekly_installment_day', $r->day)
        ->where('total_amount_remaining', '>', 0)
        ->orderBy('customer_id')
        ->get();

    $today = Carbon::today();
    $weekStart = $today->copy()->subDays(6); // last 7 days

    foreach ($loans as $loan) {
        $amount = LedgerEntry::where('invoice_number', $loan->invoice_number)
            ->whereBetween('entry_date', [$weekStart, $today])
            ->sum('amount');

            if ($amount >= $loan->weekly_installment_amount) {
                $loan->weekly_message = "Collection for this week has been submitted.";
                $loan->weekly_color = 'text-green-600 font-bold';
            } elseif ($amount > 0 && $amount < $loan->weekly_installment_amount) {
                $loan->weekly_message = "Weekly collection has been partly submitted.";
                $loan->weekly_color = 'text-orange-400 font-bold';
            } else {
                $loan->weekly_message = "Weekly collection for this week has not been submitted.";
                $loan->weekly_color = 'text-red-500 font-bold';
            }
    }

    return view('dayaction.index', compact('loans'));
}


    public function chargeNonPaymentPenalty(Loan $loan){
        return DB::transaction(function() use ($loan){
            $loan->weekly_skipped_installments += 1;
            $loan->non_payment_penalty += 200;
            $loan->recomputeTotals();
            $loan->ledger()->create([
                'entry_date'=>now()->toDateString(),
                'invoice_number'=>$loan->invoice_number,
                'type'=>'DR','amount'=>200,'note'=>'Non-payment penalty'
            ]);
            return redirect()->route('dayaction.index')->with('ok','Non-payment penalty charged');
        });
    }

    public function chargeLatePenalty(Loan $loan){
        return DB::transaction(function() use ($loan){
            $add = round($loan->total_amount_remaining * 0.01, 2);
            $loan->late_payment_penalty += $add;
            $loan->recomputeTotals();
            $loan->ledger()->create([
                'entry_date'=>now()->toDateString(),
                'invoice_number'=>$loan->invoice_number,
                'type'=>'DR','amount'=>$add,'note'=>'Late payment penalty (1%)'
            ]);
            return redirect()->route('dayaction.index')->with('ok','Late payment penalty charged');
        });
    }

    public function logCollection(Request $r, Loan $loan){
    
        $data = $r->validate(['amount'=>['required','numeric','gt:0'],'mode'=>['required']]);
        if ($data['amount'] > $loan->total_amount_remaining) return back()->withErrors('Amount exceeds remaining');
        return DB::transaction(function() use ($loan,$data){
            $loan->total_amount_collected += $data['amount'];
            $loan->consecutive_missed_weeks = 0;
            $loan->recomputeTotals();
            $loan->ledger()->create([
                'entry_date'=>now()->toDateString(),
                'invoice_number'=>$loan->invoice_number,
                'type'=>'CR','amount'=>$data['amount'],'note'=>'Weekly collection'
            ]);
            $loan->payments()->create([
                'due_date'=>now()->toDateString(),
                'posted_at'=>now()->toDateString(),
                'amount'=>$data['amount'],'mode'=>$data['mode'],
                'is_late'=>false,
            ]);
            return redirect()->route('dayaction.index')->with('ok','Collection logged');
        });
    }

    public function markNoPayment(Loan $loan){
        return DB::transaction(function() use ($loan){
            $loan->consecutive_missed_weeks += 1;
            if ($loan->consecutive_missed_weeks >= 3) {
                Notification::create([
                    'type'=>'recovery','loan_id'=>$loan->id,'event_date'=>now()->toDateString()
                ]);
            }
            $loan->save();
            $loan->payments()->create([
                'due_date'=>now()->toDateString(),
                'posted_at'=>now()->toDateString(),
                'amount'=>0,'is_late'=>true
            ]);
            return redirect()->route('dayaction.index')->with('ok','Marked as no payment for this week');
        });
    }
}
