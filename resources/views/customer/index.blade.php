<x-app-layout>
    <x-slot name="header">
       

        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Customer List') }}
            </h2>
            
             <form method="post" action="{{ route('customer.search') }}" class="flex items-center gap-3">
                    @csrf

                    <label class="block">
                      
                        <input type="text" name="contact" placeholder="Search for contact" required class="input w-full" />
                    </label>
                
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">Search</button>

                </form>

            
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
                            <th class="px-6 py-3 text-left"> Contact</th>
                            <th class="px-6 py-3 text-left"> Alt Contact</th>
                            <th class="px-6 py-3 text-left"> Vehicle Registration</th>
                            <th class="px-6 py-3 text-left"> Address</th>
                            <th class="px-6 py-3 text-left"> Created At</th>
                            <th class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($customers->isNotEmpty())
                            @foreach($customers as $customer)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left">{{$customer->id}}</td>
                                <td class="px-6 py-3 text-left">{{$customer->name}}</td>
                                <td class="px-6 py-3 text-left">{{$customer->contact}}</td>
                                <td class="px-6 py-3 text-left">{{$customer->alt_contact ?? '-'}}</td>
                                <td class="px-6 py-3 text-left">{{$customer->vehicle_registration ?? '-'}}</td>
                                <td class="px-6 py-3 text-left">{{$customer->address}}</td>
                                <td class="px-6 py-3 text-left">{{ \Carbon\Carbon::parse($customer->created_at)->format('d M, Y')}}</td>
                                <td class="px-6 py-3 text-center">

                                <a href="{{ route('customer.edit', $customer->id)}}">
                                    <x-primary-button class="ms-3">
                                        {{ __('Edit') }}  
                                    </x-primary-button>
                                </a> 

                              

                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="my-3">

                    {{ $customers->links() }}

                </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
