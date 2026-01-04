<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Expenses,LedgerEntry,Prospect};
use Illuminate\Support\Facades\Auth;

class ProspectController extends Controller
{
    
    
    public function index(){
        
        $prospects = Prospect::latest()->paginate(10);
     
        return view('prospects.index')->with('prospects',$prospects);
    }
    
    
     public function create(){
     
        return view('prospects.create');
    }
    
    
     public function store(Request $request)
    {
        // ✅ Validation
        $validated = $request->validate([
            'date'            => ['required', 'date'],
            'customer_name'   => ['required', 'string', 'max:255'],
            'locality'        => ['required', 'string', 'max:255'],
            'contact_no'      => ['required', 'digits_between:10,15'],
            'alt_contact_no'  => ['nullable', 'digits_between:10,15'],
            'requirement'     => ['required', 'string', 'max:500'],
            'mode'            => ['required', 'in:cash,credit'],
        ]);

        // ✅ Store data
        Prospect::create([
            'date'           => $validated['date'],
            'customer_name'  => $validated['customer_name'],
            'locality'       => $validated['locality'],
            'contact_no'     => $validated['contact_no'],
            'alt_contact_no' => $validated['alt_contact_no'] ?? null,
            'requirement'    => $validated['requirement'],
            'mode'           => $validated['mode'],
        ]);

        // ✅ Redirect with success message
        return redirect()
            ->route('prospect.index')
            ->with('success', 'Prospect created successfully.');
    }
    
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2',
        ]);
    
        $prospect = Prospect::findOrFail($id);
        $prospect->status = $request->status;
        $prospect->save();
    
        return back()->with('success', 'Status updated successfully.');
    }

    
    
}