@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h4 class="text-center">Usuarios de la plataforma</h4>
@stop

@section('content')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de usuarios con cuentas activas</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            @if($usuariosActivos->count())

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nombre completo</th>
                            <th>Correo electrónico</th>
                            <th>Número de teléfono</th>
                            <th>Rol</th>
                            <th>Fecha de registro</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuariosActivos as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nombre . ' ' . $user->apellido }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>
                                    @if($user->tipo_usuario == 1)
                                        Cliente
                                    @elseif($user->tipo_usuario == 0)
                                        Entrenador
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                                <td>
                                    <form action="{{ route('admin.usuarios.update', $user) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="baja" value="1">
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="fas fa-times"></i> Dar de baja
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if($usuariosActivos->count() > 10)
                    <div class="card-footer">
                        <ul class="pagination justify-content-center">
                            {!! $usuariosActivos->links() !!}
                        </ul>
                    </div>
                @endif
            @else
                <div class="card-body">
                    <strong>No se encontraron usuarios con cuentas activas</strong>
                </div>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de usuarios con cuentas inactivas</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            @if($usuariosInactivos->count())

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nombre completo</th>
                            <th>Correo electrónico</th>
                            <th>Número de teléfono</th>
                            <th>Rol</th>
                            <th>Fecha de registro</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuariosInactivos as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nombre . ' ' . $user->apellido }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>
                                    @if($user->tipo_usuario == 1)
                                        Cliente
                                    @elseif($user->tipo_usuario == 0)
                                        Entrenador
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <form action="{{ route('admin.usuarios.update', $user) }}" method="POST" class="mr-1">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="alta" value="1">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-retweet"></i> Restablecer
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.usuarios.destroy', $user) }}" method="POST" id="perfilFormeliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if($usuariosInactivos->count() > 10)
                    <div class="card-footer">
                        <ul class="pagination justify-content-center">
                            {!! $usuariosInactivos->links() !!}
                        </ul>
                    </div>
                @endif
            @else
                <div class="card-body">
                    <strong>No se encontraron usuarios con cuentas inactivas</strong>
                </div>
            @endif
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@stop

@section('js')
    {{--Estilo de bootstrap--}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{--Estilo de tailwind--}}
{{--
    <script src="https://cdn.tailwindcss.com"></script>
--}}
    {{--SweetAlert--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    {{--Alerta de SweetAlert--}}
    <script>
        @if(session('baja') == 'ok')
        Swal.fire({
            icon: 'success',
            title: 'Completado!!',
            text: 'Se ha dado de baja al usuario correctamente',
        })
        @endif
        @if(session('alta') == 'ok')
        Swal.fire({
            icon: 'success',
            title: 'Completado!!',
            text: 'Se ha restablecido la cuenta del usuario correctamente',
        })
        @endif
        @if(session('eliminar') == 'ok')
        Swal.fire({
            icon: 'success',
            title: 'Completado!!',
            text: 'Se ha eliminado todos los datos del usuario correctamente',
        })
        @endif
        $('#perfilFormeliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro que deseas eliminar la cuenta?',
                text: "Una vez realizada esta acción ya no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
@stop
