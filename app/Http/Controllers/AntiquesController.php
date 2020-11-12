<?php

namespace App\Http\Controllers;

use App\Models\Antique;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AntiquesController extends Controller
{
    //
    public function  index()
    {
        $antique = Antique::all();

        return view('antiques.index', ['antiques'=> $antique]);
    }

    public function  create()
    {
        $temp=Antique::create([
            'p_name'=>'無',
            'dynasty_ID'=>10,
            'location'=>'無',
            'long'=>187,
            'width'=>155,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()]);
        return view('antiques.create',$temp);
    }

    public function  edit($id)
    {
        $temp = Antique::findOrFail($id);
        $temp->p_name = "無";
        $temp->dynasty_ID = "10";
        $temp->location = "無";
        $temp->long = "12.23";
        $temp->width = "23.45";
        $temp->save();
        $antique = $temp->toArray();
        return view('antiques.edit', $antique);
    }

    public function  show($id)
    {
        $temp = Antique::findOrFail($id);

        $tab = $temp->toArray();
        return view('antiques.show',$tab);//->with("antique_id" ,$id);
    }
}
