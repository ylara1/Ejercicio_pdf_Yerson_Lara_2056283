@extends('layouts.masterpage')

@section('contenido')
        <form class="form-horizontal" method="post" action="{{    url('imagenes/guardar')  }}"  enctype="multipart/form-data" >
        @csrf
        <fieldset>

        <!-- Form Name -->
        <legend>Carga de Imagenes</legend>

        <!-- File Button --> 
        <div class="form-group">
        <label class="col-md-4 control-label" for="filebutton">imagen a cargar:</label>
        <div class="col-md-4">
            <input id="filebutton" name="nombre_archivo" class="input-file" type="file">
        </div>
        </div>

        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
            <button id="" name="" class="btn btn-primary">Cargar Imagen</button>
        </div>
        </div>

        </fieldset>
        </form>

@endsection