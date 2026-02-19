@if (session('success'))
    @push('scripts')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Operación realizada',
                text: @json(session('success')),
                confirmButtonColor: '#198754'
            });
        </script>
    @endpush
@endif


@if (session('error'))
    @push('scripts')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ocurrió un problema',
                text: @json(session('error')),
                confirmButtonColor: '#dc3545'
            });
        </script>
    @endpush
@endif
