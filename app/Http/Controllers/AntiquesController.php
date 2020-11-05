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
            'p_name'=>'羅馬競技場',
            'dynasty_ID'=>4,
            'location'=>'義大利羅馬市中心',
            'long'=>187,
            'width'=>155,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()]);
        return view('antiques.create',$temp);
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
