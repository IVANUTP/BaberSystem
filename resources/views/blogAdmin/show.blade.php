<div class="col-lg-8">
    <div class="card section-card h-100">

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">

            <div class="fw-semibold">
                <i class="bi bi-list-ul me-2"></i>Blogs Registrados
            </div>
            <form method="GET" action="{{ route('blogAdmin.index') }}" class="d-flex" role="search">

                <div class="input-group input-group-sm" style="width: 260px;">
                    <span class="input-group-text bg-black text-white border-0">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text" name="search" value="{{ $search }}"
                        class="form-control border-0 shadow-none" placeholder="Buscar blog...">

                    <button class="btn btn-dark">
                        Buscar
                    </button>
                </div>

            </form>
            @if ($search)
                <div class="mb-3">
                    <a href="{{ route('blogAdmin.index') }}" class="btn btn-outline-secondary btn-sm">
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
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">

                        @forelse ($blogs as $blog)
                            <tr>

                                <td class="fw-semibold">{{ $blog->titulo }}</td>

                                <td class="text-muted">
                                    {{ $blog->descripcion ?? 'Sin descripción' }}
                                </td>

                                <td>
                                    @if ($blog->imagen)
                                        <img src="{{ asset('storage/' . $blog->imagen) }}" width="200"
                                            class="service-img">
                                    @else
                                        <span class="text-muted small">No disponible</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="actions-group d-flex justify-content-center gap-2">


                                        <form action="{{ route('blogAdmin.destroy', $blog->id) }}" method="POST"
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
                                    No hay blogs registrados.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>


        </div>


    </div>


</div>
