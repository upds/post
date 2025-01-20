@extends('adminlte::page')

@section('title', 'Role Management')

@section('content_header')
    <h1>Gestion de Roles</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista</h3>
        <div class="card-tools">
            @can('role-create')
                <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}">
                    <i class="fa fa-plus"></i> Nuevo
                </a>
            @endcan
        </div>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 100px;">No</th>
                    <th>Nombre de Rol</th>
                    <th style="width: 280px;">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">
                                <i class="fa fa fa-list"></i> Detalle
                            </a>
                            @can('role-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">
                                    <i class="fa fa-pencil"></i>Modificar
                                </a>
                            @endcan
                            @can('role-delete')
                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $roles->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('js')
    <script>
        console.log('Role Management Page Loaded');
    </script>
@stop
