<?php

namespace App\Http\Controllers;

use App\Models\Dynasty;
use Illuminate\Http\Request;

class DynastysController extends Controller
{
    //
    public function  index()
    {
        $dynasty = Dynasty::all();
        return view('dynastys.index', ['dynastys'=>$dynasty]);
    }

    public function  create()
    {
        $dynasty = new Dynasty;
        $dynasty->id;
        $dynasty->t_name = "無";
        $dynasty->vids = "0000~1111";
        $dynasty->capital = "無";
        $dynasty->save();

        return view('dynastys.create', $dynasty);
    }

    public function  edit($id)
    {
        $temp = Dynasty::findOrFail($id);
        $temp->t_name = "無";
        $temp->vids = "1111~2222";
        $temp->capital = "無";
        $temp->save();

        $dynasty = $temp->toArray();
        return view('dynastys.edit', $dynasty);
    }

    public function  show($id)
    {
        $temp = Dynasty::findOrFail($id);
        $tab = $temp->toArray();
        return view('dynastys.show', $tab);
    }
}
