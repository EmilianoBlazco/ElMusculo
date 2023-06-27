@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h4 class="text-center">Definir ejercicio</h4>
@stop

@section('content')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ingrese la información asociada al ejercicio</h3>
                <a href="{{ route('ejercicios.index') }}" class="btn btn-info float-right"><i class="fa-solid fa-arrow-left"></i> Volver al listado</a>
            </div>

            <div class="card-body">

                <form action="{{route('ejercicios.store')}}" method="POST" id="formulario">
                    @csrf
                    <div class="row">
                        <div class="col-7">

                            <div class="form-group">
                                <label for="inputNombre">Nombre del ejercicio (*)</label>
                                <input class="form-control" name="nombre" type="text" value="{{ old('nombre')}}" id="inputNombre">
                                <div class="text-danger" id="divNombre"></div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Breve descripción del ejercicio</label>
                                    <textarea class="form-control" name="descripcion" id="inputDescripcion">{{old('descripcion')}}</textarea>
                                    <div class="text-danger" id="divDescripcion"></div>
                                </div>
                        </div>
                    </div>

                   <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <h6 class="multisteps-form__title mb-2"><b>Seleccione los músculos que abarcara su ejercicio</b></h6>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-2 shadow-none p-3 mb-2 bg-light rounded">
                                        @foreach($musculos as $musculo)
                                            <div class="col-4 mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="musculos[]" value="{{$musculo->id}}" id="{{$musculo->id}}" class="form-check-input">
                                                    <label
                                                        class="form-check-label" for="{{$musculo->id}}">{{$musculo->nombre_gm}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="text-danger" id="divMusculos"></div>
                                </div>
                            </div>
                        </div>
                   </div>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" style="width: 200px;">Crear ejercicio <i class="fa-solid fa-paper-plane fa-lg"></i></button>
                        </div>
                    </div>
                </form>
            </div>
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
    {{--jquery cdn--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{--SweetAlert--}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
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
        $('#Formeliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro que deseas eliminar el ejercicio?',
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

    {{--Validación de formulario--}}
    <script>
        $(document).ready(function() {
            console.log("Evento 'input' o 'change' ejecutado.");

            $('#inputNombre').on('input change', function() {
                console.log("Evento 'input' o 'change' ejecutado.");
                var input = $(this);
                // cambiar la clase de los inputs
                if (input.val() === '') {
                    // Agregar clase de error al elemento padre adecuado
                    input.parents('.form-group').removeClass('is-valid');
                    input.parents('.form-group').addClass('is-invalid');
                } else {
                    // Agregar clase de éxito al elemento padre adecuado
                    input.parents('.form-group').removeClass('is-invalid');
                    input.parents('.form-group').addClass('is-valid');
                }
            });

            // si hay una clase is-invalid en el padre del input entonces no se puede enviar el formulario
            $('#formulario').on('submit', function(e) {
                var nombreInput = $('#inputNombre');
                var nombreDiv = $('#divNombre');
                var musculosDiv = $('#divMusculos');

                if (nombreInput.val() === '') {
                    nombreDiv.text('El campo nombre es obligatorio.');
                    nombreDiv.show();
                    nombreInput.removeClass('is-valid');
                    nombreInput.addClass('is-invalid');
                    e.preventDefault();
                } else {
                    nombreDiv.hide();
                    nombreInput.removeClass('is-invalid');
                    nombreInput.addClass('is-valid');
                }

                // Verificar si al menos se ha seleccionado un checkbox
                var checkboxesSeleccionados = $('.form-check-input:checked').length;

                if (checkboxesSeleccionados === 0) {
                    e.preventDefault();
                    musculosDiv.text('Seleccione al menos un grupo de músculos');
                    musculosDiv.show();
                    swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Debe seleccionar al menos un grupo de músculos",
                    });
                }else {
                    musculosDiv.hide();
                }

                // Verificar si hay algún campo con la clase is-invalid
                var error = $(this).find('.is-invalid').length > 0;

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
