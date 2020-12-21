<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){
        
        $usuario = $request->usuario;
        $senha = $request->senha;

        $usuarios = usuario::where('usuario', '=', $usuario)->where('senha', '=', $senha)->first();
        
        if(@$usuarios->id != null){
            @session_start();
            $_SESSION['id_usuario'] = $usuarios->id;
            $_SESSION['nome_usuario'] = $usuarios->nome;
            $_SESSION['nivel_usuario'] = $usuarios->nivel;
            $_SESSION['cpf_usuario'] = $usuarios->cpf;
            
            if($_SESSION['nivel_usuario'] == 'admin'){
                return view('produtos.create');
            }else{
                $produtos = produto::orderby('id', 'desc')->paginate();
                return view('produtos.index', ['produtos' => $produtos]);
            }
            
            
    	    

        }else{
            echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            return view('home');
        }
        
       
    }


    public function logout(){
       @session_start();
       @session_destroy();
       return view('home');
    }

}
