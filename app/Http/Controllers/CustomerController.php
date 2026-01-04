<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{CashHolding,LedgerEntry,Expenses,Payment,Customer};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    
    
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('customer.index')->with('customers', $customers);
    }
    
    
    public function Search(Request $request)
    {
        // Validate input
        $request->validate([
            'contact' => 'required',
        ]);
    
        // Search with pagination (so links() works)
        $customers = Customer::where('contact', 'LIKE', "%{$request->contact}%")
                        ->orderBy('id', 'DESC')
                        ->paginate(10);
    
        // If empty – return with error message
        if ($customers->isEmpty()) {
            return back()->with('error', 'No customer found with this contact number.');
        }
    
        // Return view with data
        return view('customer.index', compact('customers'));
    }
    
    
    public function edit($id){
         $customer = Customer::findOrFail($id);
        return view('customer.edit')->with('customer', $customer);
    }
    
    
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
            'alt_contact' => 'nullable|string|max:15',
            'vehicle_registration' => 'nullable|string|max:50',
            'address' => 'required|string|max:255',
        ]);
    
        // Find customer
        $customer = Customer::findOrFail($id);
    
        // Update customer data
        $customer->update([
            'name' => $request->name,
            'contact' => $request->contact, // readonly but kept
            'alt_contact' => $request->alt_contact,
            'vehicle_registration' => $request->vehicle_registration,
            'address' => $request->address,
        ]);
    
        return redirect()->route('customer.index')
                ->with('success', 'Customer updated successfully!');
    }


    
    
}