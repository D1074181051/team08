<?php

namespace App\Http\Controllers;

use App\Models\Antique;
use App\Models\Dynasty;
use Carbon\Carbon;
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
        return view('dynastys.create');
    }

    public function  edit($id)
    {
        $temp = Dynasty::findOrFail($id);
        $dynasty = $temp->toArray();
        return view('dynastys.edit', $dynasty);
    }

    public function  show($id)
    {
        $temp = Dynasty::findOrFail($id);
        $tab = $temp->toArray();
        return view('dynastys.show', $tab);
    }

    public function  store(Request $request)
    {
        $t_name = $request->input('t_name');
        $vids = $request->input('vids');
        $capital = $request->input('capital');

        Dynasty::create([
            't_name' => $t_name,
            'vids' => $vids,
            'capital' => $capital,
            'created' => Carbon::now()
        ]);

        return redirect('dynastys');
    }

    public function  update($id, Request $request)
    {
        $dynasty = Dynasty::findOrFail($id);

        $dynasty->t_name = $request->input('t_name');
        $dynasty->vids = $request->input('vids');
        $dynasty->capital = $request->input('capital');
        $dynasty->save();

        return redirect('dynastys');
    }

    public function destroy($id)
    {
        $dynasty = Dynasty::findOrFail($id);
        $dynasty->delete();
        return redirect('dynastys');
    }
}
