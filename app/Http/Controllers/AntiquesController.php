<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAntiqueRequest;
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

        $antiques = Antique:: all();
        $locations = Antique::allLocation()->get();
        $data = [];
        foreach ( $locations as $location)
        {
            $data["$location->location"] = $location->location;
        }
        return view('antiques.index', ['antiques' => $antiques, 'locations' => $data]);
    }

    public function api_antiques()
    {
        return Antique::all();
    }

    public function api_update(Request $request)
    {
        $antique = Antique::find($request->input('id'));
        if ($antique == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        $antique->p_name = $request->input('p_name');
        $antique->dynasty_ID = $request->input('dynasty_ID');
        $antique->location = $request->input('location');
        $antique->long = $request->input('long');
        $antique->width = $request->input('width');
        if ($antique->save())
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
        $antique = Antique::find($request->input('id'));

        if ($antique == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($antique->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }

    }

    public function  small()
    {
        $antiques = Antique:: small()->get();
        $locations = Antique::allLocation()->get();
        $data = [];
        foreach ($locations as $location)
        {
            $data["$location->location"] = $location->location;
        }
        return view('antiques.index', ['antiques' => $antiques, 'locations' => $data]);
    }

    public function location(Request $request)
    {
        $antiques = Antique::location($request->input('pos'))->get();

        $locations = Antique::allLocation()->get();
        $data = [];
        foreach ($locations as $location)
        {
            $data["$location->location"] = $location->location;
        }
        return view('antiques.index', ['antiques' => $antiques, 'locations' => $data]);
    }

    public function  create()
    {
        $dynastys =DB::table('dynastys')
            ->select('dynastys.id', 'dynastys.t_name')
            ->orderBy('dynastys.id', 'asc')
            ->get();

        $data = [];
        foreach ($dynastys as $dynasty)
        {
            $data[$dynasty->id] = $dynasty->t_name;
        }
        return view('antiques.create', ['dynastys' => $data]);
    }

    public function  edit($id)
    {
        $antique = Antique::findOrFail($id);
        $dynastys =DB::table('dynastys')
            ->select('dynastys.id', 'dynastys.t_name')
            ->orderBy('dynastys.id', 'asc')
            ->get();

        $data = [];
        foreach ($dynastys as $dynasty)
        {
            $data[$dynasty->id] = $dynasty->t_name;
        }

        return view('antiques.edit', ['antique' => $antique, 'dynastys' => $data]);
    }

    public function  show($id)
    {
        $antique = Antique::findOrFail($id);
        $dynasty = Dynasty::findOrFail($antique->dynasty_ID);

        return view('antiques.show', ['antique' => $antique, 'dynasty_name' => $dynasty->t_name]);
    }

    public function  store(CreateAntiqueRequest $request)
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

    public function  update($id, CreateAntiqueRequest $request)
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
