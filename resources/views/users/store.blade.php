<div class="col-md-4 mb-4">
    <div class="card section-card h-100">

        <!-- HEADER -->
        <div class="card-header">
            <i class="bi bi-person-plus me-2"></i>Nuevo Usuario
        </div>

        <!-- BODY -->
        <div class="card-body">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- NOMBRE -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-person"></i>
                        </span>
                        <input name="name" type="text"
                            class="form-control"
                            placeholder="Ej. Juan Pérez"
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input name="email" type="email"
                            class="form-control"
                            placeholder="correo@ejemplo.com"
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input name="password" type="password"
                            class="form-control"
                            placeholder="********">
                    </div>
                    @error('password')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ROL -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Rol del usuario</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-shield"></i>
                        </span>
                        <select name="role" class="form-select">
                            <option value="">Selecciona un rol</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="barbero" {{ old('role') == 'barbero' ? 'selected' : '' }}>Barbero</option>
                            <option value="cliente" {{ old('role') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                        </select>
                    </div>
                    @error('role')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- BOTÓN -->
                <button class="btn btn-dark w-100 btn-icon" type="submit">
                    <i class="bi bi-person-plus"></i>
                    Crear usuario
                </button>

            </form>

        </div>
    </div>
</div>
