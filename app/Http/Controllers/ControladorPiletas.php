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
            // $piletas = file_get_contents('https://dukarevich.com.ar/api/c/ultimas10');
            // $piletas = json_decode($piletas);
            //
            // foreach ($piletas as $pileta) {
            //     $pileta->totalPiletas = substr_count($pileta->pileta, 'P'); // cuento total piletas
            //     $pileta->series = explode("|", $pileta->pileta);
            //
            //     $tiempoTotal = 0;
            //     foreach ($pileta->series as $serie) {
            //         preg_match_all('/\d+/', $serie, $matches);
            //         $tiempoTotal += array_sum($matches[0]);
            //     }
            //     $pileta->tiempoTotal = $tiempoTotal;
            // }
            //
            // // dd($pileta->series);
            return view('index')->with('breadcrumbs', ['inicio' => "/inicio"]);
            // return view('layout.layout');
    }

    /**
     * Display a listing of the resource.
     */
    public function inicio(Request $request)
    {
        if ($request->header('hx-request')) {
            $piletas = file_get_contents('https://dukarevich.com.ar/api/c/ultimas10');
            $piletas = json_decode($piletas);

            foreach ($piletas as $pileta) {
                $pileta->totalPiletas = substr_count($pileta->pileta, 'P'); // cuento total piletas
                $pileta->series = explode("|", $pileta->pileta);

                $tiempoTotal = 0;
                foreach ($pileta->series as $serie) {
                    preg_match_all('/\d+/', $serie, $matches);
                    $tiempoTotal += array_sum($matches[0]);
                }
                $pileta->tiempoTotal = $tiempoTotal;
            }

            // dd($pileta->series);
            return view('piletas.inicio')->with('piletas', $piletas)->with('breadcrumbs', ["inicio" => "/inicio"]);
        }
    }

    public function ultima()
    {
        return "Todavía no hay nada acá.";
    }

    public function acerca(Request $request)
    {
        if ($request->header('hx-request'))
            return view('piletas.acerca')->with('breadcrumbs', ["inicio" => "/inicio", 'acerca' => '/acerca']);
    }

    public function como(Request $request)
    {
        if ($request->header('hx-request'))
            return "Todavía no hay nada acá.";
    }

    public function pileta(string $id)
    {
        $link = $id;
        $pileta = file_get_contents("https://dukarevich.com.ar/api/c/pileta/$id");
        $pileta = json_decode($pileta);

        if (isset($pileta->error)) return $pileta->error;

        $pileta->piletas = substr_count($pileta->pileta, "P");
        preg_match_all('/\d+/', $pileta->pileta, $matches);
        $tiempoTotal = array_sum($matches[0]);
        $pileta->tiempoTotal = $tiempoTotal;
        $series = explode("|", $pileta->pileta);
        $datosSerie = [];
        foreach ($series as $id => $serie) {
            $cantPiletasSerie = 0;
            $series[$id] = explode(',', $serie);
            $serieD = 0;
            $serieP = 0;
            foreach($series[$id] as $datos) {
                $dato = explode(':', $datos);
                if ($dato[0] == 'P'){
                    $serieP += $dato[1];
                    $cantPiletasSerie++;
                }
                else $serieD += $dato[1];
            }
            $promedioPileta = $serieP / $cantPiletasSerie;
            $datosSerie[$id] = ["P" => sprintf("%02d", floor($serieP/60)) . ":" . sprintf("%02d", floor($serieP%60)),
                                "D" => sprintf("%02d", floor($serieD/60)) . ":" . sprintf("%02d", floor($serieD%60)),
                                "segundosSerie" => $serieP,
                                "promedio" => sprintf("%ds", $promedioPileta)

            ];
        }
        $pileta->series = $series;
        $pileta->datosSeries = $datosSerie;
        return view('piletas.pileta')->with('pileta', $pileta)->with('breadcrumbs', ["inicio" => "/inicio", "pileta" => "/pileta/$link"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function delay()
    {
        sleep(10);
        return "caca";
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
