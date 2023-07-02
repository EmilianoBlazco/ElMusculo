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
            color: #1e293b /* Ajustar color del texto */
        }


        h5 {
            font-weight: bold;
            margin: 0;
            color: #1e293b /* Ajustar color del texto */
        }





        .card {
            background: #D6D6D6;
            background: -webkit-linear-gradient(to right, #D6D6D6, #DDDDDD);
            background: linear-gradient(to right, #D6D6D6, #DDDDDD);
        }

        .multisteps-form__panel {
            background:#f1f5f9
        }

        /* .multisteps-form__content {
background:#1f2937
}  */



        .multisteps-form__progress-btn {
            color: #cbd5e1;
        }

        /* .multisteps-form__title {
    color: #cbd5e1;
} */




        .boton {
            border-radius: 8px;
            border: 1px solid #333;
            background-color: #333;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .boton:active {
            transform: scale(0.95);
        }

        .boton:focus {
            outline: none;
        }

        .boton.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }



        /* texto del boton en hoover blanco */
        .boton-info:hover {
            background-color: #FFFFFF;
            color: #333;
            border-color: #FFFFFF;
        }

        .boton-info {

            border-radius: 8px;
            border: 1px solid #2563eb;
            background-color: #2563eb;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .boton-info:active {
            transform: scale(0.95);
        }

        .boton-info:focus {
            outline: none;
        }

        .boton-info.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }






        /* texto del boton en hoover blanco */

        .boton-ok {

            border-radius: 8px;
            border: 1px solid #22c55e;
            background-color: #22c55e;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .boton-ok:active {
            transform: scale(0.95);
        }

        .boton-ok:focus {
            outline: none;
        }

        .boton-ok.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }







    </style>

</head>
<body>
{{--TODO: Poner en una alerta en onload el sgt msj:
<div>Los campos marcados con un <b>(*)</b> son obligatorios</div>--}}

<div class="page-header align-items-start min-vh-100 mb-4">

    <div class="container my-auto mt-6">
        <div class="row">
            <div class="col-lg-7 col-md-10 ">
                <h1>Cree su nuevo usuario</h1>
            </div>


            <div class="col">
                <h5 class="text-center">¿Ya tienes una cuenta?</h5>
                <div class="text-center mt-2">
                    <a href="{{ route('aut.login') }}" class="boton-info">Iniciar sesión <i class="fa-solid fa-right-to-bracket fa-lg"></i> </a>
                </div>
            </div>

        </div>
        <div class="card custom-card h-100 align-content-xxl-center mt-3">

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
                            <div class="multisteps-form__panel shadow p-4 rounded  js-active" data-animation="scaleIn">
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
                                    <div class="text-danger" id="divContra"></div>

                                    <div class="button-row d-flex mt-4">

                                        <a href="{{ route('inicio') }}" class="boton-info"><i class="fa-solid fa-arrow-left fa-lg"></i> Regresar al inicio</a>

                                        <button class="boton ml-auto  js-btn-next" type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
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
                                                    <select name="genero" id="inputGenero" class="form-control">
                                                        <option value="" name="genero">Seleccione su sexo (*)</option>
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
                                        <button class="boton  js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="boton  js-btn-next " type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
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
                                        <button class="boton  js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="boton  js-btn-next " type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
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
                                        <button class="boton  js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="boton  js-btn-next " type="button" title="Next">Siguiente <i class="fa-solid fa-arrow-right fa-lg"></i></button>
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
                                            <div class="text-danger" id="divDias"></div>
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
                                                               id="{{'obj'.$objetivo->id}}" class="form-check-input chequeado">
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
                                        <button class="boton js-btn-prev" type="button" title="Prev"><i class="fa-solid fa-arrow-left fa-lg"></i> Anterior</button>
                                    </div>
                                    <div class="col text-md-end">
                                        <button class="boton-ok ml-auto" type="submit" title="Send">Enviar <i class="fa-solid fa-paper-plane fa-lg"></i></button>
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
{{--jquery cdn--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{--SweetAlert--}}
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
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

{{--Validación de formulario--}}
<script>
    $(document).ready(function() {

        // si hay una clase is-invalid en el padre del input entonces no se puede enviar el formulario
        $('#form').on('submit', function(e) {

            //variables necesarias
            let error0 = 0;
            let error1 = 0;
            let error2 = 0;
            let error3 = 0;
            let error4 = 0;

            //Inputs seccion datos basicos iniciales
            let inicialesProgress = $('#progresDatosIniciales');
            let contraseniaInput = $('#inputContra');
            let contraseniaDiv = $('#divContra');

            //Inputs seccion datos basicos Basicos
            let basicosProgress = $('#progresDatosBasicos');
            let nombreInput = $('#inputNombre');
            let nombreDiv = $('#divNombre');
            let apellidoInput = $('#inputApellido');
            let apellidoDiv = $('#divApellido');
            let dniInput = $('#inputDNI');
            let dniDiv = $('#divDNI');
            let fechanacimientoInput = $('#inputFechaNacimiento');
            let fechanacimientoDiv = $('#divFechaNacimiento');
            let generoInput = $('#inputGenero');
            let generoDiv = $('#divGenero');

            //Inputs seccion datos medicos
            let medicosProgress = $('#progresDatosMedicos');
            let pesoInput = $('#inputPeso');
            let pesoDiv = $('#divPeso');
            let alturaInput = $('#inputAltura');
            let alturaDiv = $('#divAltura');

            //Inputs seccion datos de contacto
            let contactoProgress = $('#progresDatosContacto');
            let emailInput = $('#inputCorreo');
            let emailDiv = $('#divCorreo');
            let telefonoInput = $('#inputTelefono');
            let telefonoDiv = $('#divTelefono');

            //Inputs seccion datos de entrenamiento
            let entrenamientoProgress = $('#progresDatosEntrenamiento');
            let diasDiv = $('#divDias');
            let inicioInput = $('#inputFechaInicio');
            let inicioDiv = $('#divFechaInicio');

            //validacion seccion datos iniciales
            if (contraseniaInput.val() === '') {
                contraseniaDiv.text('El campo contraseña es obligatorio');
                contraseniaDiv.show();
                contraseniaInput.removeClass('is-valid');
                contraseniaInput.addClass('is-invalid');
                error0++;
                e.preventDefault(); // Evitar envío del formulario
            } else if (contraseniaInput.val().length < 6) {
                contraseniaDiv.text('La contraseña debe tener al menos 6 caracteres');
                contraseniaDiv.show();
                contraseniaInput.removeClass('is-valid');
                contraseniaInput.addClass('is-invalid');
                error0++;
                e.preventDefault(); // Evitar envío del formulario
            } else {
                contraseniaDiv.hide();
                contraseniaInput.removeClass('is-invalid');
                contraseniaInput.addClass('is-valid');
                error0--;
            }

            //validacion seccion datos basicos Basicos
            if (nombreInput.val() === '') {
                nombreDiv.text('El campo nombre es obligatorio.');
                nombreDiv.show();
                nombreInput.removeClass('is-valid');
                nombreInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else if (nombreInput.val().length < 2) {
                nombreDiv.text('El campo nombre debe tener al menos 2 caracteres.');
                nombreDiv.show();
                nombreInput.removeClass('is-valid');
                nombreInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else if (nombreInput.val().length > 50) {
                nombreDiv.text('El campo nombre debe tener menos de 50 caracteres.');
                nombreDiv.show();
                nombreInput.removeClass('is-valid');
                nombreInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else {
                nombreDiv.hide();
                nombreInput.removeClass('is-invalid');
                nombreInput.addClass('is-valid');
                /*error1--;*/
            }

            if (apellidoInput.val() === '') {
                apellidoDiv.text('El campo apellido es obligatorio.');
                apellidoDiv.show();
                apellidoInput.removeClass('is-valid');
                apellidoInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else if (apellidoInput.val().length < 2) {
                apellidoDiv.text('El campo apellido debe tener al menos 2 caracteres.');
                apellidoDiv.show();
                apellidoInput.removeClass('is-valid');
                apellidoInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else if (apellidoInput.val().length > 50) {
                apellidoDiv.text('El campo apellido debe tener menos de 50 caracteres.');
                apellidoDiv.show();
                apellidoInput.removeClass('is-valid');
                apellidoInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else {
                apellidoDiv.hide();
                apellidoInput.removeClass('is-invalid');
                apellidoInput.addClass('is-valid');
                /*error1--;*/
            }

            if (dniInput.val() === '') {
                dniDiv.text('El campo DNI es obligatorio.');
                dniDiv.show();
                dniInput.removeClass('is-valid');
                dniInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else if (dniInput.val().length < 7) {
                dniDiv.text('El campo DNI debe tener al menos 7 caracteres.');
                dniDiv.show();
                dniInput.removeClass('is-valid');
                dniInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else if (dniInput.val().length > 8) {
                dniDiv.text('El campo DNI debe tener menos de 8 caracteres.');
                dniDiv.show();
                dniInput.removeClass('is-valid');
                dniInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else {
                dniDiv.hide();
                dniInput.removeClass('is-invalid');
                dniInput.addClass('is-valid');
                /*error1--;*/
            }

            if (fechanacimientoInput.val() === '') {
                fechanacimientoDiv.text('El campo fecha de nacimiento es obligatorio.');
                fechanacimientoDiv.show();
                fechanacimientoInput.removeClass('is-valid');
                fechanacimientoInput.addClass('is-invalid');
                error1++;
                e.preventDefault();
            } else {
                let fechaNacimiento = new Date(fechanacimientoInput.val());
                let fechaActual = new Date();

                if (fechaNacimiento >= fechaActual) {
                    fechanacimientoDiv.text('La fecha de nacimiento debe ser anterior a la fecha actual.');
                    fechanacimientoDiv.show();
                    fechanacimientoInput.removeClass('is-valid');
                    fechanacimientoInput.addClass('is-invalid');
                    error1++;
                    e.preventDefault();
                } else {
                    fechanacimientoDiv.hide();
                    fechanacimientoInput.removeClass('is-invalid');
                    fechanacimientoInput.addClass('is-valid');
                    /*error1--;*/
                }
            }

            if (generoInput.val() === '') {
                generoDiv.text('Debe seleccionar uno de los sexos.');
                generoDiv.show();
                generoInput.removeClass('is-valid');
                generoInput.addClass('is-invalid');
                error1++;
            } else {
                generoDiv.hide();
                generoInput.removeClass('is-invalid');
                generoInput.addClass('is-valid');
                /*error1--;*/
            }

            //validacion seccion datos medicos
            // Validación del campo de peso
            if (pesoInput.val() === '') {
                pesoDiv.text('El campo peso es obligatorio');
                pesoDiv.show();
                pesoInput.removeClass('is-valid');
                pesoInput.addClass('is-invalid');
                error2++;
            } else if (isNaN(pesoInput.val())) {
                pesoDiv.text('Ingrese un valor numérico para el peso');
                pesoDiv.show();
                pesoInput.removeClass('is-valid');
                pesoInput.addClass('is-invalid');
                error2++;
            } else {
                pesoDiv.hide();
                pesoInput.removeClass('is-invalid');
                pesoInput.addClass('is-valid');
                /*error2 = false;*/
            }

            // Validación del campo de altura
            if (alturaInput.val() === '') {
                alturaDiv.text('El campo altura es obligatorio');
                alturaDiv.show();
                alturaInput.removeClass('is-valid');
                alturaInput.addClass('is-invalid');
                error2++;
            } else if (alturaInput.val().includes(',') || alturaInput.val().includes('.')) {
                alturaDiv.text('No se permiten comas (,) ni puntos (.) en la altura');
                alturaDiv.show();
                alturaInput.removeClass('is-valid');
                alturaInput.addClass('is-invalid');
                error2++;
            } else if (isNaN(alturaInput.val())) {
                alturaDiv.text('Ingrese un valor numérico para la altura');
                alturaDiv.show();
                alturaInput.removeClass('is-valid');
                alturaInput.addClass('is-invalid');
                error2++;
            } else {
                alturaDiv.hide();
                alturaInput.removeClass('is-invalid');
                alturaInput.addClass('is-valid');
                /*error2 = false;*/
            }

            //validacion seccion datos de contacto
            function validarEmail(email) {
                // Expresión regular para validar el formato del correo electrónico
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }

            if (emailInput.val() === '') {
                emailDiv.text('El campo correo electrónico es obligatorio');
                emailDiv.show();
                emailInput.removeClass('is-valid');
                emailInput.addClass('is-invalid');
                error3++;
            } else if (!validarEmail(emailInput.val())) {
                emailDiv.text('Ingrese un correo electrónico válido');
                emailDiv.show();
                emailInput.removeClass('is-valid');
                emailInput.addClass('is-invalid');
                error3++;
            } else {
                emailDiv.hide();
                emailInput.removeClass('is-invalid');
                emailInput.addClass('is-valid');
                /*error3 = false;*/
            }

            if (telefonoInput.val() === '') {
                telefonoDiv.text('El campo teléfono es obligatorio');
                telefonoDiv.show();
                telefonoInput.removeClass('is-valid');
                telefonoInput.addClass('is-invalid');
                error3++;
            }else if (
                telefonoInput.val().includes('-') ||
                telefonoInput.val().includes('_') ||
                telefonoInput.val().includes(',') ||
                telefonoInput.val().includes('.') ||
                telefonoInput.val().includes('/')
            ) {
                telefonoDiv.text('No se permiten los caracteres "-", "_", ",", ".", "/" en el teléfono');
                telefonoDiv.show();
                telefonoInput.removeClass('is-valid');
                telefonoInput.addClass('is-invalid');
                error3++;
            } else if (isNaN(telefonoInput.val())) {
                telefonoDiv.text('Ingrese un valor numérico para el teléfono');
                telefonoDiv.show();
                telefonoInput.removeClass('is-valid');
                telefonoInput.addClass('is-invalid');
                error3++;
            } else {
                telefonoDiv.hide();
                telefonoInput.removeClass('is-invalid');
                telefonoInput.addClass('is-valid');
                /*error3 = false;*/
            }

            //validacion seccion de entrenamiento
            // Verificar si al menos se ha seleccionado un checkbox
            let checkboxesSeleccionados = $('.chequeado:checked').length;

            console.log(checkboxesSeleccionados);

            if (checkboxesSeleccionados === 0) {
                diasDiv.text('Debe seleccionar los días que desea entrenar');
                diasDiv.show();
                error4++;
                e.preventDefault(); // Evitar envío del formulario
            } else {
                diasDiv.hide();
                /*error4 = false;*/
            }

            // Validación del campo de fecha de inicio
            if (inicioInput.val() === '') {
                inicioDiv.text('El campo fecha de inicio es obligatorio');
                inicioDiv.show();
                inicioInput.removeClass('is-valid');
                inicioInput.addClass('is-invalid');
                error4++;
            } else {
                inicioDiv.hide();
                inicioInput.removeClass('is-invalid');
                inicioInput.addClass('is-valid');
                /*error4 = false;*/
            }

            //aplicar cambio de clase a la progress bar segun validacion
            if (error0 > 0) {
                inicialesProgress.addClass('text-danger');
            }else {
                inicialesProgress.removeClass('text-danger');
                inicialesProgress.addClass('text-success');
            }

            if (error1 > 0) {
                basicosProgress.addClass('text-danger');
            }else {
                basicosProgress.removeClass('text-danger');
                basicosProgress.addClass('text-success');
            }

            if (error2 > 0) {
                medicosProgress.addClass('text-danger');
            }else {
                medicosProgress.removeClass('text-danger');
                medicosProgress.addClass('text-success');
            }

            if (error3 > 0) {
                contactoProgress.addClass('text-danger');
            }else {
                contactoProgress.removeClass('text-danger');
                contactoProgress.addClass('text-success');
            }

            if (error4 > 0) {
                entrenamientoProgress.addClass('text-danger');
            }else {
                entrenamientoProgress.removeClass('text-danger');
                entrenamientoProgress.addClass('text-success');
            }

            // Verificar si hay algún campo con la clase is-invalid
            let error = $(this).find('.is-invalid').length > 0;

            if (error) {
                e.preventDefault();
                swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Hay campos que poseen errores, por favor verifique los datos ingresados",
                });
            }
        });
    });
</script>

<style>
    .custom-card {
        background:linear-gradient(to top, #334155, #1e293b);
    }

    .text-white {
        color: #fff !important;
    }

</style>
