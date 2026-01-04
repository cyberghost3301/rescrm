<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\{Customer,Loan,LedgerEntry}; 
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
class LoanController extends Controller {

    public function create(){ return view('loans.create'); }

    public function index(){
        $loans = Loan::with('customer')->where('total_amount_remaining', '>', 0)->orderBy('created_at', 'DESC')->paginate(10);
        return view('loans.index', compact('loans'));
    }

    public function store(Request $r)
{
    $data = $r->validate([
        'invoice_number' => ['required', 'string', 'max:50'],
        'sale_date' => ['required', 'date'],
        'closure_date' => ['required', 'date', 'after_or_equal:sale_date'],
        'weekly_installment_day' => ['required', 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday'],
        'billed_amount' => ['required', 'numeric', 'min:0'],
        'cash_payment' => ['nullable', 'numeric', 'min:0'],
        'online_payment' => ['nullable', 'numeric', 'min:0'],
        'scrap_value' => ['nullable', 'numeric', 'min:0'],
        'finance_period_weeks' => ['required', 'integer', 'min:1'],
        'customer.name' => ['required', 'regex:/^[A-Za-z ]+$/'],
        'customer.address' => ['required', 'string'],
        'customer.contact' => ['required', 'digits:10'],
        'customer.alt_contact' => ['nullable', 'digits:10'],
        'customer.vehicle_registration' => ['nullable', 'string'],
    ]);

    $loan = DB::transaction(function () use ($data) {
        $cust = Customer::firstOrCreate(
            ['contact' => $data['customer']['contact']],
            [
                'name' => $data['customer']['name'],
                'address' => $data['customer']['address'],
                'alt_contact' => $data['customer']['alt_contact'] ?? null,
                'vehicle_registration' => $data['customer']['vehicle_registration'] ?? null,
            ]
        );

        $cash = $data['cash_payment'] ?? 0;
        $online = $data['online_payment'] ?? 0;
        $scrap = $data['scrap_value'] ?? 0;

        $total_payment = $cash + $online + $scrap;
        $financed = $data['billed_amount'] - $total_payment;
        $weekly = round($financed / $data['finance_period_weeks'], 2);

        $loan = $cust->loans()->create([
            'invoice_number' => $data['invoice_number'],
            'sale_date' => $data['sale_date'],
            'closure_date' => $data['closure_date'],
            'weekly_installment_day' => $data['weekly_installment_day'],
            'billed_amount' => $data['billed_amount'],
            'cash_payment' => $cash,
            'online_payment' => $online,
            'scrap_value' => $scrap,
            'total_payment' => $total_payment,
            'financed_amount' => $financed,
            'finance_period_weeks' => $data['finance_period_weeks'],
            'weekly_installment_amount' => $weekly,
            'total_amount_remaining' => $financed,
        ]);

        LedgerEntry::create([
            'loan_id' => $loan->id,
            'entry_date' => $data['sale_date'],
            'invoice_number' => $data['invoice_number'],
            'type' => 'CR',
            'amount' => $cash + $online,
            'note' => 'Sale',
        ]);

        return $loan;
    });

    return redirect()->route('loans.show', $loan)->with('ok', 'Entry created');
}


    public function show(Loan $loan){ 
        $loan->load('customer','payments','ledger'); 
        return view('loans.show',compact('loan')); 
    }

    public function invoiceSearch(Request $request){ 
        $loan = Loan::where('invoice_number',$request->invoice)->first();
        $loan->load('customer','payments','ledger'); 
        return view('invoice',compact('loan')); 
    }
    
    
    
    //  public function invoicePdf($id)
    // {
        // view 'loans.pdf' will contain the same markup as your page but optimized for pdf
        // $data = ['loan' => $loan];

        // $pdf = Pdf::loadView('loans.pdf', $data)
        //           ->setPaper('a4', 'portrait');
        
        //   $loan = Loan::with(['customer', 'payments', 'ledger'])->findOrFail($id);

            // $pdf = Pdf::loadView('loans.pdf', compact('loan'));
                  
        // $pdf = Pdf::loadView('loans.pdf', compact('loan'));

        // stream in browser:
        // return $pdf->stream("loan-{$loan->invoice_number}.pdf");

        // force download:
        // return $pdf->download("RaoEnergy_Loan_{$loan->invoice_number}.pdf");
    // }


    // public function invoicePdf($id)
    // {
    //     $loan = Loan::with(['customer', 'payments', 'ledger'])->findOrFail($id);

    //     // Set DOMPDF options for Unicode (Hindi)
    //     Pdf::setOptions([
    //         'defaultFont' => 'devanagari',
    //         'isRemoteEnabled' => true,
    //         'isHtml5ParserEnabled' => true
    //     ]);

    //     // Load the view
    //     $pdf = Pdf::loadView('loans.pdf', compact('loan'));

    //     return $pdf->download("RaoEnergy_Loan_{$loan->invoice_number}.pdf");
    // }

    public function invoicePdf($id)
    {
        $loan = Loan::with(['customer','payments','ledger'])->findOrFail($id);
    
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'NotoSansDevanagari',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);
    
        // Add the font directory
        $mpdf->AddFontDirectory(storage_path('fonts'));
    
        // Register Hindi Font Properly
        $mpdf->fontdata += [
            "NotoSansDevanagari" => [
                'R' => "NotoSansDevanagari-Regular.ttf",
                'useOTL' => 0xFF,   // FULL OpenType Layout for Hindi Matra
                'useKashida' => 0,
            ],
        ];
    
        // Make it default
        $mpdf->default_font = "NotoSansDevanagari";
    
        $html = view('loans.pdf', compact('loan'))->render();
    
        $mpdf->WriteHTML($html);
    
        return $mpdf->Output("RaoEnergy_Loan_{$loan->invoice_number}.pdf", "D");
    }


    


    public function agreement($id)
    {
        $loan = Loan::with(['customer','payments','ledger'])->findOrFail($id);
    
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'NotoSansDevanagari',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);
    
        // Add the font directory
        $mpdf->AddFontDirectory(storage_path('fonts'));
    
        // Register Hindi Font Properly
        $mpdf->fontdata += [
            "NotoSansDevanagari" => [
                'R' => "NotoSansDevanagari-Regular.ttf",
                'useOTL' => 0xFF,   // FULL OpenType Layout for Hindi Matra
                'useKashida' => 0,
            ],
        ];
    
        // Make it default
        $mpdf->default_font = "NotoSansDevanagari";
    
        $html = view('loans.agreement', compact('loan'))->render();
    
        $mpdf->WriteHTML($html);
    
        return $mpdf->Output("RaoEnergy_Loan_agreement.pdf", "D");
    }
    



    
}
