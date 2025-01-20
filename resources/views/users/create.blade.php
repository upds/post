@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Nuevo Usuario</h2>
        </div>
    </div>
</div>
@stop

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hubo algunos problemas con los datos proporcionados.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Nombre:</strong></label>
                        <input type="text" name="name" placeholder="Nombre" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"><strong>Email:</strong></label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password"><strong>Contraseña:</strong></label>
                        <input type="password" name="password" placeholder="Contraseña" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm-password"><strong>Confirmar Contraseña:</strong></label>
                        <input type="password" name="confirm-password" placeholder="Confirmar Contraseña" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="roles"><strong>Rol:</strong></label>
                        <select name="roles[]" class="form-control" multiple="multiple">
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3 mr-2">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar
                </button>
                <a class="btn btn-primary btn-sm mt-2 mb-3" href="{{ route('users.index') }}">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
            </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
{{-- Aquí puedes agregar estilos personalizados si es necesario --}}
@stop

@section('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop
