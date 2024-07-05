@extends('templates.master')

@section('title', 'Ingresar arriendo')


@section('contenido-principal')

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-fluid bg-white rounded">

        <div class="text-center">
            <h1>Arrendar <strong>{{$vehiculo->tipo}}</strong>::<strong>{{$vehiculo->patente}}</strong></h1>
        </div>

        <form method="POST" action="{{route('arriendos.create')}}">
            @csrf

            <div class="row">

                <div class="col-12 my-2">
                    <label for="rut_cliente">Cliente: </label>
                    <select name="rut_cliente" id="rut_cliente" class="form-select" aria-label="Seleccione un cliente:">
                        @foreach($clientes as $index => $cliente)
                        <option value="{{$index+1}}">{{$cliente->rut}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 my-2">
                    <label for="patente_vehiculo">Vehiculo: </label>
                    <input type="text" id="patente_vehiculo" name="patente_vehiculo" value="{{}}" class="form-control">
                </div>

                <div class="col-12 my-2">
                    <label for="fecha_ini" class="form-label">Fecha de inicio: </label>
                    <input type="date" class="form-control" id="fecha_ini" name="fecha_ini">
                </div>

                <div class="col-12 my-2">
                    <label for="fecha_ent" class="form-label">Fecha de entrega: </label>
                    <input type="date" class="form-control" id="fecha_ent" name="fecha_ent">
                </div>

                <div class="col-12 my-2">
                    <label for="img_ent" class="form-label">Imagen de entrega:</label>
                    <input type="file" class="form-control-file" id="img_ent" name="img_ent">
                </div>

            </div>

        </form>

    </div>
</div>



@endsection