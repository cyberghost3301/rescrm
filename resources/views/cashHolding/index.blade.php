<x-app-layout>
    <x-slot name="header">
       

        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cash Holding List') }}
            </h2>

            <a href="{{ route('cashHolding.create')}}"> 
                <x-primary-button class="ms-3">
                    {{ __('Create') }} 
                </x-primary-button>
            </a>  

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <x-message></x-message>

            

            <div class="p-6 text-gray-900">
                <form method="post" action="{{ route('cashHolding.search') }}" class="flex items-center gap-3">
                    @csrf

                    <label class="block mb-4">
                        <span class="block mb-2 font-medium">From Date</span>
                        <input type="date" name="from_date" required class="input w-full" />
                    </label>

                    <label class="block mb-4">
                        <span class="block mb-2 font-medium">To Date</span>
                        <input type="date" name="to_date" required class="input w-full" />
                    </label>
                
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg mt-3">Search</button>

                </form>

            
            </div>

    
            <div class="overflow-x-auto w-full">
                <table class="w-full min-w-max">
                    <thead class="bg-gray-50">
                        <tr class="border-b">
                            <th class="px-6 py-3 text-left whitespace-nowrap">#</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap">Date</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Previous Day Cash Holding </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Today Total Collection </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Today Total Expenses </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Cash In Hand </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Cash In Account </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Cash In Wallet </th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Total Cash</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Created By</th>
                            <th class="px-6 py-3 text-left whitespace-nowrap"> Created At</th>
                          
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($cashHolding->isNotEmpty())
                            @foreach($cashHolding as $cashHold)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left whitespace-nowrap">{{$cashHold->id}}</td>
                                <td class="px-6 py-3 text-left">
    <span style="white-space: nowrap;">
        {{ \Carbon\Carbon::parse($cashHold->date)->format('d-m-Y') }}
    </span>
</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap"> {{$cashHold->previous_day_cash_holding}}</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">{{ $cashHold->today_total_collection}}</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">{{ $cashHold->today_total_expenses}}</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">{{ $cashHold->cash_in_hand}}</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">{{ $cashHold->cash_in_account}}</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">{{ $cashHold->cash_in_wallet}}</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">{{ $cashHold->total_cash}}</td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <span style="white-space: nowrap;">
                                        {{ $cashHold->user->name}}
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-left">
                                    <span style="white-space: nowrap;">
                                        {{ \Carbon\Carbon::parse($cashHold->created_at)->format('d-m-Y H:i:s') }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

                <div class="my-3">

                    {{ $cashHolding->links() }}

                </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
