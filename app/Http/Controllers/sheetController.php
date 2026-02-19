<?php

namespace App\Http\Controllers;

use App\Models\servicesModel;
use App\Models\User;
use Illuminate\Http\Request;

class sheetController extends Controller
{
    public function index()
    {
        $services=servicesModel::all();
        $barberos=User::where('role','barbero')->get();
        return view('catalogo.service', compact('services','barberos'));
    }


}
