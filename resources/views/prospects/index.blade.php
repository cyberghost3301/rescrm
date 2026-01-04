<x-app-layout>
    <x-slot name="header">
       

        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Prospects List') }}
            </h2>

            <a href="{{ route('prospect.create')}}"> 
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

                <table class="w-full">
                    <thead class="bg-gray-50" >
                        <tr class="border-b" >
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left"> Customer Name</th>
                            <th class="px-6 py-3 text-left"> Locality </th>
                            <th class="px-6 py-3 text-left"> Contact No </th>
                            <th class="px-6 py-3 text-left"> Alt Contact No</th>
                            <th class="px-6 py-3 text-center">Requirment</th>
                            <th class="px-6 py-3 text-center">Mode</th>
                            <th class="px-6 py-3 text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        
                        
                       @if($prospects->isNotEmpty())
                            @foreach($prospects as $prospect)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left">{{$prospect->id}}</td>
                                <td class="px-6 py-3 text-left">{{$prospect->date}}</td>
                                <td class="px-6 py-3 text-left"> {{ $prospect->customer_name}}</td>
                                <td class="px-6 py-3 text-left">{{ $prospect->locality}}</td>
                                <td class="px-6 py-3 text-left">{{ $prospect->contact_no}}</td>
                                <td class="px-6 py-3 text-left">{{ $prospect->alt_contact_no}}</td>
                                <td class="px-6 py-3 text-left">{{ $prospect->requirement}}</td>
                                <td class="px-6 py-3 text-left">{{ $prospect->mode}}</td>
                                <td class="px-6 py-3 text-left">
                                    <form action="{{ route('prospect.updateStatus', $prospect->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                
                                        <select 
                                            name="status"
                                            onchange="this.form.submit()"
                                            class="border rounded px-6 py-1 text-sm
                                                {{ $prospect->status == 1 ? 'bg-yellow-100' : '' }}
                                                {{ $prospect->status == 0 ? 'bg-red-100' : '' }}
                                                {{ $prospect->status == 2 ? 'bg-green-100' : '' }}">
                                
                                            <option value="1" {{ $prospect->status == 1 ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                
                                            <option value="0" {{ $prospect->status == 0 ? 'selected' : '' }}>
                                                Rejected
                                            </option>
                                
                                            <option value="2" {{ $prospect->status == 2 ? 'selected' : '' }}>
                                                Finalised
                                            </option>
                                
                                        </select>
                                    </form>
                                </td>

                                
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="my-3">

                    {{ $prospects->links() }}

                </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
