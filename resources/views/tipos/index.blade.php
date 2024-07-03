@extends('templates.master')

@section('contenido-principal')
    <div class="row my-2 mx-1">
        <h3 class="">Tipos de vehiculos</h3>
    </div>
    
    <div class="row">
        {{-- FORM --}}
        <div class=" col-12 col-lg-4 mt-2 mt-lg-0">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Agregar un nuevo tipo:</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('tipos.store')}}" method="POST">
                        @csrf
                        <div>
                            <label for="nom_tipo" class="form-label">Nuevo tipo de vehiculo: </label>
                            <input type="text" class="form-control" id="nom_tipo" name="nom_tipo">
                        </div>
                        <div class="mt-3 me-2 d-flex justify-content-end">
                            <button class="btn btn-sm btn-warning me-2">Restablecer</button>
                            <button class="btn btn-sm btn-info" type="submit">Registrar Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- FORM --}}

        {{-- TABLA --}}
        <div class="col-12 col-lg-8 order-lg-first mt-3 mt-lg-0">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-info">
                    <tr>
                        <th class="text-center">N°</th>
                        <th>Tipos</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                    <tr>
                        <td class="text-center">{{$tipo->id}}</td>
                        <td>{{$tipo->nom_tipo}}</td>
                        {{-- EDITAR --}}
                        <td class="text-center">
                            <a href="{{route('tipos.edit', $tipo->id)}}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>

                        {{-- BORRAR --}}
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#borrarModal{{$tipo->id}}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    {{-- CONFIRMACION BORRADO --}}
                    <div class="modal fade" id="borrarModal{{$tipo->id}}" tabindex="-1" aria-labelledby="borrarModal{{$tipo->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="borrarModal{{$tipo->id}}Label">Confrimacion de borrado</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Desea borrar al usuario: <strong>{{$tipo->nom_tipo}}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('tipos.destroy', $tipo->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Borrar</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- TABLA --}}
    </div>
@endsection