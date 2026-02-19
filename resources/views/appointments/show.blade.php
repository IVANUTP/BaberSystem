 <div class="col-md-12 mb-4">
     <div class="card section-card shadow-sm h-100">
         <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">

             <div class="fw-semibold">
                 <i class="bi bi-list-ul me-2"></i>Citas Registradas
             </div>
             <form method="GET" action="{{ route('appointments.index') }}" class="d-flex" role="search">

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
                     <a href="{{ route('appointments.index') }}" class="btn btn-outline-secondary btn-sm">
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
                             <th>Cliente</th>
                             <th>Barbero</th>
                             <th>Fecha</th>
                             <th>Hora</th>
                             <th>Estado</th>
                             <th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody class="text-center">

                         @if ($appointments != null)
                             @foreach ($appointments as $appointment)
                                 <tr>
                                     <td class="fw-semibold">{{ $appointment->user->name }}</td>
                                     <td class="text-muted">{{ $appointment->barber->name }}</td>
                                     <td>{{ $appointment->date->format('d/m/Y') }}</td>
                                     <td> {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
                                     @if ($appointment->status === 'pendiente')
                                         <td><span class="badge bg-warning text-dark">
                                                 {{ $appointment->status }}</span></td>
                                     @elseif ($appointment->status === 'completada')
                                         <td><span class="badge bg-success"> {{ $appointment->status }}</span>
                                         </td>
                                     @elseif ($appointment->status === 'cancelada')
                                         <td><span class="badge bg-danger"> {{ $appointment->status }}</span>
                                         </td>
                                     @elseif ($appointment->status === 'confirmada')
                                         <td><span class="badge bg-info text-white">
                                                 {{ $appointment->status }}</span></td>
                                     @else
                                         <td><span class="badge bg-secondary"> {{ $appointment->status }}</span>
                                         </td>
                                     @endif

                                     <td>
                                         <div class="actions-group d-flex justify-content-center gap-2">
                                             <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                                 data-bs-target="#editAAppointmentModal{{ $appointment->id }}">
                                                 <i class="bi bi-pencil"></i>
                                             </button>
                                             <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                                 method="POST" class="d-inline delete-form">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-outline-danger">
                                                     <i class="bi bi-trash"></i>
                                                 </button>
                                             </form>
                                         </div>

                                     </td>
                                 </tr>
                                 <x-edit-appointemts-modal :appointment="$appointment" :barbers="$barbers" />
                             @endforeach
                         @else
                             <tr>
                                 <td colspan="6" class="text-center text-muted py-4">
                                     <i class="bi bi-exclamation-triangle me-2"></i>
                                     No se encontraron citas.
                                 </td>
                             </tr>

                         @endif


                     </tbody>

                 </table>
             </div>

         </div>
         <div class="card-footer d-flex justify-content-end mt-3">
             {{ $appointments->links() }}
         </div>
     </div>
 </div>
