<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadInstrutoresController extends Controller
{
    public function index(){
        $inst = instrutor::orderby('id', 'desc')->paginate();
        return view('instrutores.index', ['inst' => $inst]);
    }
}
