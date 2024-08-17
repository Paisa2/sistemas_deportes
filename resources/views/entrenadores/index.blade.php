@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lista Entrenadores Registrados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-entrenador')
                        <a class="btn btn-warning" href="{{ route('entrenadores.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Apellido</th>
                                    <th style="color:#fff;">CI</th>
                                    <th style="color:#fff;">Sexo</th>
                                    <th style="color:#fff;">Ver CV Archivo</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                        <tbody>
                            @foreach ($entrenadores as $entrenador)
                            <tr>
                                <td style="display: none;">{{ $entrenador->id }}</td>
                                <td>{{ $entrenador->nombre }}</td>
                                <td>{{ $entrenador->apellido }}</td>
                                <td>{{ $entrenador->ci }}</td>
                                <td>{{ $entrenador->sexo }}</td>
                                <td><a href="{{ url('/storage/'.$entrenador->image) }}" target="_blank">Ver Archivo CV</a></td>
                                <td>
                                    <form action="{{ route('entrenadores.destroy',$entrenador->id) }}" method="POST">
                                        @can('editar-entrenador')
                                        <a class="btn btn-info" href="{{ route('entrenadores.edit',$entrenador->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('eliminar-entrenador')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $entrenadores->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
