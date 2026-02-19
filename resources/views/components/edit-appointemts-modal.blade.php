<div class="modal fade" id="editAAppointmentModal{{ $appointment->id }}" tabindex="-1"
    aria-labelledby="editAAppointmentModalLabel{{ $appointment->id }}" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">

            <!-- HEADER -->
            <div class="modal-header bg-black text-white border-0">
                <h5 class="modal-title fw-semibold">
                     Editar Cita
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- FORM -->
            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body px-4 py-4">

                    <!-- BARBERO -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-uppercase small text-muted">
                            Barbero
                        </label>
                        <select name="barberoEdit"
                            id="barberoEdit{{ $appointment->id }}"
                            class="form-select form-select-lg shadow-sm">

                            @foreach ($barbers as $barber)
                                <option value="{{ $barber->id }}"
                                    {{ old('barberoEdit', $appointment->barber_id) == $barber->id ? 'selected' : '' }}>
                                    {{ $barber->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="my-4">

                    <!-- FECHA Y HORA -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-uppercase small text-muted">
                                Fecha
                            </label>
                            <input type="date"
                                name="dateEdit"
                                value="{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}"
                                class="form-control form-control-lg shadow-sm">
                            @error('dateEdit')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-uppercase small text-muted">
                                Hora
                            </label>
                            <input type="time"
                                name="timeEdit"
                                id="timeEdit{{ $appointment->id }}"
                                value="{{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }}"
                                class="form-control form-control-lg shadow-sm">
                            @error('timeEdit')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- ESTADO -->
                    <div class="mb-2">
                        <label class="form-label fw-semibold text-uppercase small text-muted">
                            Estado de la Cita
                        </label>
                        <select name="statusEdit"
                            id="statusEdit{{ $appointment->id }}"
                            class="form-select form-select-lg shadow-sm">

                            @foreach (['pendiente', 'confirmada', 'completada', 'cancelada'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $appointment->status) == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer border-0 px-4 pb-4">

                    <button type="button"
                        class="btn btn-outline-secondary btn-lg px-4"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit"
                        class="btn btn-dark btn-lg px-5 shadow">
                         Actualizar Cita
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
