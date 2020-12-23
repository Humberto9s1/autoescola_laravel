<?php

namespace App\Http\Controllers;

use App\Models\instrutor;
use App\Models\instrutore;
use Illuminate\Http\Request;

class CadInstrutoresController extends Controller
{
    public function index(){
        $tabela = instrutore::orderby('id', 'desc')->paginate();
        return view('painel-admin.instrutores.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.instrutores.create');
    }

    public function insert(Request $request){        
        $tabela = new instrutore();
        $tabela->nome = $request->nome;
        $tabela->email = $request->email;
        $tabela->cpf = $request->cpf;
        $tabela->telefone = $request->telefone;
        $tabela->endereco = $request->endereco;
        $tabela->credencial = $request->credencial;
        $tabela->data_venc = $request->data;

        $itens = instrutore::where('cpf', '=', $request->cpf)->orwhere('credencial', '=', $request->credencial)->orwhere('email', '=', $request->email)->count();
        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado') </script>";
            return view('painel-admin.instrutores.create');    
        }

        $tabela->save();
        return redirect()->route('instrutores.index');
    }

    public function edit(instrutore $item){
        return view('painel-admin.instrutores.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, instrutore $item){
        $item->nome = $request->nome;
        $item->email = $request->email;
        $item->cpf = $request->cpf;
        $item->telefone = $request->telefone;
        $item->endereco = $request->endereco;
        $item->credencial = $request->credencial;
        $item->data_venc = $request->data;

        $itens = instrutore::where('cpf', '=', $request->cpf)->orwhere('credencial', '=', $request->credencial)->orwhere('email', '=', $request->email)->count();
        if ($itens > 0) {
            echo "<script language='javascript'> window.alert('Registro já Cadastrado') </script>";
            return view('painel-admin.instrutores.edit');    
        }

        $item->save();
        return redirect()->route('instrutores.index');
 
     }
 

}
