@extends('adminlte::page')

@section('title', 'Modificar objetivos')

@section('content_header')
    <h4 class="text-center">Objetivos seleccionados de {{ $usuario->nombre .' '. $usuario->apellido }}</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">En este apartado podrá <b>modificar sus objetivos</b></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('perfil.obj.update', ['perfil' => Auth::user()->id]) }}" method="POST" id="perfilForm">
                @csrf @method('PATCH')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos de entrenamiento</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h6 class="multisteps-form__title">Objetivos</h6>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-2 shadow-none p-3 mb-2 bg-light rounded">
                                            @foreach($objetivos as $objetivo)
                                                    <div class="row">
                                                        <div class="col-12 mb-3 mr-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="objetivos[]" class="form-check-input" id="objetivo{{ $objetivo->id }}" value="{{ $objetivo->id }}"
                                                                       @if($usuario->objetivosEntrenamiento()->wherePivot('objetivo_id', $objetivo->id)->exists()) checked @endif>
                                                                <label class="form-check-label" for="objetivo{{ $objetivo->id }}">{{ $objetivo->objetivos }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-3">Guardar cambios <i class="fa-solid fa-floppy-disk"></i></button>
                </div>
            </form>
        </div>
    </div>
@stop


@section('css')
{{--@vite(['resources/css/material-kit.css','resources/css/multistep.css', 'resources/js/multistep.js', 'resources/js/material-kit.js'])--}}
@stop

@section('js')
    {{--Estilo de bootstrap--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{--SweetAlert--}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    {{--Jquery--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--Font Awesome--}}
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{--Alertas--}}
    <script>
        @if(session('editar') == 'ok')
        Swal.fire({
            icon: 'success',
            title: 'Completado!!',
            text: 'Sus datos fueron actualizados correctamente',
        })
        @endif

        $('#perfilFormdeshabilitar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro que deseas deshabilitar su cuenta ?',
                text: "Puedes volver a habilitarla comunicandote con admnistracion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, deshabilitar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });

    </script>


    {{--Alertas--}}

@stop
