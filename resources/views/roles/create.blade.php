<x-app-layout>
    <x-slot name="header">

    <div class="flex items-center justify-between mt-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($role) ?  __('Role Edit')  : __('Role Create') }}
        </h2>
        @can('view role')
        <a href="{{ route( 'roles.index')}}">
            <x-primary-button class="ms-3">
               {{ __('Back') }}  
            </x-primary-button>
        </a> 
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ isset($role) ?  route('roles.update',$role->id): route('roles.store') }}" method="post">
                        @csrf
                        @isset($role)
                            @method('put')
                        @endisset
                        <div>
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"  value="{{ isset($role) ? $role->name : old('name') }}" placeholder="Enter Role" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                              
                            </div>

                            <div class="grid grid-cols-4  mb-3">

                           @if(isset($permissions) && $permissions->isNotEmpty())
                            @foreach($permissions as $permission)
                                <div class="mt-3">
                                    <input  @isset($haspermissions) {{ ($haspermissions->contains( $permission->name)) ? 'checked' : '' }} @endisset type="checkbox" class="rounded" name="permission[]" id="permission-{{ $permission->id }}" value="{{ $permission->name }}">
                                    <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                            @endif
                          

                            </div>

                            <div>
                            <x-primary-button class="ms-3 mt-3">
                                {{ isset($role) ? __('Update')  : __('Submit') }}
                                </x-primary-button>
                            </div>
                           
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
