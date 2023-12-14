<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPiletas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $piletas = curl_exec(curl_init('https://dukarevich.com.ar/api/c/ultimas10'));
        $piletas = file_get_contents('https://dukarevich.com.ar/api/c/ultimas10');
        $piletas = json_decode($piletas);

        foreach ($piletas as $pileta) {
            $pileta->totalPiletas = substr_count($pileta->pileta, 'P'); // cuento total piletas
            $pileta->piletas = explode("|", $pileta->pileta);
        }

        // dd($piletas);

        return view('piletas.piletas')->with('piletas', $piletas ?? ['caca']);
    }

    public function ultima()
    {
        // $piletas = curl_exec(curl_init('https://dukarevich.com.ar/api/c/ultimas10'));
        $piletas = file_get_contents('https://dukarevich.com.ar/api/c/ultimas10');
        $piletas = json_decode($piletas);

        foreach ($piletas as $pileta) {
            $pileta->totalPiletas = substr_count($pileta->pileta, 'P'); // cuento total piletas
            $pileta->piletas = explode("|", $pileta->pileta);
        }

        // dd($piletas);

        return view('piletas.piletas')->with('piletas', $piletas ?? ['caca']);
    }

    public function pileta(string $id)
    {
        // $piletas = curl_exec(curl_init('https://dukarevich.com.ar/api/c/ultimas10'));
        $pileta = file_get_contents("https://dukarevich.com.ar/api/c/pileta/$id");


        $pileta = json_decode($pileta);
        $pileta->piletas = substr_count($pileta->pileta, "P");
        preg_match_all('/\d+/', $pileta->pileta, $matches);
        $tiempoTotal = array_sum($matches[0]);
        $pileta->tiempoTotal = $tiempoTotal;
        $series = explode("|",$pileta->pileta);
        foreach($series as $id => $serie) {
            $series[$id] = explode(',', $serie);
        }
        $pileta->series = $series;
        return view('piletas.pileta')->with('pileta', $pileta ?? ['caca']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
