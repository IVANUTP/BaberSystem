<?php

namespace App\Http\Controllers;

use App\Models\appointmentsModel;
use App\Models\notificationsModel;
use App\Models\User;
use App\Notifications\AppointmentStatusChanged;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class appointemtsController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search;

        $appointments = appointmentsModel::when($search, function ($query, $search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        })
            ->with(['user', 'barber', 'service'])
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $barbers = User::where('role', 'barbero')->get();

        return view('appointments.index', compact('appointments', 'barbers', 'search'));
    }



    public function store(Request $request)
    {
        try {

            $user = Auth::user();

            if ($user->role != 'cliente') {
                return redirect()->route('sheet.index')->with('error', 'Usuario no autorizado.');
            }

            $barberos = User::where('role', 'barbero')->get();

            $start = Carbon::parse($request->time);
            $end = $start->copy()->addHour();

            $ocupados = appointmentsModel::where('date', $request->date)
                ->where(function ($query) use ($start, $end) {
                    $query->whereBetween('time', [$start->format('H:i:s'), $end->format('H:i:s')])
                        ->orWhereRaw('? BETWEEN time AND ADDTIME(time, "01:00:00")', [$start->format('H:i:s')]);
                })
                ->pluck('barber_id');

            $disponibles = $barberos->whereNotIn('id', $ocupados);

            if ($disponibles->isEmpty()) {
                return back()->with('error', 'No hay barberos disponibles en ese horario');
            }

            $barberoAsignado = $disponibles->first();

            appointmentsModel::create([
                'user_id' => $user->id,
                'barber_id' => $barberoAsignado->id,
                'service_id' => $request->service_id,
                'date' => $request->date,
                'time' => $request->time,
            ]);

            return redirect()->route('sheet.index')->with('success', 'Cita creada exitosamente.');

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try {

            $appointment = appointmentsModel::findOrFail($id);
            // Guardamos el status anterior
            $oldStatus = $appointment->status;
            $appointment->update([
                'barber_id' => $request->barberoEdit,
                'date' => $request->dateEdit,
                'time' => $request->timeEdit,
                'status' => $request->statusEdit,
            ]);
            // Solo notificar si cambió el status
            if ($oldStatus != $request->statusEdit) {

                // 👇 AQUÍ notificas al cliente correcto
                $appointment->user->notify(
                    new AppointmentStatusChanged($appointment)
                );
            }

            return redirect()->route('appointments.index')->with('success', 'Cita actualizada exitosamente.');
        } catch (\Throwable $e) {

            return back()->with('error', 'Ocurrió un error inesperado');
        }

    }
    public function destroy($id)
    {
        try {
            $appointment = appointmentsModel::findOrFail($id);
            if (!in_array($appointment->status, ['cancelada', 'completada'])) {
                return redirect()->route('appointments.index')->with('error', 'Solo se pueden eliminar citas pendientes o confirmadas.');
            }
            $appointment->delete();

            return redirect()->route('appointments.index')->with('success', 'Cita eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('appointments.index')->with('error', 'Error al eliminar la cita: ' . $e->getMessage());
        }
    }

}
