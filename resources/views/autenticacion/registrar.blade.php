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
</head>
<body>
{{--<form action="{{route('aut.guardar')}}" method="POST">
    @csrf
    <div id="step-1" style="display: block;">
        <h3>Paso 1:Categoria y seguridad</h3>
        <label for="tipo_usuario">
            <input type="radio" name="tipo_usuario" value="entrenador"> Entrenador
        </label>
        <label for="tipo_usuario">
            <input type="radio" name="tipo_usuario" value="cliente"> Cliente
        </label>
        <h3>Contraseña</h3>
        <label for="password">Contraseña:</label>
        <input type="password" name="password">
    </div>

    <div id="step-2" style="display: none;">
        <h3>Paso 2: Datos básicos</h3>
        <label for="nombre">Nombre/s:</label>
        <input type="text" name="nombre">

        <label for="apellido">Apellido/s:</label>
        <input type="text" name="apellido">

        <label for="dni">DNI:</label>
        <input type="text" name="dni">

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento">

        <label for="genero">Género:</label>
        <input type="text" name="genero">
    </div>

    <div id="step-3" style="display: none;">
        <h3>Paso 3: Datos médicos</h3>
        <label for="actividad_fisica">¿Realiza actividad física?</label>
        <input type="checkbox" name="actividad_fisica">

        <label for="peso">Peso:</label>
        <input type="number" name="peso" step="0.01">

        <label for="altura">Altura:</label>
        <input type="number" name="altura" step="0.01">

        <label for="condicion_medica">¿Tiene alguna condición médica?</label>
        <textarea name="condicion_medica"></textarea>
    </div>

    <div id="step-4" style="display: none;">
        <h3>Paso 4: Datos de contacto</h3>
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo">

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono">
    </div>

    <div id="step-5" style="display: none;">
        <h3>Paso 5: Datos de entrenamiento</h3>
        <label for="dias_entrenamiento">Días de entrenamiento:</label>
        <input type="text" name="dias_entrenamiento">

        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" name="fecha_inicio">
    </div>

    <button type="button" id="anterior" onclick="previousStep()">Anterior</button>
    <button type="button" id="siguiente" onclick="nextStep()">Siguiente</button>
    <button type="submit" id="guardar">Guardar</button>
</form>--}}

{{--
    <form action="{{ route('aut.guardar') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div id="step-1" style="display: block;">
            <h3>Paso 1: Categoría y seguridad</h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_usuario" id="entrenador" value="entrenador">
                <label class="form-check-label" for="entrenador">
                    Entrenador
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_usuario" id="cliente" value="cliente">
                <label class="form-check-label" for="cliente">
                    Cliente
                </label>
            </div>
            <h3>Contraseña</h3>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>

        <div id="step-2" style="display: none;">
            <h3>Paso 2: Datos básicos</h3>
            <div class="form-group">
                <label for="nombre">Nombre/s:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido/s:</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" name="dni" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <input type="text" class="form-control" name="genero" required>
            </div>
        </div>

        <div id="step-3" style="display: none;">
            <h3>Paso 3: Datos médicos</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="actividad_fisica" id="actividad_fisica">
                <label class="form-check-label" for="actividad_fisica">
                    ¿Realiza actividad física?
                </label>
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" class="form-control" name="peso" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="altura">Altura:</label>
                <input type="number" class="form-control" name="altura" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="condicion_medica">¿Tiene alguna condición médica?</label>
                <textarea class="form-control" name="condicion_medica"></textarea>
            </div>
        </div>

        <div id="step-4" style="display: none;">
            <h3>Paso 4: Datos de contacto</h3>
            <div class="form-group">
                <label for="correo">Correo electrónico:</label>
                <input type="email" class="form-control" name="correo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" required>
            </div>
        </div>

        <div id="step-5" style="display: none;">
            <h3>Paso 5: Datos de entrenamiento</h3>
            <div class="form-group">
                <label for="dias_entrenamiento">Días de entrenamiento:</label>
                <input type="text" class="form-control" name="dias_entrenamiento" required>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" class="form-control" name="fecha_inicio" required>
            </div>
        </div>

        <button type="button" id="anterior" onclick="previousStep()" class="btn btn-secondary">Anterior</button>
        <button type="button" id="siguiente" onclick="nextStep()" class="btn btn-primary">Siguiente</button>
        <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

    </form>
--}}
{{--TODO: Poner en una alerta en onload el sgt msj:
<div>Los campos marcados con un <b>(*)</b> son obligatorios</div>--}}

<div class="page-header align-items-start min-vh-100" style="background-image: url('{{ asset('img/bgdep2.jpg') }}');">
    <span class="mask bg-gradient-dark opacity-5"></span>

    <div class="container my-auto mt-9">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="text-white">Cree su nuevo usuario</h1>
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
                                <h3 class="multisteps-form__title">¿Que rol cumples en el gimnasio?(*)</h3>
                                <div class="multisteps-form__content">

                                    <div class="form-row mt-4 shadow-none p-3 mb-5 bg-light rounded">

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="RadioCliente" name="tipo_usuario" value="1" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="RadioCliente">Cliente</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="RadioEntrenador" name="tipo_usuario" value="2" class="custom-control-input">
                                            <label class="custom-control-label" for="RadioEntrenador">Entrenador</label>
                                        </div>
                                        <div class="text-danger" id="divTipoUsuario"></div>
                                    </div>

                                    <div class="input-group input-group-outline my-3 mt-5 bg-light rounded">
                                        <label class="form-label">Contraseña</label>
                                        <input class="form-control" name="password" type="password" value="{{old('password')}}" id="inputContra">
                                    </div>

                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Siguiente</button>
                                    </div>
                                </div>
                            </div>

                            <!--PANEL DATOS BASICOS-->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Complete sus datos personales</h3>
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
                                                <div class="mt-5">
                                                    <div class="input-group input-group-outline my-3 ">
                                                        <label class="form-label">D.N.I (*)</label>
                                                        <input class="form-control" name="dni" type="number"
                                                               value="{{old('dni')}}" id="inputDNI">
                                                    </div>
                                                    <div class="text-danger" id="divDNI"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mt-5">
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
                                            <div class="col-5">
                                                <div class="form-row mt-3 shadow-none p-2 mb-5 rounded">
                                                    <select class="multisteps-form__select form-control" name="genero" id="inputTipoUbicacion">
                                                        <option value="" name="genero">Seleccione su genero (*)</option>
                                                        </option>
                                                        @foreach($generos as $genero)
                                                            <option value="{{$genero->id}}"
                                                                    @if(old('genero') == $genero->id) selected @endif>{{$genero->generos}}</option>
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
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Anterior</button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="btn btn-primary js-btn-next " type="button" title="Next">Siguiente</button>
                                    </div>
                                </div>
                            </div>

                            <!--PANEL DATOS MEDICOS-->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Hablenos un poco de sus condiciones medicas</h3>
                                <div class="multisteps-form__content">

                                    <h6 class="mt-4">¿Realizo alguna actividad física recientemente?</h6>
                                    <div class="form-row mt-4 shadow-none p-3 mb-5 bg-light rounded">

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="RadioActFisicaSi" name="actividad_fisica" value="0" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="RadioActFisicaSi">Si</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="RadioActFisicaNo" name="actividad_fisica" value="1" class="custom-control-input">
                                            <label class="custom-control-label" for="RadioActFisicaNo">No</label>
                                        </div>
                                        <div class="text-danger" id="divActFisica"></div>
                                    </div>


                                    <div class="mt-5">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Peso (*)</label>
                                            <input class="form-control" name="peso" type="number"
                                                   value="{{old('peso')}}" id="inputPeso">
                                        </div>
                                        <div class="text-danger" id="divPeso"></div>
                                    </div>

                                    <div class="mt-5">
                                        <div class="input-group input-group-outline my-3 ">
                                            <label class="form-label">Altura (*)</label>
                                            <input class="form-control" name="altura" type="number"
                                                   value="{{old('altura')}}" id="inputAltura">
                                        </div>
                                        <div class="text-danger" id="divAltura"></div>
                                    </div>


                                    <div class="mt-5">
                                        <div class="input-group input-group-outline my-3 is-focused">
                                            <label class="form-label">Si posee alguna condición medica, escríbala aquí (*)</label>
                                            <textarea class="form-control" name="condicion_medica" id="inputCondicionMedica">{{old('condicion_medica')}}</textarea>
                                        </div>
                                        <div class="text-danger" id="divCondicionMedica"></div>
                                    </div>

                                </div>

                                <div class="button-row d-flex mt-4 ">
                                    <div class="col">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Anterior</button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="btn btn-primary js-btn-next " type="button" title="Next">Siguiente</button>
                                    </div>
                                </div>

                            </div>

                            <!--PANEL DATOS CONTACTO-->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Bríndenos alguna forma de comunicarnos con usted</h3>
                                <div class="multisteps-form__content">

                                    <div class="mt-5">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Correo electrónico</label>
                                            <input class="form-control" name="correo" type="text" value="{{old('correo')}}" id="inputCorreo">
                                        </div>
                                        <div class="text-danger" id="divCorreo"></div>
                                    </div>

                                    <div class="mt-5">
                                        <div class="input-group input-group-outline my-3 is-focused">
                                            <label class="form-label">Telefono (*)</label>
                                            <input class="form-control" name="telefono" type="number" value="{{old('telefono')}}" id="inputTelefono">
                                        </div>
                                        <div class="text-danger" id="divTelefono"></div>
                                    </div>

                                </div>

                                <div class="button-row d-flex mt-4 ">
                                    <div class="col">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Anterior</button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="btn btn-primary js-btn-next " type="button" title="Next">Siguiente</button>
                                    </div>
                                </div>

                            </div>

                            <!--PANEL DATOS ENTRENAMIENTO-->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">¿Que dias piensa asistir al gimnasio?</h3>
                                <div class="multisteps-form__content">

                                    <div class="form-row mt-4  shadow-none p-3 mb-5 bg-light rounded">
                                        @foreach($dias_entrenamiento as $dias)
                                            <div class="col form-check-inline">
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
                                <div class="col-sm-6">
                                    <div class="mt-5">
                                        <div class="input-group input-group-outline my-3 is-focused">
                                            <label class="form-label">Fecha de inicio (*)</label>
                                            <input class="form-control" name="fecha_inicio" type="date"
                                                   value="{{old('fecha_inicio')}}" id="inputFechaInicio">
                                        </div>
                                        <div class="text-danger" id="divFechaInicio"></div>
                                    </div>
                                </div>
                                <div class="button-row d-flex mt-4 ">
                                    <div class="col">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">
                                            Anterior
                                        </button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="btn btn-success ml-auto" type="submit" title="Send">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


    <div style="margin-top: 50px">
        <a href="{{ route('inicio') }}">Pagina de inicio</a>
        <a href="{{ route('aut.login') }}">Iniciar Sesión</a>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<script>
    let currentStep = 1;
    let totalSteps = 5;

    // Ocultar botón anterior en el primer paso
    if (currentStep === 1) {
        document.getElementById("anterior").style.display = "none";
    }

    // Mostrar botón siguiente en todos los pasos excepto en el último
    if (currentStep < totalSteps) {
        document.getElementById("siguiente").style.display = "block";
        document.getElementById("guardar").style.display = "none";
    } else {
        // Ocultar botón siguiente y mostrar botón guardar en el último paso
        document.getElementById("siguiente").style.display = "none";
        document.getElementById("guardar").style.display = "block";
    }

    function previousStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);

            // Mostrar botón siguiente después de retroceder al paso anterior
            document.getElementById("siguiente").style.display = "block";
            document.getElementById("guardar").style.display = "none";

            // Mostrar botón anterior en todos los pasos excepto en el primero
            document.getElementById("anterior").style.display = "block";
        }
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);

            // Ocultar botón guardar después de avanzar al siguiente paso
            document.getElementById("siguiente").style.display = "block";
            document.getElementById("guardar").style.display = "none";

            // Mostrar botón anterior en todos los pasos excepto en el primero
            document.getElementById("anterior").style.display = "block";
        } else {
            // Mostrar botón guardar en el último paso
            document.getElementById("siguiente").style.display = "none";
            document.getElementById("guardar").style.display = "block";

            // Mostrar botón anterior en todos los pasos excepto en el primero
            document.getElementById("anterior").style.display = "block";
        }
    }

    function showStep(step) {
        for (let i = 1; i <= totalSteps; i++) {
            if (i === step) {
                document.getElementById("step-" + i).style.display = "block";
            } else {
                document.getElementById("step-" + i).style.display = "none";
            }
        }
    }

</script>

