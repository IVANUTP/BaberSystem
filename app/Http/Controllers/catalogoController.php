<?php

namespace App\Http\Controllers;

use App\Models\servicesModel;
use Illuminate\Http\Request;

class catalogoController extends Controller
{
    public function index()
    {
        $services=servicesModel::all();
        return view('catalogo.index',compact('services'));
    }
}
