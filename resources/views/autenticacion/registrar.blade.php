<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registro</title>
</head>
<body>

<h1>Registro</h1>

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

