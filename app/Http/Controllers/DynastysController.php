<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDynastyRequest;
use App\Models\Antique;
use App\Models\Dynasty;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DynastysController extends Controller
{
    //
    public function  index()
    {
        $dynastys = Dynasty::all();
        $capitals = Dynasty::allCapital()->get();
        $data = [];
        foreach ($capitals as $capital)
        {
            $data["$capital->capital"] = $capital->capital;
        }
        return view('dynastys.index', ['dynastys' => $dynastys, 'capitals' => $data]);
    }

    public function api_dynastys()
    {
        return Dynasty::all();
    }

    public function api_update(Request $request)
    {
        $dynasty = Dynasty::find($request->input('id'));
        if ($dynasty == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        $dynasty->t_name = $request->input('t_name');
        $dynasty->s_time = $request->input('s_time');
        $dynasty->e_time = $request->input('e_time');
        $dynasty->capital = $request->input('capital');
        if ($dynasty->save())
        {
            return response()->json([
                'status' => 1,
            ]);
        } else {
            return  response()->json([
                'status' => 0,
            ]);
        }
    }

    public function api_delete(Request $request)
    {
        $dynasty = Dynasty::find($request->input('id'));

        if ($dynasty == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($dynasty->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }

    }

    public function capital(Request $request)
    {
        $dynastys = Dynasty::capital($request->input('pos'))->get();

        $capitals = Dynasty::allCapital()->get();
        $data = [];
        foreach ($capitals as $capital)
        {
            $data["$capital->capital"] = $capital->capital;
        }
        return view('dynastys.index', ['dynastys' => $dynastys, 'capitals' => $data]);
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
        $dynasty = Dynasty::findOrFail($id);
        $antiques = $dynasty->antiques;
        //return $dynasty;
        return view('dynastys.show', ['dynasty'=>$dynasty, 'antiques'=>$antiques]);
    }

    public function  store(CreateDynastyRequest $request)
    {
        $t_name = $request->input('t_name');
        $s_time = $request->input('s_time');
        $e_time = $request->input('e_time');
        $capital = $request->input('capital');

        Dynasty::create([
            't_name' => $t_name,
            's_time' => $s_time,
            'e_time' => $e_time,
            'capital' => $capital,
            'created' => Carbon::now()
        ]);

        return redirect('dynastys');
    }

    public function  update($id, CreateDynastyRequest $request)
    {
        $dynasty = Dynasty::findOrFail($id);

        $dynasty->t_name = $request->input('t_name');
        $dynasty->s_time = $request->input('s_time');
        $dynasty->e_time = $request->input('e_time');
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
