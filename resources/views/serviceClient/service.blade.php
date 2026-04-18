@extends('layouts.barberApp')
@include('components.modalViewService')
@section('content')
    <x-reload-component />
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#198754'
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#dc3545'
                });
            });
        </script>
    @endif
    <x-banner-service />
    @include('serviceClient.show')
    <x-footer-component />
@endsection
