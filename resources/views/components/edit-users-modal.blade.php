<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- HEADER (igual al de citas) -->
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-person-gear me-2"></i>Editar Usuario
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text"
                               name="nameEdit"
                               class="form-control"
                               value="{{ $user->name }}">
                        @error('nameEdit')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email"
                               name="emailEdit"
                               class="form-control"
                               value="{{ $user->email }}">
                        @error('emailEdit')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Rol -->
                    <div class="mb-3">
                        <label class="form-label">Rol</label>
                        <select name="roleEdit" class="form-control">
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                Administrador
                            </option>
                            <option value="barbero" {{ $user->role === 'barbero' ? 'selected' : '' }}>
                                Barbero
                            </option>
                            <option value="cliente" {{ $user->role === 'cliente' ? 'selected' : '' }}>
                                Cliente
                            </option>
                        </select>
                        @error('roleEdit')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Nueva contraseña</label>
                        <input type="password"
                               name="passwordEdit"
                               class="form-control"
                               placeholder="Opcional">
                        <small class="text-muted">Solo si deseas cambiarla.</small>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-check-lg me-1"></i>Actualizar Usuario
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
