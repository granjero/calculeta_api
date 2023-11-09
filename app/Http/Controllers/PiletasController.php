<?php

namespace App\Http\Controllers;

use App\Models\Piletas;
use Illuminate\Http\Request;

// use App\Models\User;


// use Illuminate\Http\Request;

class PiletasController extends Controller
{
    //
    public function index(){
        // dump(User::all());
        foreach (Piletas::all() as $key => $value) {
            echo $key;
            echo " - ";
            echo $value;
            echo PHP_EOL;
        }
        echo "EOL".PHP_EOL;
    }

    public function store(Request $request) {
        $piletas = new Piletas();
        $piletas->pileta = $request->pileta;
        $piletas->save();
        // dd($request->pileta);
        // $piletas = Piletas::create($request);
        return response()->json(['pileta' => $request->pileta], 201);
    }
}
