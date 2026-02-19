<x-app-layout>

    <x-accion-result />

    <x-slot name="header">
        <h2 class="fw-bold text-dark">
            Administración de Servicios
        </h2>
    </x-slot>

    <div class="container py-4" style="max-width: 1200px;">
        <div class="row g-4">
            @include('services.store')
            @include('services.show')
        </div>
    </div>

</x-app-layout>
