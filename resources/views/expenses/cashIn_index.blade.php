<x-app-layout>
    <x-slot name="header">
       

        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ledger List') }}
            </h2>

            <a href="{{ route('cashIn.create')}}"> 
                <x-primary-button class="ms-3">
                    {{ __('Cash In Create') }} 
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
                <form method="post" action="{{ route('cashIn.search') }}" class="flex items-center gap-3">
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

    

                <table class="w-full">
                    <thead class="bg-gray-50" >
                        <tr class="border-b" >
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                             <th class="px-6 py-3 text-left">customer</th>
                              <th class="px-6 py-3 text-left">Invoice</th>
                            <th class="px-6 py-3 text-left"> Amount </th>
                            <th class="px-6 py-3 text-left"> Head </th>
                            <th class="px-6 py-3 text-left"> Timestamps </th>
                          
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($ledgers->isNotEmpty())
                            @foreach($ledgers as $ledger)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left">{{$ledger->id}}</td>
                                <td class="px-6 py-3 text-left">{{$ledger->entry_date}}</td>
                                <td class="px-6 py-3 text-left">{{$ledger->loan->customer->name ?? '-'}}</td>
                                <td class="px-6 py-3 text-left">{{$ledger->invoice_number}}</td>
                                <td class="px-6 py-3 text-left"> {{ $ledger->amount}}</td>
                                <td class="px-6 py-3 text-left">{{ $ledger->note}}</td>
                                <td class="px-6 py-3 text-left">{{ $ledger->created_at}}</td>
                               
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="my-3">

                    {{ $ledgers->links() }}

                </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
