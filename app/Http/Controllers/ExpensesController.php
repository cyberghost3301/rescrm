<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Expenses,LedgerEntry};
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function index(){
        $expenses = Expenses::with('user')->where('amount', '>', 0)->orderBy('created_at', 'DESC')->paginate(10);
        return view('expenses.index', compact('expenses'));
    }

    public function create(){
        $expenses = Expenses::where('amount', '>', 0)->orderBy('created_at', 'DESC')->paginate(5);
        return view('expenses.create', compact('expenses'));
    
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date'   => 'required|date',
            'amount' => 'required|numeric|min:1',
            'head'   => 'required|string|max:255',
        ]);

        Expenses::create([
            'date'       => $validated['date'],
            'amount'     => $validated['amount'],
            'head'       => $validated['head'],
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Expense added successfully!');
    }

    public function expensesSearch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date'   => 'required|date|after_or_equal:from_date',
        ]);

        $expenses = Expenses::whereBetween('date', [$request->from_date, $request->to_date])
        ->where('amount', '>', 0)->orderBy('created_at', 'DESC')->paginate(10);

        return view('expenses.index', compact('expenses', 'request'));
    }
    
    
    
    // Cash In  
    
    
    public function cashIn_index(){
        $ledgers = LedgerEntry::where('amount', '>', 0)->orderBy('created_at', 'DESC')->paginate(10);
        return view('expenses.cashIn_index', compact('ledgers'));
    }
    
    
     public function cashIn_create(){
        $cashIns = LedgerEntry::where('amount', '>', 0)->orderBy('created_at', 'DESC')->paginate(5);
        return view('expenses.cashIn_create', compact('cashIns'));
    
    }
    
        public function cashIn_store(Request $request)
    {
        $validated = $request->validate([
            'date'   => 'required|date',
            'amount' => 'required|numeric|min:1',
            'head'   => 'required|string|max:255',
        ]);

        LedgerEntry::create([
            'entry_date'       => $validated['date'],
            'amount'     => $validated['amount'],
            'note'       => $validated['head'],
            'type'      => 'CR',
            'invoice_number' => '2526DP0',
            
        ]);

        return redirect()->back()->with('success', 'Cash In added successfully!');
    }
    
      public function cashIn_Search(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date'   => 'required|date|after_or_equal:from_date',
        ]);

        $ledgers = LedgerEntry::whereBetween('entry_date', [$request->from_date, $request->to_date])
        ->where('amount', '>', 0)->orderBy('created_at', 'DESC')->paginate(10);

        return view('expenses.cashIn_index', compact('ledgers', 'request'));
    }
}
