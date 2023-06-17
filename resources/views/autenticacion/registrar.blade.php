<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite(['resources/css/material-kit.css','resources/css/multistep.css', 'resources/js/multistep.js', 'resources/js/material-kit.js'])

    <title>Registro</title>

    <style>
        body {
            background: #F2F2F2;
        }

        h1 {
            font-weight: bold;
            margin: 0;
            color: #333; /* Ajustar color del texto */
        }

        .card {
            background: #D6D6D6;
            background: -webkit-linear-gradient(to right, #D6D6D6, #DDDDDD);
            background: linear-gradient(to right, #D6D6D6, #DDDDDD);
        }

        /*       .multisteps-form__panel {
                   background: #E8E8E8;
                   background: -webkit-linear-gradient(to right, #E8E8E8, #F5F5F5);
                   background: linear-gradient(to right, #E8E8E8, #F5F5F5);
               }
       */
       /* !* Estilos para las letras de la progress bar*!
        .multisteps-form__progress-btn {
            color: #000000;
        }*/


    </style>

</head>
<body>
{{--TODO: Poner en una alerta en onload el sgt msj:
<div>Los campos marcados con un <b>(*)</b> son obligatorios</div>--}}

    <div class="page-header align-items-start min-vh-100 mb-4">

        <div class="container my-auto mt-6">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1>Cree su nuevo usuario</h1>
                </div>
            </div>
            <div class="card h-100 align-content-xxl-center mt-3">

                <div class="multisteps-form">
                    <!--progress bar-->
                    <div class="row mt-5">
                        <div class=" ml-auto mr-auto mb-4">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="UserInfo" id="progresDatosIniciales">Datos Iniciales</button>
                                <button class="multisteps-form__progress-btn" type="button" title="BasicData" id="progresDatosBasicos">Datos basicos</button>
                                <button class="multisteps-form__progress-btn" type="button" title="MedicalData" id="progresDatosMedicos">Datos médicos</button>
                                <button class="multisteps-form__progress-btn" type="button" title="ContactData" id="progresDatosContacto">Datos de contacto</button>
                                <button class="multisteps-form__progress-btn" type="button" title="TrainerData" id="progresDatosEntrenamiento">Datos sobre entrenamiento</button>
                            </div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <form class="multisteps-form__form" action="{{ route('aut.guardar') }}" method="POST" enctype="multipart/form-data" id="form">
                                @csrf

                                <!--PANEL Datos Iniciales-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                    <h4 class="multisteps-form__title">¿Que rol cumples en el gimnasio?(*)</h4>
                                    <div class="multisteps-form__content">

                                        <div class="form-row mt-4 shadow-none p-3 mb-5 bg-light rounded">

                                            <div class="custom-control-inline form-check">
                                                <input type="radio" id="RadioCliente" name="tipo_usuario" value="1" class="form-check-input" checked>
                                                <label class="form-check-label" for="RadioCliente">Cliente</label>
                                            </div>
                                            <div class="custom-control-inline form-check">
                                                <input type="radio" id="RadioEntrenador" name="tipo_usuario" value="2" class="form-check-input">
                                                <label class="form-check-label" for="RadioEntrenador">Entrenador</label>
                                            </div>
                                            <div class="text-danger" id="divTipoUsuario"></div>
                                        </div>

                                        <div class="input-group input-group-outline my-3 mt-5 bg-light rounded">
                                            <label class="form-label">Contraseña</label>
                                            <input class="form-control" name="password" type="password" value="{{old('password')}}" id="inputContra">
                                        </div>

                                        <div class="button-row d-flex mt-4">
                                            <div class="text-center">
                                                <a href="{{ route('inicio') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left fa-lg"></i> Regresar al inicio</a>
                                            </div>
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!--PANEL DATOS BASICOS-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h4 class="multisteps-form__title mb-4">Complete sus datos personales</h4>
                                    <div class="multisteps-form__content">

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 col" >
                                                    <div class="input-group input-group-outline my-3" style="border-radius: 5px">
                                                        <label class="form-label">Nombre (*)</label>
                                                        <input class="form-control" name="nombre" type="text" value="{{old('nombre')}}" id="inputNombre">
                                                    </div>
                                                    <div class="text-danger" id="divNombre"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="input-group input-group-outline my-3 ">
                                                            <label class="form-label">Apellido (*)</label>
                                                            <input class="form-control" name="apellido" type="text" value="{{old('apellido')}}" id="inputApellido">
                                                        </div>
                                                        <div class="text-danger" id="divApellido"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mt-3">
                                                        <div class="input-group input-group-outline my-3 ">
                                                            <label class="form-label">D.N.I (*)</label>
                                                            <input class="form-control" name="dni" type="number"
                                                                   value="{{old('dni')}}" id="inputDNI">
                                                        </div>
                                                        <div class="text-danger" id="divDNI"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mt-3">
                                                        <div class="input-group input-group-outline my-3 is-focused">{{--TODO: agregar atributo de que siempre este activo--}}
                                                            <label class="form-label">Fecha de nacimiento (*)</label>
                                                            <input class="form-control" name="fecha_nacimiento" type="date"
                                                                   value="{{old('fecha_nacimiento')}}" id="inputFechaNacimiento">
                                                        </div>
                                                        <div class="text-danger" id="divFechaNacimiento"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container mt-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mt-3 shadow-none mb-5 rounded form-group">
                                                        <select name="genero" id="inputTipoUbicacion" class="form-control">
                                                            <option value="" name="genero">Seleccione su genero (*)</option>
                                                            @foreach($generos as $genero)
                                                                <option value="{{$genero->id}}"
                                                                        @if(old('genero') == $genero->id) selected @endif>{{$genero->generos}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="text-danger" id="divGenero"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-row d-flex mt-4 ">
                                        <div class="col">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                        </div>
                                        <div class="col text-md-end">
                                            <button class="btn btn-primary js-btn-next " type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!--PANEL DATOS MEDICOS-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h4 class="multisteps-form__title">Coméntenos un poco sobre sus condiciones medicas</h4>
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mt-4">¿Ha realizado alguna actividad física recientemente? (1 mes a menos)</h6>
                                                <div class="form-row mt-2 shadow-none p-3 mb-3 bg-light rounded">
                                                    <div class="col-6">
                                                        <div class="form-check custom-control-inline text-center">
                                                            <input type="radio" id="RadioActFisicaSi" name="actividad_fisica" value="0" class="form-check-input" checked>
                                                            <label class="form-check-label" for="RadioActFisicaSi">Si</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check custom-control-inline text-center">
                                                            <input type="radio" id="RadioActFisicaNo" name="actividad_fisica" value="1" class="form-check-input">
                                                            <label class="form-check-label" for="RadioActFisicaNo">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-danger" id="divActFisica"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div>
                                                <div class="input-group input-group-outline my-3 mb-3 is-focused">
                                                    <label class="form-label">Si posee alguna condición medica, escríbala aquí</label>
                                                    <textarea class="form-control" name="condicion_medica" id="inputCondicionMedica">{{old('condicion_medica')}}</textarea>
                                                </div>
                                                <div class="text-danger" id="divCondicionMedica"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                    <div class="input-group input-group-outline my-3">
                                                        <label class="form-label">Peso(kg) (*)</label>
                                                        <input class="form-control" name="peso" type="number"
                                                               value="{{old('peso')}}" id="inputPeso">
                                                    </div>
                                                    <div class="text-danger" id="divPeso"></div>
                                            </div>
                                            <div class="col-6">
                                                    <div class="input-group input-group-outline my-3 ">
                                                        <label class="form-label">Altura(cm) (*)</label>
                                                        <input class="form-control" name="altura" type="number"
                                                               value="{{old('altura')}}" id="inputAltura">
                                                    </div>
                                                    <div class="text-danger" id="divAltura"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-row d-flex mt-4 ">
                                        <div class="col">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                        </div>
                                        <div class="col text-md-end">
                                            <button class="btn btn-primary js-btn-next " type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
                                        </div>
                                    </div>

                                </div>

                                <!--PANEL DATOS CONTACTO-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h4 class="multisteps-form__title">Bríndenos alguna forma de comunicarnos con usted</h4>
                                    <div class="multisteps-form__content">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <div class="input-group input-group-outline my-3">
                                                        <label class="form-label">Correo electrónico</label>
                                                        <input class="form-control" name="correo" type="text" value="{{old('correo')}}" id="inputCorreo">
                                                    </div>
                                                    <div class="text-danger" id="divCorreo"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <div class="input-group input-group-outline my-3 is-focused">
                                                        <label class="form-label">Telefono (*)</label>
                                                        <input class="form-control" name="telefono" type="number" value="{{old('telefono')}}" id="inputTelefono">
                                                    </div>
                                                    <div class="text-danger" id="divTelefono"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-row d-flex mt-4 ">
                                        <div class="col">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                        </div>
                                        <div class="col text-md-end">
                                            <button class="btn btn-primary js-btn-next " type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!--PANEL DATOS ENTRENAMIENTO-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h4 class="multisteps-form__title">¿Que dias piensa asistir al gimnasio?</h4>
                                    <div class="multisteps-form__content">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-row mt-4  shadow-none p-3 mb-3 bg-light rounded">
                                                    @foreach($dias_entrenamiento as $dias)
                                                        <div class="col form-check">
                                                            <input type="checkbox" name="dias[]"
                                                                   value="{{$dias->id}}"
                                                                   id="{{$dias->id}}" class="form-check-input ">
                                                            <label
                                                                for="{{$dias->id}}">{{$dias->dias}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mt-2 d-flex justify-content-center">
                                                    <div class="input-group input-group-outline my-3 is-focused">
                                                        <label class="form-label">Fecha de inicio (*)</label>
                                                        <input class="form-control" name="fecha_inicio" type="date" value="{{old('fecha_inicio')}}" id="inputFechaInicio">
                                                    </div>
                                                </div>
                                                <div class="text-danger" id="divFechaInicio"></div>
                                            </div>
                                        </div>

                                        <h5 class="multisteps-form__title mt-3 mb-1">¿Que objetivos quiere cumplir?</h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-row mt-4  shadow-none p-3 mb-3 bg-light rounded">
                                                    @foreach($objetivos as $objetivo)
                                                        <div class="col-6 form-check">
                                                            <input type="checkbox" name="objetivos[]"
                                                                   value="{{$objetivo->id}}"
                                                                   id="{{$objetivo->id}}" class="form-check-input">
                                                            <label
                                                                for="{{$objetivo->id}}">{{$objetivo->objetivos}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="button-row d-flex mt-4 ">
                                        <div class="col">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                        </div>
                                        <div class="col text-md-end">
                                            <button class="btn btn-success ml-auto" type="submit" title="Send">Enviar <i class="fa-solid fa-paper-plane fa-lg"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row">
                            <!--                        <div class="col-6">
                            <h5 class="text-center">¿Quieres regresar a la pagina principal?</h5>
                            <div class="text-center">
                                <a href="{{ route('inicio') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left fa-lg"></i> Regresar</a>
                            </div>
                        </div>-->
                            <div class="col-12">
                                <h5 class="text-center">¿Ya tienes una cuenta?</h5>
                                <div class="text-center">
                                    <a href="{{ route('aut.login') }}" class="btn btn-info">Iniciar sesión <i class="fa-solid fa-right-to-bracket fa-lg"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
</body>
</html>

{{--Estilo de bootstrap--}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{--SweetAlert--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
{{--Font Awesome--}}
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{--Alertas--}}
<script>
@if(session('registro') == 'avisar')
    Swal.fire({
        icon: 'warning',
        title: 'Atención',
        text: 'Los campos marcados con un <b>(*)</b> son obligatorios',
    })
@endif
</script>
{{--Alertas--}}
