<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{CashHolding,LedgerEntry,Expenses,Payment};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CashHoldingController extends Controller
{
    public function index(){
         $cashHolding = CashHolding::orderBy('created_at', 'DESC')->paginate(10);
        return view('cashHolding.index', compact('cashHolding'));
    }

    public function create(){

        $today = Carbon::today()->toDateString();
       
        $yesterday = Carbon::yesterday()->toDateString();
        // $previousDay = CashHolding::whereDate('date', $yesterday)->first();
        $previousDay = CashHolding::whereDate('date', $yesterday)->first()
            ?? CashHolding::orderBy('date', 'desc')->first();
        $previous_day_cash_holding = $previousDay ? $previousDay->total_cash : 0;
        $today_total_collection = LedgerEntry::where('type','CR')->whereDate('entry_date', $today)->sum('amount');
        $today_total_expenses   = Expenses::whereDate('date', $today)->sum('amount');

        return view('cashHolding.create', compact(
            'today',
            'previous_day_cash_holding',
            'today_total_collection',
            'today_total_expenses'
        ));
     
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'previous_day_cash_holding' => 'required|numeric',
            'today_total_collection' => 'required|numeric',
            'today_total_expenses' => 'required|numeric',
            'cash_in_hand' => 'required|numeric',
            'cash_in_account' => 'required|numeric',
            'cash_in_wallet' => 'required|numeric',
            'total_cash' => 'required|numeric',
        ]);


        $pa = $request->previous_day_cash_holding + $request->today_total_collection - $request->today_total_expenses;
        $total_cash = $request->cash_in_hand + $request->cash_in_account + $request->cash_in_wallet;

        if ($pa != $total_cash) {
            return back()->withErrors(['total_cash' => 'Total cash mismatch! Please check your inputs.'])->withInput();
        }

        CashHolding::create([
            'date' => $request->date,
            'previous_day_cash_holding' => $request->previous_day_cash_holding,
            'today_total_collection' => $request->today_total_collection,
            'today_total_expenses' => $request->today_total_expenses,
            'cash_in_hand' => $request->cash_in_hand,
            'cash_in_account' => $request->cash_in_account,
            'cash_in_wallet' => $request->cash_in_wallet,
            'total_cash' => $total_cash,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('cashHolding.index')->with('success', 'Cash Holding created successfully.');
    }

    public function cashHoldingSearch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date'   => 'required|date|after_or_equal:from_date',
        ]);

        $cashHolding = CashHolding::whereBetween('date', [$request->from_date, $request->to_date])
        ->orderBy('created_at', 'DESC')->paginate(10);

        return view('cashHolding.index', compact('cashHolding', 'request'));
    }
}
