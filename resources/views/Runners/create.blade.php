@extends('layout.layout')

@section('title','Admin')

@section('header')
    @include('layout.header')
    @include('layout.nav')

@section('component')
    <script src="{{ asset('js/components/createRunner.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container d-flex flex-column justify-content-around align-items-center createRunnerformDiv ">
    <h1 class="formTitle">CREAR CORREDOR</h1>
    <form action="{{ route('runners.store') }}" method="POST">
        @csrf

        <div class="mb-4 runnerInput">
            <input name="dni" type="text" value="{{ old('dni','') }}" placeholder="DNI"><br>
        </div>
        <div class="mb-4 runnerInput">
            <input name="name" type="text" value="{{ old('name','') }}" placeholder="Nombre"><br>
        </div>
        <div class="mb-4 runnerInput">
            <input name="surname" type="text" value="{{ old('surname','') }}" placeholder="Apellidos"><br>
        </div>

        <div class="mb-4 runnerInput">
            <input name="address" type="text" value="{{ old('address','') }}" placeholder="Dirección"><br>
        </div>

        <div class="mb-4 runnerInput">
            <input name="date_of_birth" type="text" value="{{ old('date_of_birth','') }}" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="checkBirthDate(this)"><br>
        </div>

        <div class="mb-4 runnerInput">
            <select name="federated" type="number" value="{{ old('federated','') }}" onchange="enableFederatedNumber(this);">
                <option value="" selected disabled >Selecciona una opción</option>
                <option value="PRO">PRO</option>
                <option value="OPEN">OPEN</option>
            </select><br>
        </div>

        <div class="mb-4 runnerInput">
            <select name="gender" type="number" value="{{ old('gender','') }}">
                <option value="" selected disabled >Selecciona un género</option>
                <option value="male">Hombre</option>
                <option value="female">Mujer</option>
            </select><br>
        </div>

        <div class="mb-4 runnerInput">
            <input name="federated_num" type="text" value="{{ old('federated_num','') }}" placeholder="Nº Federado" disabled><br>
        </div>
        <button type="submit" class="submitLogAdminButton">AÑADIR CORREDOR</button>
    </form>


    <a class="returnFormButton" href="{{ route('runners') }}">VOLVER A PÁGINA PRINCIPAL</a>
</div>
    @foreach ($errors->all() as $error)
            <div class="container">
                <li class="alert alert-danger">{{ $error }}</li>
            </div>
@endforeach
@section('footer')
@include('layout.footer')
