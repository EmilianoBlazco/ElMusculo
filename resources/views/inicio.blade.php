{{--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina de Inicio</title>
</head>
<body>

<h1>Inicio</h1>

<div>
    <a href="{{ route('aut.login') }}">Iniciar Sesión</a>
    <a href="{{ route('aut.registrar') }}">Registro</a>
</div>

</body>
</html>--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina de Inicio</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('img/inicio.jpeg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Ajuste para separar los botones del texto */
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column; /* Ajuste para colocar el texto debajo del botón */
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 0 10px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .button:hover {
            transform: scale(1.1);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .button img {
            width: 60px;
            height: 60px;
        }

        .button span {
            margin-top: 10px; /* Ajuste para separar el texto del botón */
            font-size: 18px; /* Ajuste para el tamaño del texto dentro de los botones */
            color: rgba(0, 0, 0, 0.8);
        }

        .message {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px; /* Ajuste para el tamaño del texto */
            color: white;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="message">Bienvenido al Musculo!!</div>
    <div class="button-container">
        <a href="{{ route('aut.login') }}" class="button">
            <img src="{{ asset('img/silbato.png') }}" alt="Silbato icon">
            <span>Ingresar</span>
        </a>
        <a href="{{ route('aut.registrar') }}" class="button">
            <img src="{{ asset('img/tabla.png') }}" alt="Cuaderno icon">
            <span>Registrarse</span>
        </a>
    </div>
</div>
</body>
</html>




