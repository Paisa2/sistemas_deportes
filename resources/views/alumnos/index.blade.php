@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lista Alumnos Inscritos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-alumno')
                        <a class="btn btn-warning" href="{{ route('alumnos.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Apellido</th>
                                    <th style="color:#fff;">Matricula</th>
                                    <th style="color:#fff;">CI</th>
                                    <th style="color:#fff;">Edad</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                            <tr>
                                <td style="display: none;">{{ $alumno->id }}</td>
                                <td>{{ $alumno->nombre }}</td>
                                <td>{{ $alumno->apellido }}</td>
                                <td>{{ $alumno->matricula }}</td>
                                <td>{{ $alumno->ci }}</td>
                                <td>{{ $alumno->edad }}</td>
                                <td>
                                    <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
                                        @can('editar-alumno')
                                        <a class="btn btn-info" href="{{ route('alumnos.edit',$alumno->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('eliminar-alumno')
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
                            {!! $alumnos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
