<x-app-layout>
    <x-slot name="header">

    <div class="flex items-center justify-between mt-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Edit') }} </h2>

        <a href="{{ route( 'customer.index')}}">
            <x-primary-button class="ms-3">
               {{ __('Back') }} 
            </x-primary-button>
        </a>  
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('customer.update',$customer->id)}}" method="post">
                        @csrf
                        @isset($customer)
                            @method('put')
                        @endisset
                        <div>
                            <div class="mb-2">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"  value="{{ isset($customer) ? $customer->name : old('name') }}" placeholder="Enter name" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                              
                            </div>
                            
                             <div class="mb-2">
                                <x-input-label for="name" :value="__('Contact')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="contact"  value="{{ isset($customer) ? $customer->contact : old('contact') }}" placeholder="Enter contact" required  readonly/>
                                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                              
                            </div>
                            
                             <div class="mb-2">
                                <x-input-label for="name" :value="__('Alt Contact')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="alt_contact"  value="{{ isset($customer) ? $customer->alt_contact : old('alt_contact') }}" placeholder="Enter alt contact" />
                                <x-input-error :messages="$errors->get('alt_contact')" class="mt-2" />
                              
                            </div>
                            
                             <div class="mb-2">
                                <x-input-label for="name" :value="__('Vehicle Registration')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="vehicle_registration"  value="{{ isset($customer) ? $customer->vehicle_registration : old('vehicle_registration') }}" placeholder="Enter vehicle registration" />
                                <x-input-error :messages="$errors->get('vehicle_registration')" class="mt-2" />
                              
                            </div>
                            
                             <div class="mb-2">
                                <x-input-label for="name" :value="__('Address')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="address"  value="{{ isset($customer) ? $customer->address : old('address') }}" placeholder="Enter Address" required />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                              
                            </div>

                            <div>
                            <x-primary-button class="ms-3 mt-3">
                                {{ __('Update') }}
                                </x-primary-button>
                            </div>
                           
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
