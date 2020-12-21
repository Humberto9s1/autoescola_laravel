<?php

namespace App\Http\Controllers;

use App\Models\instrutor;
use App\Models\instrutore;
use Illuminate\Http\Request;

class CadInstrutoresController extends Controller
{
    public function index(){
        $inst = instrutore::orderby('id', 'desc')->paginate();
        return view('painel-admin.instrutores.index', ['inst' => $inst]);
    }
}
