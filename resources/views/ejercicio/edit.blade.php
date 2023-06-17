@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h4 class="text-center">Modificar ejercicio</h4>
@stop

@section('content')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ingrese la información que desea cambiar asociada al ejercicio</h3>
                <a href="{{ route('ejercicios.index') }}" class="btn btn-info float-right"><i class="fa-solid fa-arrow-left"></i> Volver al listado</a>
            </div>

            <div class="card-body">

                <form action="{{route('ejercicios.update',$ejercicio)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-9">

                            <div class="form-group">
                                <label for="inputNombre">Nombre del ejercicio (*)</label>
                                <input class="form-control" name="nombre" type="text" value="{{ old('nombre',$ejercicio->nombre)}}" id="inputNombre">
                            </div>
                            <div class="text-danger" id="divNombre"></div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Breve descripción del ejercicio</label>
                                    <textarea class="form-control" name="descripcion" id="inputDescripcion">{{old('descripcion',$ejercicio->descripcion)}}</textarea>
                                </div>
                                <div class="text-danger" id="divDescripcion"></div>
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
                                                    <input type="checkbox" name="musculos[]" value="{{$musculo->id}}" id="{{$musculo->id}}" class="form-check-input"
                                                           @if($ejercicio->grupoMuscular()->get()->contains($musculo->id))
                                                               checked
                                                           @endif
                                                    >
                                                    <label
                                                        class="form-check-label" for="{{$musculo->id}}">{{$musculo->nombre_gm}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" style="width: 200px;">Guardar cambios <i class="fa-solid fa-floppy-disk"></i></button>
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
    <script>
        // Obtener los checkboxes de los grupos y los individuales
        const checkboxesGrupo = document.querySelectorAll('.checkbox-grupo');
        const checkboxesIndividuales = document.querySelectorAll('.checkbox-individual');

        // Agregar event listener para los checkboxes de los grupos
        checkboxesGrupo.forEach(function(checkboxGrupo) {
            checkboxGrupo.addEventListener('change', function() {
                const isChecked = checkboxGrupo.checked;

                // Marcar o desmarcar los checkboxes individuales del grupo
                checkboxesIndividuales.forEach(function(checkboxIndividual) {
                    checkboxIndividual.checked = isChecked;
                });
            });
        });

        // Agregar event listener para los checkboxes individuales
        checkboxesIndividuales.forEach(function(checkboxIndividual) {
            checkboxIndividual.addEventListener('change', function() {
                const grupoCheckbox = checkboxIndividual.closest('.form-group').querySelector('.checkbox-grupo');

                // Verificar si todos los checkboxes individuales del grupo están seleccionados
                const todosSeleccionados = Array.from(checkboxIndividual.closest('.form-group').querySelectorAll('.checkbox-individual'))
                    .every(function(checkbox) {
                        return checkbox.checked;
                    });

                // Marcar o desmarcar el checkbox del grupo
                grupoCheckbox.checked = todosSeleccionados;
            });
        });
    </script>
@stop
