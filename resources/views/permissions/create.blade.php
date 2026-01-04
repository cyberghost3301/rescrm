<x-app-layout>
    <x-slot name="header">

    <div class="flex items-center justify-between mt-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($permission) ?  __('Permissions Edit')  : __('Permissions Create') }}
        </h2>

        <a href="{{ route( 'permissions.index')}}">
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
                    <form action="{{ isset($permission) ?  route('permissions.update',$permission->id): route('permissions.store') }}" method="post">
                        @csrf
                        @isset($permission)
                            @method('put')
                        @endisset
                        <div>
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"  value="{{ isset($permission) ? $permission->name : old('name') }}" placeholder="Enter Permission" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                              
                            </div>

                            <div>
                            <x-primary-button class="ms-3 mt-3">
                                {{ isset($permission) ? __('Update')  : __('Submit') }}
                                </x-primary-button>
                            </div>
                           
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
