<div class="col-md-8 mb-4">
    <div class="card section-card h-100">

        <!-- HEADER -->

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">

            <div class="fw-semibold">
                <i class="bi bi-list-ul me-2"></i>Usuarios Registrados
            </div>

            <form method="GET" action="{{ route('users.index') }}" class="d-flex" role="search">

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
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-x-circle"></i>
                        Limpiar búsqueda
                    </a>
                </div>
            @endif

        </div>


        <!-- BODY -->
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <!-- HEAD -->
                    <thead>
                        <tr>
                            <th class="ps-4">Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th class="text-center pe-4">Acciones</th>
                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <!-- NOMBRE -->
                                <td class="ps-4 fw-semibold">
                                    {{ $user->name }}
                                </td>

                                <!-- EMAIL -->
                                <td class="text-muted">
                                    {{ $user->email }}
                                </td>

                                <!-- ROL -->
                                <td>
                                    <span class="badge-duration">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>

                                <!-- ACCIONES -->
                                <td class="text-center pe-4">
                                    <div class="actions-group d-flex justify-content-center gap-2">

                                        <!-- EDITAR -->
                                        <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editUserModal{{ $user->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- ELIMINAR -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="m-0 delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                            <!-- MODAL -->
                            <x-edit-users-modal :user="$user" />
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-end mt-3">
            {{ $users->links() }}
        </div>

    </div>
</div>
