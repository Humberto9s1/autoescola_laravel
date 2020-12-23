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

    public function edit(produto $produto){
        return view('produtos.edit', ['produto' => $produto]);   
     }
 
 
     public function editar(Request $request, produto $produto){
         
         $produto->nome = $request->nome;
         $produto->valor = $request->valor;
         $produto->estoque = $request->estoque;
         $produto->descricao = $request->descricao;
         $produto->save();
         return redirect()->route('produtos');
 
     }
 

}
