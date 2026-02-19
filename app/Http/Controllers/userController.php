<?php

namespace App\Http\Controllers;

use App\Http\Requests\usuariosRequest;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(Request $request)
    {
        $search=$request->search;

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
        })->paginate(8)->withQueryString();
        return view('users.index', compact('users', 'search'));
    }

    public function store(usuariosRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role
            ]);
            return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
        } catch (\Throwable $e) {

            return back()->with('error', 'Ocurrió un error inesperado');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error al eliminar el usuario: ' . $e->getMessage());
        }
    }
    public function update(usuariosRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->nameEdit;
            $user->email = $request->emailEdit;
            if ($request->filled('passwordEdit')) {
                $user->password = bcrypt($request->passwordEdit);
            }
            $user->role = $request->roleEdit;
            $user->save();

            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
        }
         catch (\Throwable $e) {

            return back()->with('error', 'Ocurrió un error inesperado');
        }
    }

}
