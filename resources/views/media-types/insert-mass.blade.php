<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Heredar masterpage -->
    @extends('layouts.masterpage')

    <!-- Definiendo el contenido -->
    @section('contenido')
        
    
    
    
    <form class="form-horizontal" method="POST" action="{{ url('media-types/store') }}" enctype="multipart/form-data">
        @csrf
        <fieldset>
        
        <!-- Form Name -->
        <legend>Upload CSV media</legend>
        
        <!-- File Button --> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="filebutton">File Button</label>
          <div class="col-md-4">
            <input id="media-types" name="media-types" class="input-file" type="file">
            <strong class="text-danger">{{ $errors->first('media-types') }}</strong>
           </div>
        </div>
        
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
          <div class="col-md-4">
            <button type="submit" id="" name="" class="btn btn-primary">Subir</button>
          </div>
        </div>
        
        </fieldset>
        <!-- Mensaje de exito -->
        @if (session('exito'))
            <p class="alert-success">{{ session('exito') }}</p>
        @endif
        @if (session('repetidos') )
            @foreach(session('repetidos') as $mediarepetido)
              <p class="alert-warning">{{ $mediarepetido }}</p>
            @endforeach
        @endif
        </form>
        
        @endsection
        
        
</body>
</html>
