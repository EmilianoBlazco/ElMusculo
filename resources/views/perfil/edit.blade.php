@extends('adminlte::page')

@section('title', 'Modificar datos')

@section('content_header')

    <h4 class="text-center">Datos del perfil de {{$usuario->nombre .' '. $usuario->apellido}}</h4>
    <div class="text-right">
        <form action="{{ route('perfil.update', ['perfil' => Auth::user()->id]) }}" method="POST" id="perfilFormdeshabilitar">
            @csrf @method('PATCH')
            <button type="submit" class="btn btn-danger">Deshabilitar cuenta</button>
            {{--Campo oculto para saber que actualizamos datos--}}
            <input type="hidden" name="baja" value="1">
        </form>
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">En este apartado podrá <b>modificar sus datos</b></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">


            <form action="{{ route('perfil.update', ['perfil' => Auth::user()->id]) }}" method="POST" id="perfilForm">
                @csrf @method('PATCH')

                {{--Campo oculto para saber que actualizamos datos--}}
                <input type="hidden" name="actualizar" value="1">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rol en el gimnasio</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <h6 class="text-center">
                            Su rol dentro del gimnasio es: <strong>
                                @if($usuario->tipo_usuario == 1)
                                    Cliente
                                @elseif($usuario->tipo_usuario == 2)
                                    Entrenador
                                @endif
                            </strong>
                        </h6>

                    </div>
                </div>

                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Datos básicos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row" >
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputNombre">Nombre (*)</label>
                                    <input class="form-control" name="nombre" type="text" value="{{ old('nombre', $usuario->nombre) }}" id="inputNombre">
                                </div>
                                <div class="text-danger" id="divNombre"></div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputApellido">Apellido (*)</label>
                                    <input class="form-control" name="apellido" type="text" value="{{ old('apellido',$usuario->apellido) }}" id="inputApellido">
                                </div>
                                <div class="text-danger" id="divApellido"></div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputDNI">D.N.I (*)</label>
                                    <input class="form-control" name="dni" type="text" value="{{ old('dni',$usuario->dni) }}" id="inputDNI">
                                </div>
                                <div class="text-danger" id="divDNI"></div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputFechaNacimiento">Fecha de nacimiento (*)</label>
                                    <input class="form-control" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento',date('Y-m-d',strtotime($usuario->fecha_nacimiento))) }}" id="inputFechaNacimiento">
                                </div>
                                <div class="text-danger" id="divFechaNacimiento"></div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputGenero">Género (*)</label>
                                    <select class="form-control" name="genero" id="inputGenero">
                                        <option value="">Seleccione su género</option>
                                        @foreach($generos as $genero)
                                            <option value="{{ $genero->id }}" {{ old('genero', $usuario->genero_id) == $genero->id ? 'selected' : '' }}>
                                                {{ $genero->generos }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-danger" id="divGenero"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Datos medicos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row" >
                            <div class="col-6">
                                <label>¿Ha realizado alguna actividad física recientemente?(1 mes a menos)</label>
                                <div class="form-row mt-2 shadow-none p-3 mb-5 bg-light rounded">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="actividad_fisica" id="RadioActFisicaSi" value="0"{{ $usuario->actividad_fisica == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="RadioActFisicaSi">Sí</label>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="actividad_fisica" id="RadioActFisicaNo" value="1"{{ $usuario->actividad_fisica == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="RadioActFisicaSi">No</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputCondicionMedica" class="form-label">Si posee alguna condición médica, escríbala aquí</label>
                                    <div class="input-group input-group-outline my-2 is-focused">
                                        <textarea class="form-control" name="condicion_medica" id="inputCondicionMedica">{{ old('condicion_medica',$usuario->condicion_medica) }}</textarea>
                                    </div>
                                    <div class="text-danger" id="divCondicionMedica"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputPeso">Peso (*)</label>
                                    <input class="form-control" name="peso" type="text" value="{{ old('peso',$usuario->peso) }}" id="inputPeso">
                                </div>
                                <div class="text-danger" id="divPeso"></div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputAltura">Altura (*)</label>
                                    <input class="form-control" name="altura" type="text" value="{{ old('altura',$usuario->altura) }}" id="inputAltura">
                                </div>
                                <div class="text-danger" id="divAltura"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Datos de contacto</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputCorreo">Correo electrónico</label>
                                    <input class="form-control" name="email" type="text" value="{{ old('email',$usuario->email) }}" id="inputCorreo">
                                </div>
                                <div class="text-danger" id="divCorreo"></div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputTelefono">Teléfono (*)</label>
                                    <input class="form-control" name="telefono" type="text" value="{{ old('telefono',$usuario->telefono) }}" id="inputTelefono">
                                </div>
                                <div class="text-danger" id="divTelefono"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Datos de entrenamiento</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h6 class="multisteps-form__title">¿Qué días piensa asistir al gimnasio?</h6>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-2 shadow-none p-3 mb-2 bg-light rounded">{{--
                                    @foreach($dias_entrenamiento as $dias)
                                        <div class="col form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <label class="custom-control-label" for="{{$dias->id}}">{{$dias->dias}}</label>
                                                <input type="checkbox" name="dias[]" value="{{$dias->id}}" id="{{$dias->id}}" class="custom-control-input" checked="checked">
                                            </div>
                                        </div>
                                    @endforeach--}}
                                            @foreach($dias_entrenamiento as $dias)
                                                <div class="col form-check-inline">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="dias[]" class="form-check-input" id="exampleCheck1" value="{{$dias->id}}"
                                                               @if($usuario->diasEntrenamiento()->get()->contains($dias->id))
                                                                   checked
                                                            @endif
                                                        >
                                                        <label class="form-check-label" for="exampleCheck1">{{$dias->dias}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputFechaInicio">Fecha de inicio (*)</label>
                                    <input class="form-control" name="fecha_inicio" type="date" value="{{ old('fecha_inicio',date('Y-m-d',strtotime($usuario->fecha_inicio))) }}" id="inputFechaInicio">
                                </div>
                                <div class="text-danger" id="divFechaInicio"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-3">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{--@vite(['resources/css/material-kit.css','resources/css/multistep.css', 'resources/js/multistep.js', 'resources/js/material-kit.js'])--}}

@stop

@section('js')
    {{--Estilo de bootstrap--}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{--SweetAlert--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    {{--Jquery--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
