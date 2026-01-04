<x-app-layout>


    <x-slot name="header">
       

       <div class="flex items-center justify-between mt-4">

           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Day Action') }}
           </h2>

            <a href="{{ route('dashboard') }}"> 
                <x-primary-button class="ms-3">
                    {{ __('Back') }}    
                </x-primary-button>
            </a>  

       </div>
    </x-slot>

    <x-message></x-message>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 text-gray-900">
                <form method="post" action="{{ route('dayaction.list') }}" class="flex items-center gap-3">
                    @csrf
                    <select name="day" class="input" required>
                        <option value="" disabled selected>Select day...</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">Show</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
               {{ __('Day Action — List') }}
            </h2>   
                @if(isset($loans) ? $loans->isNotEmpty(): '')
                    @foreach($loans as $loan)
                    @php
    $today = \Carbon\Carbon::today();
    $saleDate = \Carbon\Carbon::parse($loan->sale_date);
    $closureDate = \Carbon\Carbon::parse($loan->closure_date);
    $weeksPassed = $saleDate->diffInWeeks($today);
    $halfPeriod = $loan->finance_period_weeks / 2;

    if ($today->gt($closureDate)) {
        $bgColor = 'bg-red-500 text-white';
    } elseif (
        $weeksPassed > $halfPeriod &&
        $today->lt($closureDate) &&
        $loan->total_amount_collected < ($loan->financed_amount / 2)
    ) {
        $bgColor = 'bg-orange-500 text-white';
    } else {
        $bgColor = 'bg-teal-500 text-white';
    }
@endphp




                    <div class="{{ $bgColor }} overflow-hidden shadow-sm sm:rounded-lg mb-3">
                        <div x-data="{open:false}" class="p-6 text-gray-900">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="font-semibold"> {{$loan->customer->name ?? ''}} - ( {{  $loan->invoice_number ?? ''}} )</div>
                                    <div class="text-sm text-gray-600">Remaining: ₹ {{ number_format($loan->total_amount_remaining,2) }}</div>
                                </div>
                                <button @click="open=!open" class="px-3 py-1 rounded bg-gray-100">View</button>
                            </div>
                            <div x-show="open" class="mt-3 space-y-3">
                            <div class="bg-white px-5 py-1 {{ $loan->weekly_color }}">
                                {{ $loan->weekly_message }}
                            </div>
                                <div class="text-sm">
                                    <div class="bg-white grid md:grid-cols-4 gap-2 text-xs mt-2">
                                    <div class="px-5 py-1">Weekly Amt: ₹ {{ number_format($loan->weekly_installment_amount,2) }}</div>
                                    <div class="px-5 py-1 {{ $loan->weekly_skipped_installments > ($loan->finance_period_weeks / 4) ? 'text-red-500 font-bold' : 'text-green-600 font-bold' }}">
    Skipped: {{ $loan->weekly_skipped_installments }}
</div>

                                    <div class="px-5 py-1">Non-pay Penalty: ₹ {{ number_format($loan->non_payment_penalty,2); }}</div>
                                    <div class="px-5 py-1">Late Penalty: ₹ {{ number_format($loan->late_payment_penalty,2); }}</div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    <form method="post" action="{{ route('dayaction.collect', $loan); }}" class="flex items-center gap-2">
                                        @csrf
                                        <input type="number" name="amount" step="0.01" min="0.01" max=" {{ $loan->total_amount_remaining }}" class="input w-40" placeholder="Collect ₹" required/>
                                        <select name="mode" class="input" required>
                                            <option value="" disabled selected>Select Mode...</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Online">Online</option>
                                        <select>
                                        <x-primary-button class="ms-3">Log Collection </x-primary-button>
                                    </form>
                                    <form method="post" action="{{ route('dayaction.penalty.nonpayment', $loan) }}" onsubmit="return confirm('Are you sure you want to charge non payment penalty?')">
                                        @csrf
                                        <x-primary-button class="ms-3 mt-1"> Non Payment Penalty? </x-primary-button>
                                    </form>
                                    <form method="post" action="{{ route('dayaction.penalty.late', $loan); }}" onsubmit="return confirm('Are you sure you want to charge late payment penalty?')">
                                        @csrf
                                        <x-primary-button class="ms-3 mt-1"> Late Payment Penalty </x-primary-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
             

</x-app-layout>
