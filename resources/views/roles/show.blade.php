@extends('adminlte::page')

@section('title', 'Detalle de rol')

@section('content_header')
    <h1>Detalle</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Rol</h3>
    </div>

    <div class="card-body">
        <!-- Role Name -->
        <div class="form-group">
            <label><strong>Nombre de rol:</strong></label>
            <p>{{ $role->name }}</p>
        </div>

        <!-- Role Permissions -->
        <div class="form-group">
            <label><strong>Permisos asignados:</strong></label>
            <ul class="list-unstyled">
                @foreach($rolePermissions as $permission)
                    <li><span class="badge badge-info">{{ $permission->name }}</span></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('roles.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Volver</a>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('js')
    <script>
        console.log('Show Role Page Loaded');
    </script>
@stop
