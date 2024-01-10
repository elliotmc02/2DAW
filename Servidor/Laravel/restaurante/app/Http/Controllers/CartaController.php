<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Bebida;

class CartaController extends Controller
{
    public function index()
    {
        $mensaje = "Esta es mi carta";
        $platos = Plato::all();
        $bebidas = Bebida::all();

        return view(
            'carta/index',
            ['mensaje' => $mensaje, 'platos' => $platos, 'bebidas' => $bebidas]
        );
    }
}
