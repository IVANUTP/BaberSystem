 <div class="col-lg-4">
                <div class="card section-card h-100">

                    <div class="card-header">
                        <i class="bi bi-scissors me-2"></i>Nuevo Servicio
                    </div>

                    <div class="card-body">

                        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nombre</label>
                                <input name="name" type="text" class="form-control" placeholder="Ej. Corte Fade">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Descripción</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Duración</label>
                                <input name="duration" type="number" class="form-control" placeholder="Minutos">
                                @error('duration')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Precio</label>
                                <input name="price" type="number" step="0.01" class="form-control"
                                    placeholder="$">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Imagen</label>
                                <input name="img" type="file" class="form-control">
                                @error('img')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button class="btn btn-dark w-100 btn-icon">
                                <i class="bi bi-save"></i> Guardar Servicio
                            </button>

                        </form>

                    </div>
                </div>
            </div>
