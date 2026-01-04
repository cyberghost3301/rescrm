<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
        
        {{-- Left side --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>

        {{-- Right side --}}
        <div class="flex items-center space-x-6">

            @can('view role')
                <x-nav-link 
                    :href="route('roles.index')" 
                    :active="request()->routeIs('roles.index')">
                    {{ __('Roles') }}
                </x-nav-link>
            @endcan

            @can('view permission')
                <x-nav-link 
                    :href="route('permissions.index')" 
                    :active="request()->routeIs('permissions.index')">
                    {{ __('Permission') }}
                </x-nav-link>
            @endcan

        </div>
    </div>
</x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
