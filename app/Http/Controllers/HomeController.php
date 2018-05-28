<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interviniente as Interviniente;
use App\Models\Caso as Caso;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $casos = Caso::getCasosPorPeriodo('2018', '05');
        $casos_preparacion = Caso::getCasosEnPreparacion('2018' ,'05');
        $intervinientes = Interviniente::getCreadosPorPeriodo('2018', '05');
        return view('home')->with(['intervinientes'=> $intervinientes,
                                        'casos' => $casos,
                                        'casos_preparacion' => $casos_preparacion]);
    }
}
