
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--Estilo de bootstrap y material kit--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite(['resources/css/material-kit.css','resources/css/multistep.css', 'resources/js/multistep.js', 'resources/js/material-kit.js'])
    {{--SweetAlert--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">


    <title>Iniciar Sesión</title>

</head>
<body style="background: #1A232C">

<div class="container py-5 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="rotating-card-container">
                <div class="card card-rotate card-background mt-md-0 mt-5">
                    <div class="front front-background" style=" background-size: cover; height: 456px;">
                        {{--background-image: url(https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/toboshar.jpg)--}}
                        <div class="card-body pt-7 text-center">
                            <h3 class="text-white mb-6">Bienvenido!!!</h3>
                            <p class="text-white opacity-8 mb-6">
                                ¡Bienvenido a "El Músculo"! Donde la fuerza se encuentra con la determinación y los límites son solo el comienzo.
                                En nuestro gimnasio, te brindamos el espacio perfecto para desafiar tus límites, esculpir tu cuerpo y alcanzar tus metas fitness.
                            </p>
                        </div>
                    </div>
                    <div class="back back-background">
                        {{--background-image: url(https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/toboshar.jpg)--}}
                        <div class="card-body pt-7 text-center">
                            <h3 class="text-white mb-6">¡Únete a nosotros hoy!</h3>
                            <h5 class="text-white ">Y A ENTRENAAAR!!</h5>
                            <div class="d-flex justify-content-center align-items-center mb-6">
                                <img src="{{ asset('img/musculo_negro.jpg') }}" width="200" height="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Iniciar Sesion</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('aut.loging')}}" method="post">
                        @csrf
                        <div class="input-group input-group-outline mt-2 bg-light rounded">
                            <label class="form-label">Nombre de usuario</label>
                            <input class="form-control" name="dni" type="number" value="{{old('dni')}}" id="inputNombreU">
                        </div>
                        <div class="input-group input-group-outline mt-4 bg-light rounded">
                            <label class="form-label">Contraseña</label>
                            <input class="form-control" name="password" type="password" value="{{old('password')}}" id="inputContra">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success" style="width: 75%;">Ingresar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-2">¿Todavía no te has registrado? <a href="{{ route('aut.registrar') }}">Registrarse</a></p>
                    <p class="mb-3">¿Quieres regresar a la pagina principal? <a href="{{ route('inicio') }}">Regresar</a></p>
                </div>
            </div>
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

{{--Alertas--}}
<script>
    @if(session('login') == 'no')
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Usuario o contraseña incorrectos',
    })
    @endif

    @if(session('login') == 'existe' || session('registro') == 'existe')
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Parece que usted ya poseía una cuenta en nuestro sistema. ' +
            'Si desea volver a habilitarla, comuníquese con la administración del gimnasio',
    })
    @endif

    @if(session('baja') == 'ok')
    Swal.fire({
        icon: 'success',
        title: 'Completado!!',
        text: 'Su cuenta fue dada de baja correctamente',
    })
    @endif
</script>
{{--Alertas--}}
