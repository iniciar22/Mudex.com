<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;
    
    public function __construct() {
        $categorias = \Shoppvel\Models\Categoria::all();

        View::share ( 'categorias', $categorias );

        $produtos = \Shoppvel\Models\Produto::all();

        View::share ( 'produtos', $produtos );

        $marcas = \Shoppvel\Models\Marca::all();

        View::share ( 'marcas', $marcas );
    }
}