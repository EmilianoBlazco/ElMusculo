@extends('adminlte::page')

@section('title', 'Modificar datos')

@section('content_header')

    <h4 class="text-center">Datos del perfil de {{$usuario->nombre .' '. $usuario->apellido}}</h4>
    <div class="text-right">
        <form action="{{ route('perfil.update', ['perfil' => Auth::user()->id]) }}" method="POST" id="perfilFormdeshabilitar">
            @csrf @method('PATCH')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-down-left-and-up-right-to-center"></i> Deshabilitar cuenta</button>
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


            <form action="{{ route('perfil.update', ['perfil' => Auth::user()->id]) }}" method="POST" id="formulario">
                @csrf @method('PATCH')

                {{--Campo oculto para saber que actualizamos datos--}}
                <input type="hidden" name="actualizar" value="1">

                <div class="card">
                    <div class="card-header" id="divIniciales">
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

                <div class="card collapsed-card" id="divBasicos">
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
                                    <div class="text-danger" id="divNombre"></div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputApellido">Apellido (*)</label>
                                    <input class="form-control" name="apellido" type="text" value="{{ old('apellido',$usuario->apellido) }}" id="inputApellido">
                                    <div class="text-danger" id="divApellido"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputDNI">D.N.I (*)</label>
                                    <input class="form-control" name="dni" type="text" value="{{ old('dni',$usuario->dni) }}" id="inputDNI">
                                    <div class="text-danger" id="divDNI"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputFechaNacimiento">Fecha de nacimiento (*)</label>
                                    <input class="form-control" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento',date('Y-m-d',strtotime($usuario->fecha_nacimiento))) }}" id="inputFechaNacimiento">
                                    <div class="text-danger" id="divFechaNacimiento"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputGenero">Género (*)</label>
                                    <select class="form-control" name="genero" id="inputGenero">
                                        <option value="">Seleccione su sexo</option>
                                        @foreach($generos as $genero)
                                            <option value="{{ $genero->id }}" {{ old('genero', $usuario->genero_id) == $genero->id ? 'selected' : '' }}>
                                                {{ $genero->generos }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="divGenero"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card collapsed-card" id="divMedicos">
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
                                    <label for="inputPeso">Peso(kg) (*)</label>
                                    <input class="form-control" name="peso" type="text" value="{{ old('peso',$usuario->peso) }}" id="inputPeso">
                                    <div class="text-danger" id="divPeso"></div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputAltura">Altura(cm) (*)</label>
                                    <input class="form-control" name="altura" type="text" value="{{ old('altura',$usuario->altura) }}" id="inputAltura">
                                    <div class="text-danger" id="divAltura"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card collapsed-card" id="divContacto">
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
                                    <label for="inputCorreo">Correo electrónico (*)</label>
                                    <input class="form-control" name="email" type="text" value="{{ old('email',$usuario->email) }}" id="inputCorreo">
                                    <div class="text-danger" id="divCorreo"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputTelefono">Teléfono (*)</label>
                                    <input class="form-control" name="telefono" type="text" value="{{ old('telefono',$usuario->telefono) }}" id="inputTelefono">
                                    <div class="text-danger" id="divTelefono"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card collapsed-card" id="divEntrenamiento">
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
                            <div class="col-8">
                                <div class="form-group">
                                    <h6 class="multisteps-form__title">¿Qué días piensa asistir al gimnasio? (*)</h6>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-2 shadow-none p-3 mb-2 bg-light rounded">
                                            @foreach($dias_entrenamiento as $dias)
                                                <div class="col form-check-inline">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="dias[]" class="form-check-input chequeado" id="{{$dias->id}}" value="{{$dias->id}}"
                                                               @if($usuario->diasEntrenamiento()->get()->contains($dias->id))
                                                                   checked
                                                            @endif
                                                        >
                                                        <label class="form-check-label" for="{{$dias->id}}">{{$dias->dias}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-danger" id="divDias"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="inputFechaInicio">Fecha de inicio (*)</label>
                                    <input class="form-control" name="fecha_inicio" type="date" value="{{ old('fecha_inicio',date('Y-m-d',strtotime($usuario->fecha_inicio))) }}" id="inputFechaInicio">
                                    <div class="text-danger" id="divFechaInicio"></div>
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

    {{--Validación de formulario--}}
    <script>
        $(document).ready(function() {

            // si hay una clase is-invalid en el padre del input entonces no se puede enviar el formulario
            $('#formulario').on('submit', function(e) {

                //variables necesarias
                let error0 = 0;
                let error1 = 0;
                let error2 = 0;
                let error3 = 0;
                let error4 = 0;

                //inputs seccion datos iniciales
                let inicialesDiv = $('#divIniciales');

                //Inputs seccion datos basicos Basicos
                let basicosDiv = $('#divBasicos');
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
                let medicosDiv = $('#divMedicos');
                let pesoInput = $('#inputPeso');
                let pesoDiv = $('#divPeso');
                let alturaInput = $('#inputAltura');
                let alturaDiv = $('#divAltura');

                //Inputs seccion datos de contacto
                let contactoDiv = $('#divContacto');
                let emailInput = $('#inputCorreo');
                let emailDiv = $('#divCorreo');
                let telefonoInput = $('#inputTelefono');
                let telefonoDiv = $('#divTelefono');

                //Inputs seccion datos de entrenamiento
                let entrenamientoDiv = $('#divEntrenamiento');
                let diasDiv = $('#divDias');
                let inicioInput = $('#inputFechaInicio');
                let inicioDiv = $('#divFechaInicio');


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
                    }
                }

                if (generoInput.val() === '') {
                    generoDiv.text('Debe seleccionar uno de los sexos.');
                    generoDiv.show();
                    generoInput.removeClass('is-valid');
                    generoInput.addClass('is-invalid');
                    error1++;
                    e.preventDefault();
                } else {
                    generoDiv.hide();
                    generoInput.removeClass('is-invalid');
                    generoInput.addClass('is-valid');
                }

                //validacion seccion datos medicos
                // Validación del campo de peso
                if (pesoInput.val() === '') {
                    pesoDiv.text('El campo peso es obligatorio');
                    pesoDiv.show();
                    pesoInput.removeClass('is-valid');
                    pesoInput.addClass('is-invalid');
                    error2++;
                    e.preventDefault();
                } else if (isNaN(pesoInput.val())) {
                    pesoDiv.text('Ingrese un valor numérico para el peso');
                    pesoDiv.show();
                    pesoInput.removeClass('is-valid');
                    pesoInput.addClass('is-invalid');
                    error2++;
                    e.preventDefault();
                } else {
                    pesoDiv.hide();
                    pesoInput.removeClass('is-invalid');
                    pesoInput.addClass('is-valid');
                }

                // Validación del campo de altura
                if (alturaInput.val() === '') {
                    alturaDiv.text('El campo altura es obligatorio');
                    alturaDiv.show();
                    alturaInput.removeClass('is-valid');
                    alturaInput.addClass('is-invalid');
                    error2++;
                    e.preventDefault();
                } else if (alturaInput.val().includes(',') || alturaInput.val().includes('.')) {
                    alturaDiv.text('No se permiten comas (,) ni puntos (.) en la altura');
                    alturaDiv.show();
                    alturaInput.removeClass('is-valid');
                    alturaInput.addClass('is-invalid');
                    error2++;
                    e.preventDefault();
                } else if (isNaN(alturaInput.val())) {
                    alturaDiv.text('Ingrese un valor numérico para la altura');
                    alturaDiv.show();
                    alturaInput.removeClass('is-valid');
                    alturaInput.addClass('is-invalid');
                    error2++;
                    e.preventDefault();
                } else {
                    alturaDiv.hide();
                    alturaInput.removeClass('is-invalid');
                    alturaInput.addClass('is-valid');
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
                    e.preventDefault();
                } else if (!validarEmail(emailInput.val())) {
                    emailDiv.text('Ingrese un correo electrónico válido');
                    emailDiv.show();
                    emailInput.removeClass('is-valid');
                    emailInput.addClass('is-invalid');
                    error3++;
                    e.preventDefault();
                } else {
                    emailDiv.hide();
                    emailInput.removeClass('is-invalid');
                    emailInput.addClass('is-valid');
                }

                if (telefonoInput.val() === '') {
                    telefonoDiv.text('El campo teléfono es obligatorio');
                    telefonoDiv.show();
                    telefonoInput.removeClass('is-valid');
                    telefonoInput.addClass('is-invalid');
                    error3++;
                    e.preventDefault();
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
                    e.preventDefault();
                } else if (isNaN(telefonoInput.val())) {
                    telefonoDiv.text('Ingrese un valor numérico para el teléfono');
                    telefonoDiv.show();
                    telefonoInput.removeClass('is-valid');
                    telefonoInput.addClass('is-invalid');
                    error3++;
                    e.preventDefault();
                } else {
                    telefonoDiv.hide();
                    telefonoInput.removeClass('is-invalid');
                    telefonoInput.addClass('is-valid');
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
                }

                // Validación del campo de fecha de inicio
                if (inicioInput.val() === '') {
                    inicioDiv.text('El campo fecha de inicio es obligatorio');
                    inicioDiv.show();
                    inicioInput.removeClass('is-valid');
                    inicioInput.addClass('is-invalid');
                    error4++;
                    e.preventDefault();
                } else {
                    inicioDiv.hide();
                    inicioInput.removeClass('is-invalid');
                    inicioInput.addClass('is-valid');
                }

                //aplicar cambio de clase a la Div bar segun validacion
                if (error0 > 0) {
                    inicialesDiv.addClass('card-danger');
                }else {
                    inicialesDiv.removeClass('card-danger');
                    inicialesDiv.addClass('card-success');
                }

                console.log(error0);

                if (error1 > 0) {
                    basicosDiv.addClass('card-danger');
                }else {
                    basicosDiv.removeClass('card-danger');
                    basicosDiv.addClass('card-success');
                }

                if (error2 > 0) {
                    medicosDiv.addClass('card-danger');
                }else {
                    medicosDiv.removeClass('card-danger');
                    medicosDiv.addClass('card-success');
                }

                if (error3 > 0) {
                    contactoDiv.addClass('card-danger');
                }else {
                    contactoDiv.removeClass('card-danger');
                    contactoDiv.addClass('card-success');
                }

                if (error4 > 0) {
                    entrenamientoDiv.addClass('card-danger');
                }else {
                    entrenamientoDiv.removeClass('card-danger');
                    entrenamientoDiv.addClass('card-success');
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

@stop
