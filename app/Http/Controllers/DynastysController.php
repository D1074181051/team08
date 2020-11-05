<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynastysController extends Controller
{
    //
    public function  index()
    {
        return view('dynastys.index');
    }

    public function  create()
    {
        return view('dynastys.create');
    }

    public function  edit($id)
    {
        return view('dynastys.edit')->with("dynasty_id" ,$id);
    }

    public function  show($id)
    {
        return view('dynastys.show')->with("dynasty_id" ,$id);
    }
}
