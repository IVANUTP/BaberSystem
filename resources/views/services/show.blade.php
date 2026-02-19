<div class="col-lg-8">
    <div class="card section-card h-100">

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">

            <div class="fw-semibold">
                <i class="bi bi-list-ul me-2"></i>Servicios Registrados
            </div>

            <form method="GET" action="{{ route('services.index') }}" class="d-flex" role="search">

                <div class="input-group input-group-sm" style="width: 260px;">
                    <span class="input-group-text bg-black text-white border-0">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text" name="search" value="{{ $search }}"
                        class="form-control border-0 shadow-none" placeholder="Buscar servicio...">

                    <button class="btn btn-dark">
                        Buscar
                    </button>
                </div>

            </form>
            @if ($search)
                <div class="mb-3">
                    <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-x-circle"></i>
                        Limpiar búsqueda
                    </a>
                </div>
            @endif

        </div>


        <div class="card-body p-0">


            <div class="table-responsive">
                <table class="table align-middle mb-0">

                    <thead class="bg-light text-center">
                        <tr>
                            <th>Servicio</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Duración</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">

                        @forelse ($services as $service)
                            <tr>

                                <td class="fw-semibold">{{ $service->name }}</td>

                                <td class="text-muted">
                                    {{ $service->description ?? 'Sin descripción' }}
                                </td>

                                <td class="fw-semibold">
                                    ${{ number_format($service->price, 2) }}
                                </td>

                                <td>
                                    <span class="badge-duration">
                                        <i class="bi bi-clock"></i>
                                        {{ $service->duration }} min
                                    </span>
                                </td>

                                <td>
                                    @if ($service->img)
                                        <img src="{{ asset('storage/' . $service->img) }}" class="service-img">
                                    @else
                                        <span class="text-muted small">No disponible</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="actions-group d-flex justify-content-center gap-2">

                                        {{-- Editar --}}
                                        <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editServiceModal{{ $service->id }}" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        {{-- Eliminar --}}
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-outline-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-5 text-muted">
                                    <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                    No hay servicios registrados.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>


        </div>
        <div class="card-footer d-flex justify-content-end mt-3">
            {{ $services->links() }}
        </div>

    </div>
    @foreach ($services as $service)
        <x-edit-servive-modal :service="$service" />
    @endforeach

</div>
