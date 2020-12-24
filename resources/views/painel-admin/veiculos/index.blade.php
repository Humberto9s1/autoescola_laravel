@extends('template.painel-admin')
@section('title', 'Veiculos')
@section('content')
<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'admin'){ 
  echo "<script language='javascript'> window.location='./' </script>";
}
if(!isset($id)){
  $id = "";  
}

?>

<a href="{{route('veiculos.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Veículo</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Placa</th>
          <th>Categoria</th>
          <th>Km</th>
          <th>Cor</th>
          <th>Marca</th>
          <th>Ano</th>
          <th>Instrutor</th>
          <th>Revisão</th>
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
      @foreach($itens as $item)      
      <?php 
       $data = implode('/', array_reverse(explode('-', $item->data_revisao)));
       ?>
         <tr>
            <td>{{$item->placa}}</td>
            <td>{{$item->categoria}}</td>
            <td>{{$item->km}}</td>
            <td>{{$item->cor}}</td>
            <td>{{$item->marca}}</td>
            <td>{{$item->ano}}</td> 
            <td>{{$item->instrutor}}</td>
            <td>{{$data}}</td>
            <td>
            <a href="{{route('veiculos.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
            <a href="{{route('veiculos.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
            </td>
        </tr>
        @endforeach 
      </tbody>
  </table>
</div>
</div>
</div>

</div>
<script type="text/javascript">
  $(document).ready(function () {
    $('#dataTable').dataTable({
      "ordering": false
    })

  });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir este Registro?
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('veiculos.delete', $id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>


<?php 
if(@$id != ""){
  echo "<script>$('#exampleModal').modal('show');</script>";
}
?>

@endsection