
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
    {{--Font Awesome--}}
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        * {
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: #F2F2F2;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        .h1gris {
            font-weight: bold;
            margin: 0;
            color: #333; /* Ajustar color del texto */
        }

        .h1blanco {
            font-weight: bold;
            margin: 0;
            color: #ffffff; /* Ajustar color del texto */
        }

        h2 {
            text-align: center;
            color: #333; /* Ajustar color del texto */
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
            color: #666; /* Ajustar color del texto */
        }

        .pblanco {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
            color: #ffffff; /* Ajustar color del texto */
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
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

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 530px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #333;
            background: -webkit-linear-gradient(to right, #333, #666);
            background: linear-gradient(to right, #333, #666);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 999;
        }

        footer p {
            margin: 10px 0;
        }

        footer i {
            color: red;
        }

        footer a {
            color: #3c97bf;
            text-decoration: none;
        }
    </style>


    <title>Iniciar Sesión</title>

</head>
<body>

<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="#">
            <h5>
                Donde la fuerza se encuentra con la determinación y los límites son solo el comienzo.<br>
                En nuestro gimnasio, te brindamos el espacio perfecto para desafiar tus límites, esculpir tu cuerpo y alcanzar tus metas fitness.
            </h5>
            <h6 class="text-black mt-3 mb-3">¡Únete a nosotros hoy!</h6>
            <h5 class="text-black">Y A ENTRENAAAR!!</h5>
            <div class="d-flex justify-content-center align-items-center mb-2">
                <img src="{{ asset('img/musculo_negro.png') }}" width="100" height="100">
            </div>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="{{route('aut.loging')}}" method="post">
            @csrf
            <h1 class="h1gris">Inicia sesión</h1>
            <div class="input-group input-group-outline mt-4">
                <label for="inputNombreU" class="form-label">Nombre de usuario(DNI)</label>
                <input class="form-control" name="dni" type="number" value="{{old('dni')}}" id="inputNombreU">
            </div>
            <div class="input-group input-group-outline mt-4">
                <label for="inputContra" class="form-label">Contraseña</label>
                <input class="form-control" name="password" type="password" value="{{old('password')}}" id="inputContra">
            </div>
            <button class="mt-4">Ingresar <i class="fa-solid fa-paper-plane"></i></button>
            <div class="mt-3 text-center">
                <p class="mb-1">¿Todavía no te has registrado?</p><a href="{{ route('aut.registrar') }}" class="btn btn-info">Registrarse <i class="fa-solid fa-address-card"></i></a>
                <p class="mb-1">¿Quieres regresar a la pagina principal?</p><a class="btn btn-info mb-3" href="{{ route('inicio') }}"><i class="fa-solid fa-arrow-left fa-lg"></i> Regresar al inicio</a>
            </div>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1 class="h1blanco">
                    Gimnasio <br>
                    "El Músculo"
                </h1>
                <button class="ghost mt-3" id="signIn">Iniciar Sesión <i class="fa-solid fa-right-to-bracket fa-lg"></i></button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1 class="h1blanco">¡Bienvenido/a a nuestro gimnasio!</h1>
                {{--TODO:Queda muy pobre, hay que agregarle mas texto--}}
                <p class="pblanco">¿Quieres saber mas?</p>
                <button class="ghost" id="signUp">Saber mas <i class="fa-solid fa-book-open"></i></button>
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

{{--Animacion form--}}
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>
{{--Animacion form--}}

