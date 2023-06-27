@extends('adminlte::page')

@section('title', 'Pagina principal')

@section('content_header')
@stop

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1 class="text-center">Bienvenido al sistema de EL MÚSCULO!!!</h1>
    <br>
    <br>
    <br>
    <div class="d-flex flex-column align-items-center justify-content-center h-100 mt-12">
        <div class="text-center">
            <h3>Este es el sistema de administración de la plataforma EL MÚSCULO.</h3>
            <h3>Para comenzar, seleccione una de las opciones del menú lateral izquierdo.</h3>
            <h3>Si tiene alguna duda, puede consultar con el entrenador a cargo.</h3>
            <h3>¡que tenga un buen día!</h3>
        </div>
        <br>
        <div class="text-center mt-3">
            <img src="{{ asset('img/musculo_negro.png') }}" alt="Logo de la plataforma" width="300px">
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
    {{--SweetAlert--}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
@stop
