<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogRequest;
use App\Models\blogModel;
use Illuminate\Http\Request;

class BlogAdministrativoController extends Controller
{
    public function index(Request $request)
    {
        $search=$request->search;

        $blogs = blogModel::when($search,function($query,$search){
            $query->where('titulo','like','%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->paginate(5)
        ->withQueryString();

        return view('blogAdmin.index' , compact('blogs','search'));
    }
     public function store(blogRequest $request)
    {

        try {
            $path=null;

            if($request->hasFile('imagen')){
                $path=$request->file('imagen')->store('blog_images','public');
            }
            //dd($path);

            blogModel::create([
                'titulo' => $request->title,
                'descripcion' => $request->description,
                'imagen' => $path
            ]);


            return redirect()->route('blogAdmin.index')->with('success', 'Blog creado correctamente');

        } catch (\Throwable $e) {

            return back()->with('error', 'Ocurrió un error inesperado');
        }
    }
    public function destroy($id)
    {
        try {
            $blog = blogModel::findOrFail($id);
            $blog->delete();

            return redirect()->route('blogAdmin.index')->with('success', 'Blog eliminado correctamente');
        } catch (\Throwable $e) {
            return back()->with('error', 'Ocurrió un error inesperado');
        }
    }
}
