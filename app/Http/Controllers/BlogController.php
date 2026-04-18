<?php

namespace App\Http\Controllers;

use App\Models\blogModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $blogs=blogModel::all();

        return view('blog.blogIndex',compact('blogs'));;
    }
}
