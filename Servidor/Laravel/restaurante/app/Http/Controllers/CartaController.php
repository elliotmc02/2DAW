<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function index()
    {
        $mensaje = "Esta es mi carta";

        $bebidas = [
            ["Eneryeti", 1.20],
            ["Missile", 2],
            ["Mountain Dew", 3.5,]
        ];

        $platos = [
            ["Tortilla de patatas", 4.95, "Racion"],
            ["Chuletillas de cordero", 9.95, "Racion"],
            ["Ensaladilla rusa", 3.5, "Tapa"]
        ];

        return view(
            'carta/index',
            ['mensaje' => $mensaje, 'platos' => $platos, 'bebidas' => $bebidas]
        );
    }
}
