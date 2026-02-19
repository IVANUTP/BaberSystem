<div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <form action="{{ route('services.update', $service->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- HEADER --}}
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-semibold">
                        <i class="bi bi-pencil-square me-2"></i>
                        Editar Servicio
                    </h5>
                    <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
                </div>

                {{-- BODY --}}
                <div class="modal-body px-4 py-3">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nombre</label>
                            <input type="text" name="nameEdit"
                                   class="form-control"
                                   value="{{ $service->name }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Duración</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-clock"></i>
                                </span>
                                <input type="number" name="durationEdit"
                                       class="form-control"
                                       value="{{ $service->duration }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Precio</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01"
                                       name="priceEdit"
                                       class="form-control"
                                       value="{{ $service->price }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Descripción</label>
                            <textarea name="descriptionEdit"
                                      class="form-control"
                                      rows="3">{{ $service->description }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Actualizar Imagen</label>
                            <input type="file" name="imgEdit" class="form-control">
                        </div>

                        @if($service->img)
                        <div class="col-12">
                            <div class="p-3 bg-light rounded border d-flex align-items-center gap-3">
                                <img src="{{ asset('storage/' . $service->img) }}"
                                     style="width:100px;height:70px;object-fit:cover;border-radius:6px;">

                                <div class="text-muted small">
                                    Imagen actual registrada.<br>
                                    Solo seleccione otra si desea reemplazarla.
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button"
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-check-circle me-1"></i>
                        Guardar Cambios
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
