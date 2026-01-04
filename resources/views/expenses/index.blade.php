<x-app-layout>
    <x-slot name="header">
       

        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Expenses List') }}
            </h2>

            <a href="{{ route('expenses.create')}}"> 
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
                <form method="post" action="{{ route('expenses.search') }}" class="flex items-center gap-3">
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

                <!-- total expenses -->
                <div class="flex justify-end" style="margin-top:-80px">
                    <label class="block">
                        <span class="block mb-2 font-medium">Total Expenses Amount</span>
                        <h4 class="text-lg font-semibold">₹  {{ isset($expenses) ? $expenses->sum('amount') : 0}}</h4>
                    </label>
                </div>
            </div>

    

                <table class="w-full">
                    <thead class="bg-gray-50" >
                        <tr class="border-b" >
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left"> Amount </th>
                            <th class="px-6 py-3 text-left"> Head </th>
                            <th class="px-6 py-3 text-left"> Timestamps </th>
                            <th class="px-6 py-3 text-left"> Created By</th>
                            <th class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($expenses->isNotEmpty())
                            @foreach($expenses as $expense)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left">{{$expense->id}}</td>
                                <td class="px-6 py-3 text-left">{{$expense->date}}</td>
                                <td class="px-6 py-3 text-left"> {{ $expense->amount}}</td>
                                <td class="px-6 py-3 text-left">{{ $expense->head}}</td>
                                <td class="px-6 py-3 text-left">{{ $expense->created_at}}</td>
                                <td class="px-6 py-3 text-left">{{ $expense->user->name}}</td>
                                <td class="px-6 py-3 text-center">
                                -
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="my-3">

                    {{ $expenses->links() }}

                </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
