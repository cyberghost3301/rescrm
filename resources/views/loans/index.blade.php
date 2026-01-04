<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Loan Lists') }}
            </h2>

            <div>

                   

                    @can('create role')

                    <a href="{{ route('loans.create')}}">
                        <x-primary-button class="ms-3">
                            {{ __('Create') }}  
                        </x-primary-button>
                    </a> 

                    @endcan

            </div>

           

            
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <x-message></x-message>

                <table class="w-full">
                    <thead class="bg-gray-50" >
                        <tr class="border-b" >
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left"> Invoice Number </th>
                            <th class="px-6 py-3 text-left"> Created</th>
                            <th class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($loans->isNotEmpty())
                            @foreach($loans as $loan)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left">{{$loan->id}}</td>
                                <td class="px-6 py-3 text-left">{{$loan->customer->name}}</td>
                                <td class="px-6 py-3 text-left">{{$loan->invoice_number}}</td>
                                <td class="px-6 py-3 text-left">{{ \Carbon\Carbon::parse($loan->created_at)->format('d M, Y')}}</td>
                                <td class="px-6 py-3 text-center">
                                @can('create edit')

                                <a href="{{ route('loans.show', $loan->id)}}"> 
                                    <x-primary-button class="ms-3">
                                        {{ __('View') }} 
                                    </x-primary-button>
                                </a>  
                                @endcan

                                <a href="{{ route('loans.agreement',$loan->id)}}">
                                    <x-primary-button class="ms-3">
                                        {{ __('generate Agreement') }}  
                                    </x-primary-button>
                                </a> 
                              

                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="my-3">

                    {{ $loans->links() }}

                </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
