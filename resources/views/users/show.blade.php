@extends('adminlte::page')

@section('title', 'Show User')

@section('content_header')
    <h1>Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detalle</h3>
        <div class="card-tools">
            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">
                <i class="fa fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <p class="text-muted">{{ $user->name }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <p class="text-muted">{{ $user->email }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Rol asignado:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <span class="badge badge-success">{{ $v }}</span>
                        @endforeach
                    @else
                        <p class="text-muted">Rol no asignado</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('js')
    <script>
        console.log('Show User Page Loaded');
    </script>
@stop
