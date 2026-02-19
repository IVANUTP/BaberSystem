<?php

namespace App\Http\Controllers;

use App\Http\Requests\serviciosRequest;
use App\Models\servicesModel;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class serviceController extends Controller
{
    public function index(Request $request)
    {
        $search=$request->search;

        $services=servicesModel::when($search,function($query,$search){
            $query->where('name','like','%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->paginate(5)
        ->withQueryString();

        return view('services.index',compact('services','search'));
    }

    public function store(serviciosRequest $request)
    {

        try {
            $path=null;

            if($request->hasFile('img')){
                $path=$request->file('img')->store('services_images','public');
            }

            servicesModel::create([
                'name' => $request->name,
                'price' => $request->price,
                'duration' => $request->duration,
                'img' => $path,
                'description'=>$request->description
            ]);


            return redirect()->route('services.index')->with('success', 'Servicio creado correctamente');

        } catch (\Throwable $e) {

            return back()->with('error', 'Ocurrió un error inesperado');
        }


    }
    public function destroy($id)
    {
        try {
            $service = servicesModel::findOrFail($id);
            $service->delete();

            return redirect()->route('services.index')->with('success', 'Servicio eliminado correctamente');
        }
        catch (\Exception $e) {
            return redirect()->route('services.index')->with('error', 'Error al eliminar el servicio: ' . $e->getMessage());
        }
    }

    public function update(serviciosRequest $request, $id)
    {
        try {
            $service = servicesModel::findOrFail($id);

            $service->name = $request->input('nameEdit');
            $service->price = $request->input('priceEdit');
            $service->duration = $request->input('durationEdit');
            $service->description=$request->input('descriptionEdit');

            if ($request->hasFile('imgEdit')) {
                $path = $request->file('imgEdit')->store('services_images', 'public');
                $service->img = $path;
            }

            $service->save();

            return redirect()->route('services.index')->with('success', 'Servicio actualizado correctamente');
        }  catch (\Throwable $e) {

            return back()->with('error', 'Ocurrió un error inesperado');
        }
    }
}
