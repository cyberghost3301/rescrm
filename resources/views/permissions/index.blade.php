<x-app-layout>
    <x-slot name="header">
       

        <div class="flex items-center justify-between mt-4">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions List') }}
            </h2>

            <a href="{{ route('permissions.create')}}"> 
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
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left"> Created</th>
                            <th class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($permissions->isNotEmpty())
                            @foreach($permissions as $permission)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left">{{$permission->id}}</td>
                                <td class="px-6 py-3 text-left">{{$permission->name}}</td>
                                <td class="px-6 py-3 text-left">{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y')}}</td>
                                <td class="px-6 py-3 text-center">

                                <a href="{{ route('permissions.edit', $permission->id)}}">
                                    <x-primary-button class="ms-3">
                                        {{ __('Edit') }}  
                                    </x-primary-button>
                                </a> 

                                <x-danger-button class="ms-3"  x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                            
                                       {{ __('Delete') }}

                                </x-danger-button>

                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('permissions.destroy',$permission->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this permission ?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your permission is deleted, all of its resources and data will be permanently deleted.') }}
            </p>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

                <div class="my-3">

                    {{ $permissions->links() }}

                </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
