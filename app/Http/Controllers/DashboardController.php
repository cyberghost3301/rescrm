<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Carbon\Carbon;
use App\Models\{Loan,Expenses,LedgerEntry,Prospect}; 
use App\Models\Notification;

class DashboardController extends Controller {

    public function index(){
        
        $day = now()->format('l');
        $today = Carbon::today();
        $weekStart = $today->copy()->subDays(6);

        $today = Carbon::today()->toDateString();
        $notifications = Notification::latest()->take(20)->get();
        $loans = Loan::all();
        $expenses = Expenses::whereDate('date', $today)->get();
        $ledgerEntry = LedgerEntry::whereDate('entry_date', $today)->where('type','CR')->get();
        $totalExpenses = $expenses->sum('amount');
        
        
        $tcl = Loan::where('weekly_installment_day', $day)->where('total_amount_remaining', '>', 0)->get();
        $tcl = $tcl->map(function ($loan) use ($weekStart, $today) {
        
            $amount = LedgerEntry::where('invoice_number', $loan->invoice_number)
                ->whereBetween('entry_date', [$weekStart, $today])
                ->sum('amount');
        
            // dynamically add property
            $loan->total_amount = $amount;
        
            return $loan;
        });
        
        
        $skipped = Loan::whereRaw('weekly_skipped_installments >= (finance_period_weeks / 4)')->where('total_amount_remaining', '>', 0)->get();
        
        $half = Loan::whereRaw(
                'TIMESTAMPDIFF(WEEK, sale_date, ?) > (finance_period_weeks / 2)',
                [$today]
            )
            ->whereDate('closure_date', '>', $today)
            ->whereRaw('total_amount_collected < (financed_amount / 2)')
            ->where('total_amount_remaining', '>', 0)
            ->get();
            
            
        $loanClosureDefaulters = Loan::whereDate('closure_date', '<', $today)
            ->where('total_amount_remaining', '>', 0)
            ->get();
            
            
            $prospects = Prospect::where('status', '1')->latest()->get();
                

        return view('dashboard', compact(
            'notifications',
            'loans',
            'expenses',
            'ledgerEntry',
            'totalExpenses',
            'tcl',
            'skipped',
            'half',
            'loanClosureDefaulters',
            'prospects'
        ));
    }
}
