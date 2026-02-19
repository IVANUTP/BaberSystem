@foreach ($services as $service)
    <div class="modal fade" id="serviceModal{{ $service->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <h2 class="modal-title fw-bold">
                        {{ $service->name }}
                    </h2>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body pt-2">

                    <!-- Imagen -->
                    <div class="text-center mb-4">
                        <img src="{{ $service->img ? asset('storage/' . $service->img) : asset('assets/img/default-service.jpg') }}"
                            class="img-fluid rounded-4 w-100" style="max-height: 320px; object-fit: cover;"
                            alt="{{ $service->name }}">
                    </div>

                    <!-- Descripción -->
                    <p class="text-muted text-center mb-4">
                        {{ $service->description }}
                    </p>

                    <!-- Info -->
                    <div class="d-flex justify-content-center gap-4">
                        <div class="text-center">
                            <div class="fw-bold fs-5">
                                ${{ $service->price }}
                            </div>
                            <small class="text-muted">MXN</small>
                        </div>

                        <div class="text-center">
                            <div class="fw-bold fs-5">
                                {{ $service->duration }}
                            </div>
                            <small class="text-muted">minutos</small>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 justify-content-between">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>

                    <button class="btn btn-dark px-4" data-bs-toggle="modal"
                        data-bs-target="#reserveModal{{ $service->id }}" data-bs-dismiss="modal">
                        Reservar cita
                    </button>
                </div>

            </div>
        </div>
    </div>
@endforeach
@foreach ($services as $service)
    <div class="modal fade" id="reserveModal{{ $service->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">

                <form action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Header -->
                    <div class="modal-header border-0 pb-0">
                        <h3 class="modal-title fw-bold">
                            Confirmar reserva
                        </h3>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body pt-2">

                        <!-- Servicio seleccionado -->
                        <div class="border rounded-3 p-3 mb-4 bg-light">
                            <p class="mb-1 text-muted small">
                                Servicio seleccionado
                            </p>
                            <div class="fw-bold fs-5">
                                {{ $service->name }}
                            </div>
                            <small class="text-muted">
                                ${{ $service->price }} MXN · {{ $service->duration }} minutos
                            </small>
                        </div>

                        <input type="hidden" name="service_id" value="{{ $service->id }}">

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Fecha de la cita
                            </label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="mb-4">

                          <input type="hidden" name="employee_id" value="{{ $barberos->first()->id }}">
                          <div class="alert alert-info small">
                                Barbero asignado automáticamente: <strong>{{ $barberos->first()->name }}</strong>
                            </div>


                        </div>

                        <!-- Hora -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Hora
                            </label>
                            <input type="time" name="time" class="form-control" required>
                        </div>


                        <!-- Aviso -->
                        <div class="alert alert-warning small mb-0">
                            Llegar 5 minutos antes de la hora reservada.
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button type="submit" class="btn btn-dark px-4">
                            Confirmar cita
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endforeach
