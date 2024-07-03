@extends('templates.master')

@section('contenido-principal')
<div class="row">
    <div class="card mt-2 ">
        <div class="card-header pt-3">
            <h5 class="card-title">Agregar un nuevo vehiculo: </h5>
        </div >
        <div class="card-body ">
          <form method="POST" action="{{route('vehiculos.store')}}" >
            @csrf
            <div>
                <label class="form-label" for="patente">Patente: </label>
                <input type="text" name="patente" id="patente" class="form-control">
                {{-- @error('nombre') is-invalid @enderror" value="{{old('nombre')}} --}}
                {{-- @error('nombre')
                    <div id="nombreFeeback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror --}}
            </div>

            <div class="mt-2">
                <label class="form-label" for="marca">Marca: </label>
                <input type="text" name="marca" id="marca" class="form-control">
            </div>  

            <div class="mt-2">
                <label class="form-label" for="anio">Año: </label>
                <input type="text" name="anio" id="anio" class="form-control">
            </div>  

            <div class="mt-3">
                <label class="form-label" for="tipo">Seleccione tipo de vehiculo: </label>
                <select name="tipo" id="tipo" class="form-control">
                    {{-- <option value="">Seleccione</option> --}}
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->nom_tipo}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-2">
                <label class="form-label" for="precio">Precio: </label>
                <input type="integer" name="precio" id="precio" class="form-control">
            </div> 

            <div class="mt-2">
                <label class="form-label" for="estado">Estado: </label>
                <input type="integer" name="estado" id="estado" class="form-control" value="Disponible" disabled>
            </div> 

            <div class="mt-3 me-2 d-flex justify-content-end">
                <button class="btn btn-warning me-2">Restablecer</button>
                <button class="btn btn-info" type="submit">Registrar Usuario</button>
            </div>

          </form>
        </div>
      </div>
</div>
@endsection