<x-app-layout>


  <x-slot name="header">
       

       <div class="flex items-center justify-between mt-4">

           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Loan Details') }}
           </h2>

            <a href="{{ url()->previous() }}"> 
                <x-primary-button class="ms-3">
                    {{ __('Back') }} 
                </x-primary-button>
            </a>  

       </div>


   </x-slot>
<div class="max-w-6xl mx-auto py-5 px-3">

    {{-- Success Message --}}
    @if(session('ok'))
        <div class="flex items-center justify-between bg-green-100 text-green-800 rounded-full px-5 py-3 shadow mb-5">
            <div class="flex items-center gap-2">
                <i class="bi bi-check-circle-fill text-lg"></i>
                <strong>{{ session('ok') }}</strong>
            </div>
            <button type="button" class="text-green-900 font-bold">×</button>
        </div>
    @endif

    {{-- Loan Details Card --}}
    <div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
        <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg" 
             style="background: linear-gradient(45deg,#007bff,#00c6ff);">
            <i class="bi bi-file-text text-2xl"></i>
            Loan Details
        </div>
        <div class="p-5 space-y-4">

            {{-- Invoice + Sale Date --}}
            <div class="flex mb-3">
                <div><strong class="font-semibold">Invoice Number :</strong> {{ $loan->invoice_number }}</div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold">Sale Date :</strong> {{ $loan->sale_date }}</div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold">Closure Date :</strong> {{ $loan->closure_date }}</div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Weekly Installment Day :</strong> {{ $loan->weekly_installment_day }} </div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Billed Amount :</strong> ₹{{ number_format($loan->billed_amount,2) }}</div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Total Payment :</strong> ₹{{ number_format($loan->total_payment,2) }}</div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Financed Amount :</strong> ₹{{ number_format($loan->financed_amount,2) }}</div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold"> Remaining :</strong> ₹{{ number_format($loan->total_amount_remaining,2) }}</div>
            </div>

            <div class="flex mb-3">
                <div><strong class="font-semibold"> Period (Weeks) :</strong> {{ $loan->finance_period_weeks }}</div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Weekly Installment :</strong>₹ {{ number_format($loan->weekly_installment_amount,2) }}</div>
            </div>

            <hr>

            <div class="flex">
                <div><strong class="font-semibold"> Skipped Installment :</strong> {{ number_format($loan->weekly_skipped_installments) }}</div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Non - payment Penalty :</strong>₹ {{ number_format($loan->non_payment_penalty,2); }}</div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Late Payment Penalty:</strong> ₹ {{ number_format($loan->late_payment_penalty,2); }} </div>
            </div>

        </div>
    </div>

    {{-- Customer Details --}}
    <div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
        <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg"
             style="background: linear-gradient(45deg,#6c757d,#343a40);">
            <i class="bi bi-person-circle text-xl"></i>
            Customer Details
        </div>
        <div class="p-5 space-y-4">

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Name :</strong>{{ $loan->customer->name }}</div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold"> Contact :</strong>{{ $loan->customer->contact }}</div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold">Alt Contact :</strong>{{ $loan->customer->alt_contact ?? '-' }}</div>
            </div>

            <div class="flex  mb-3">
                <div><strong class="font-semibold">Vehicle Registration :</strong>{{ $loan->customer->vehicle_registration ?? '-' }}</div>
            </div>

            <div class="flex">
                <div><strong class="font-semibold"> Address :</strong>{{ $loan->customer->address }}</div>
            </div>

        </div>
    </div>


    {{-- Payments History --}}
<div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
    <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg"
         style="background: linear-gradient(45deg,#28a745,#20c997);">
        <i class="bi bi-cash-stack text-xl"></i>
        Payments
    </div>

    <div class="p-0">
        @if($loan->payments->count())
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Mode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loan->payments as $i => $pay)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $i+1 }}</td>
                                <td class="px-4 py-2">{{ $pay->created_at }}</td>
                                <td class="px-4 py-2 font-bold text-green-600">
                                    ₹{{ number_format($pay->amount,2) }}
                                </td>
                                <td class="px-4 py-2">
                                    <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-xs">
                                        {{ ucfirst($pay->mode) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-4 text-gray-500 text-center">💳 No payments recorded yet.</div>
        @endif
    </div>
</div>

{{-- Ledger Entries --}}
<div class="rounded-2xl overflow-hidden shadow-lg mb-6 border border-gray-200">
    <div class="flex items-center gap-2 text-white px-4 py-3 font-bold text-lg"
         style="background: linear-gradient(45deg,#212529,#495057);">
        <i class="bi bi-journal-text text-xl"></i>
        Ledger Entries
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


</div>

</x-app-layout>
