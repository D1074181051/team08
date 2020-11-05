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
        $dynasty->t_name = "維特爾斯巴赫王朝";
        $dynasty->vids = "1308~1410";
        $dynasty->capital = "維特爾斯巴赫城堡";
        $dynasty->save();

        return view('dynastys.create', $dynasty);
    }

    public function  edit($id)
    {
        $temp = Dynasty::findOrFail($id);
        $temp->t_name = "哈布斯堡王朝";
        $temp->vids = "1273~1556";
        $temp->capital = "無";
        $temp->save();

        $dynasty = $temp->toArray();
        return view('dynastys.edit', $dynasty);
    }

    public function  show($id)
    {
        $temp = Dynasty::find($id);
        if($temp == null)
        {
            return "no";
        }
        $tab = $temp->toArray();
        return view('dynastys.show', $tab);
    }
}
