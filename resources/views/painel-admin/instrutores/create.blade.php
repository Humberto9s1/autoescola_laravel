@extends('template.painel-admin')
@section('title', 'Instrutores')
@section('content')
<form method="POST" action="{{route('instrutores.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Valor</label>
                    <input type="text" class="form-control" id="" name="valor">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Estoque</label>
                    <input type="text" class="form-control" id="" name="estoque">
                </div>
            </div>
        </div>




        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição</label>
            <textarea class="form-control" id="" name="descricao" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection