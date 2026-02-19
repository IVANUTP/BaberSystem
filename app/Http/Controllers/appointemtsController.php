<?php

namespace App\Http\Controllers;

use App\Models\appointmentsModel;
use App\Models\User;
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
                return redirect()->route('sheet.index')->with('error', 'Usuario no autenticado.');
            }

            appointmentsModel::create([
                'user_id' => $user->id,
                'barber_id' => $request->employee_id,
                'service_id' => $request->service_id,
                'date' => $request->date,
                'time' => $request->time,

            ]);

            return redirect()->route('sheet.index')->with('success', 'Cita creada exitosamente.');

        } catch (\Exception $e) {
            return redirect()->route('sheet.index')->with('error', 'Error al crear la cita: ' . $e->getMessage());
        }

    }
    public function update(Request $request, $id)
    {
        try {
            $appointment = appointmentsModel::findOrFail($id);
            $appointment->update([
                'barber_id' => $request->barberoEdit,
                'date' => $request->dateEdit,
                'time' => $request->timeEdit,
                'status' => $request->statusEdit,
            ]);

            return redirect()->route('appointments.index')->with('success', 'Cita actualizada exitosamente.');
        } catch (\Throwable $e) {

            return back()->with('error', 'Ocurrió un error inesperado');
        }

    }
    public function destroy($id)
    {
        try {
            $appointment = appointmentsModel::findOrFail($id);
            $appointment->delete();

            return redirect()->route('appointments.index')->with('success', 'Cita eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('appointments.index')->with('error', 'Error al eliminar la cita: ' . $e->getMessage());
        }
    }
}
