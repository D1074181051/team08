<?php

namespace App\Http\Controllers;

use App\Models\Antique;
use App\Models\Dynasty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntiquesController extends Controller
{
    //
    public function  index()
    {
        /*$antique = Antique::all();

        return view('antiques.index', ['antiques'=> $antique]);
        */

        $antiques = DB::table('antiques')
            ->join('dynastys', 'antiques.dynasty_ID', '=', 'dynastys.id')
            ->orderBy('antiques.id')
            ->select(
                'antiques.id',
                'antiques.p_name',
                'dynastys.t_name',
                'antiques.location',
                'antiques.long',
                'antiques.width'
            )->get();
        return view('antiques.index', ['antiques' => $antiques]);
    }

    public function  create()
    {
        return view('antiques.create');
    }

    public function  edit($id)
    {
        $temp = Antique::findOrFail($id);
        $antique = $temp->toArray();
        return view('antiques.edit', $antique);
    }

    public function  show($id)
    {
        $temp = Antique::findOrFail($id);

        $tab = $temp->toArray();
        return view('antiques.show',$tab);//->with("antique_id" ,$id);
    }

    public function  store(Request $request)
    {
        $p_name = $request->input('p_name');
        $dynasty_ID = $request->input('dynasty_ID');
        $location = $request->input('location');
        $long = $request->input('long');
        $width = $request->input('width');

        Antique::create([
            'p_name' => $p_name,
            'dynasty_ID' => $dynasty_ID,
            'location' => $location,
            'long' => $long,
            'width' => $width,
            'created' => Carbon::now()
        ]);

        return redirect('antiques');
    }

    public function  update($id, Request $request)
    {
        $antique = Antique::findOrFail($id);

        $antique->p_name = $request->input('p_name');
        $antique->dynasty_ID = $request->input('dynasty_ID');
        $antique->location = $request->input('location');
        $antique->long = $request->input('long');
        $antique->width = $request->input('width');
        $antique->save();

        return redirect('antiques');
    }

    public function destroy($id)
    {
        $antique = Antique::findOrFail($id);
        $antique->delete();
        return redirect('antiques');
    }
}
