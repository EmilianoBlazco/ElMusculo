@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h4 class="text-center">Ejercicios definidos</h4>
@stop

@section('content')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de ejercicios</h3>
                <a href="{{ route('ejercicios.create') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Definir nuevo ejercicio</a>
            </div>
            @if($ejercicios->count())

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr class="text-center">
                            <th style="width: 5%;">ID</th>
                            <th style="width: 20%;">Ejercicio</th>
                            <th style="width: 40%;">Descripción</th>
                            <th style="width: 20%;">Fecha de creación</th>
                            <th style="width: 15%;">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ejercicios as $ejercicio)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ejercicio->nombre}}</td>
                                <td class="text-justify">
                                    @if($ejercicio->descripcion == null)
                                        <span class="badge badge-info">Sin descripción</span>
                                    @else
                                        {{ $ejercicio->descripcion }}
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y',strtotime($ejercicio->created_at)) }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <div class="mr-2">
                                            <form action="{{ route('ejercicios.edit', $ejercicio) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-file-pen"></i> Modificar
                                                </button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{ route('ejercicios.destroy', $ejercicio) }}" method="POST" id="perfilFormeliminar">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
<!--                    <div class="card-footer">
                        <ul class="pagination justify-content-center">
{{--
                            {{ $ejercicios->links()}}
--}}
                        </ul>
                    </div>-->
            @else
                <div class="card-body">
                    <strong>No se encontraron usuarios con cuentas activas</strong>
                </div>
            @endif
        </div>
@stop

@section('css')
@stop

@section('js')
    {{--Estilo de bootstrap--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{--Font Awesome--}}
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{--SweetAlert--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    {{--Alerta de SweetAlert--}}
    <script>
        @if(session('crear') == 'ok')
        Swal.fire({
            icon: 'success',
            title: 'Completado!!',
            text: 'Se ha creado el nuevo ejercicio correctamente',
        })
        @endif
        @if(session('editar') == 'ok')
        Swal.fire({
            icon: 'success',
            title: 'Completado!!',
            text: 'Se ha modificado los datos del ejercicio correctamente',
        })
        @endif
        @if(session('eliminar') == 'ok')
        Swal.fire({
            icon: 'success',
            title: 'Completado!!',
            text: 'Se ha eliminado todos los datos del ejercicio correctamente',
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
