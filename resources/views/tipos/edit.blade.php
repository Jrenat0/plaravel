@extends('templates.master')

@section('contenido-principal')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar tipo de vehiculo</h3>
            </div>
            <div class="card-body">
                <form action="{{route('tipos.update', $tipo->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div>
                        <label class="form-label" for="nom_tipo">Tipo : </label>
                        <input type="text" name="nom_tipo" id="nom_tipo" class="form-control" value="{{$tipo->nombre}}">
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