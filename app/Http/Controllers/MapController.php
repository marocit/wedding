<?php

namespace App\Http\Controllers;

use App\Map;
use App\Http\Requests\MapRequest;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('home');
    }

     public function store(MapRequest $request)
    {
        // $this->validate($request, [
        //     'title'  => 'required|unique:maps',
        //     'lat' => 'required',
        //     'lng' => 'required',
        // ]);

        $input = $request->all();
        Map::create($input);

        return redirect(route('map'));
    }

    public function getAll()
    {
        return view('map');
    }

    public function fetchAll()
    {
       $fetch = Map::all();

       return response()->json($fetch, 200);
    }


}
