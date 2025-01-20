@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Modificar Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modificar Usuario</h3>
    </div>

    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name"><strong>Nombre:</strong></label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="email"><strong>Email:</strong></label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="password"><strong>Password:</strong></label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="confirm-password"><strong>Confirmar Password:</strong></label>
                <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirmar Password">
            </div>

            <div class="form-group">
                <label for="roles"><strong>Role:</strong></label>
                <select name="roles[]" class="form-control select2" id="roles" multiple="multiple">
                    @foreach ($roles as $value => $label)
                        <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary btn-sm mr-2">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Select Roles",
                allowClear: true
            });
        });
    </script>
@stop
