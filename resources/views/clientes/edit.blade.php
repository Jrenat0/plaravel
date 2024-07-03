@extends('templates.master')

@section('contenido-principal')
<div class="row">
    <div class="card m-3 p-1 ">
        <div class="card-header pt-3">
            <h5 class="card-title">Editar al cliente: <strong>{{$cliente->rut}}</strong></h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('clientes.update', $cliente->rut)}}" >
            @csrf
            @method('put')
            <div>
                <label class="form-label" for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cliente->nombre}}">
            </div>
            <div>
                <label class="form-label" for="fecha_nac">Fecha de nacimiento : </label>
                <input type="text" name="fecha_nac" id="fecha_nac" class="form-control" value="{{$cliente->fecha_nac}}">
            </div>

            <div class="m-3 d-flex justify-content-end">
                <button type="reset" class="btn btn-warning me-1 btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-info ms-2 btn-sm">Editar</button>
            </div>
          </form>
        </div>
      </div>
</div>
@endsection