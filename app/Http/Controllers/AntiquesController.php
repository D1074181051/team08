<?php

namespace App\Http\Controllers;

use App\Models\Antique;
use Illuminate\Http\Request;

class AntiquesController extends Controller
{
    //
    public function  index()
    {
        return view('antiques.index');
    }

    public function  create()
    {
        return view('antiques.create');
    }

    public function  edit($id)
    {
        return view('antiques.edit')->with("antique_id" ,$id);
    }

    public function  show($id)
    {
        $temp = Antique::find($id);
        if($temp == null)
        {
            return "no";
        }
        $tab = $temp->toArray();
        return view('antiques.show',$tab);//->with("antique_id" ,$id);
    }
}
