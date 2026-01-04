<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Rao Energy - Loan {{ $loan->invoice_number }}</title>
    <style>
        body { font-family: "noto-sans-devanagari", sans-serif; font-size:12px; }
        .header { text-align:center; margin-bottom:10px; }
        .section { margin-bottom:12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #ddd; padding:6px; font-size:11px; }
        th { background:#f5f5f5; }
    </style>
   <style>
    body {
        font-family: 'NotoSansDevanagari';
        font-size: 12px;
    }
    .devanagari {
        font-family: 'NotoSansDevanagari' !important;
          letter-spacing: 1px;    /* space between characters */
          word-spacing: 3px;  
    }
</style>

<style>
    .info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 12px;
        font-size: 12px;
    }
    .info-table td {
        padding: 4px 0;
        vertical-align: top;
        border: none
    }
    .label {
        font-weight: bold;
        width: 150px;
    }
</style>

</head>
<body>
    <div class="header">
        <div class="devanagari" style="font-size: 22px;
        font-weight: bold;
        line-height: 28px;">राव एनर्जी सॉल्यूशंस</div>
        <div class="devanagari"> पगरा उर्फ परसिया, भीखमपुर रोड, देवरिया, उत्तर प्रदेश, 274001</div>
        <div>GSTIN: 09BFRPR9331G1ZS</div>
    </div>
    <hr>

    <table class="info-table">
    <tr>
        <td class="label">Invoice Number:</td>
        <td>{{ $loan->invoice_number }}</td>

        <td class="label">Customer:</td>
        <td>{{ $loan->customer->name }}</td>
    </tr>

    <tr>
        <td class="label">Sale Date:</td>
        <td>{{ \Carbon\Carbon::parse($loan->sale_date)->format('d-m-Y') }}</td>
        

        <td class="label">Closure Date:</td>
        <td>{{ \Carbon\Carbon::parse($loan->closure_date)->format('d-m-Y')}}</td>
    </tr>

    <tr>
        <td class="label">Weekly Installment Day:</td>
        <td>{{ $loan->weekly_installment_day }}</td>

        <td class="label"></td>
        <td></td>
    </tr>
</table>


<table class="info-table">
    <tr>
        <td class="label">Billed Amount:</td>
        <td>₹ {{ number_format($loan->billed_amount,2) }}</td>

        <td class="label">Total Payment:</td>
        <td>₹ {{ number_format($loan->total_payment,2) }}</td>
    </tr>

    <tr>
        <td class="label">Financed Amount:</td>
        <td>₹ {{ number_format($loan->financed_amount,2) }}</td>

        <td class="label"></td>
        <td></td>
    </tr>
</table>


<table class="info-table">
    <tr>
    

       
        
         <td class="label">Weekly Installment:</td>
        <td>₹ {{ number_format($loan->weekly_installment_amount,2) }}</td>
        
            <td class="label">Remaining:</td>
        <td>₹ {{ number_format($loan->total_amount_remaining,2) }}</td>
    </tr>

    <tr>
        
         <td class="label">Period (Weeks):</td>
        <td>{{ $loan->finance_period_weeks }}</td>
       

        <td class="label"></td>
        <td></td>
    </tr>
</table>


<table class="info-table">
    <tr>
        <td class="label">Skipped Installment:</td>
        <td>{{ number_format($loan->weekly_skipped_installments) }}</td>

        <td class="label">Non-payment Penalty:</td>
        <td>₹ {{ number_format($loan->non_payment_penalty,2) }}</td>
    </tr>

    <tr>
        <td class="label">Late Payment Penalty:</td>
        <td>₹ {{ number_format($loan->late_payment_penalty,2) }}</td>

        <td class="label"></td>
        <td></td>
    </tr>
</table>


    <h3> Payment </h3>


    <div class="section">
        <table>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Mode</th>
            </tr>
            @foreach($loan->payments as $i => $pay)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $pay->created_at->format('d M, Y') }}</td>
                <td>₹ {{ number_format($pay->amount,2) }}</td>
                <td>{{ ucfirst($pay->mode) }}</td>
            </tr>
            @endforeach
        </table>
    </div>



    <!-- Ledger similarly -->
    
    <div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
    <div class="flex items-center gap-2 px-4 py-3 font-bold text-lg">
        <i class="bi bi-journal-text text-xl"></i>
          <h3> Ledger Entries </h3>
    </div>

    <div class="p-0">
        @if($loan->ledger->count())
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loan->ledger as $i => $entry)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $i+1 }}</td>
                                <td class="px-4 py-2">{{ $entry->entry_date }}</td>
                                <td class="px-4 py-2">
                                    <span class="bg-blue-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                                        {{ ucfirst($entry->type) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 font-bold">
                                    ₹{{ number_format($entry->amount,2) }}
                                </td>
                                <td class="px-4 py-2">{{ $entry->note ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-4 text-gray-500 text-center">📒 No ledger entries found.</div>
        @endif
    </div>
</div>
</body>
</html>
