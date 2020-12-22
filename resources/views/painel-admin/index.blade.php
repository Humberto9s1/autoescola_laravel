@extends('template.painel-admin')
@section('title', 'Painel Administrativo')
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
Home do Admin
@endsection