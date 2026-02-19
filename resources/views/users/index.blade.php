<x-app-layout>
    <x-accion-result />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administración de Usuarios') }}
        </h2>
    </x-slot>
    <br>
    <div class="container py-4" style="max-width: 1200px;">
        <div class="row">

            @include('users.store')
            @include('users.show')

        </div>
    </div>

</x-app-layout>

