@extends('layouts.master')

@section('content')
<form class="reservation-form gradient-gold">
            
  <div class="input-form">
    <label for="check_in">Llegada</label>
    <input type="text" name="check_in" id="check_in">
  </div>
            
  <div class="input-form">
    <label for="check_out">Salida</label>
    <input type="text" name="check_out" id="check_out">
  </div> 

  <div class="input-form">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name">
  </div>
            
  <div class="input-form">
    <label for="email">Correo Electronico</label>
    <input type="email" name="email" id="email">
  </div>

  <div class="input-form">
    <label for="quantity">Personas</label>
    <textarea id="number" name="quantity" id="quantity"></textarea>
  </div>

  <div class="input-form">
    <label for="quantity">Comentarios</label>
    <textarea id="comment" name="comment"></textarea>
  </div>

  <div class="gradient-gold btn-form text-center box-sizing pointer">Reservar</div>
</form>
@stop