@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Dashboard</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}">
                <i class="fa fa-plus"></i> Nuevo
            </a>
        </div>
    </div>
</div>
@stop

@section('content')
    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success" role="alert"> 
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de usuarios --}}
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Correo Electronico</th>
            <th>Roles</th>
            <th width="280px">Accion</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge bg-success">{{ $v }}</label>
                    @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">
                    <i class="fa fa-list"></i> Detalle
                </a>
                <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">
                    <i class="fafa-pen-to-square"></i> Editar
                </a>
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{-- Paginación --}}
    {!! $data->links('pagination::bootstrap-5') !!}
    {!! $data->links('pagination::bootstrap-5'!!)}

@stop

@section('css')
    {{-- Estilos adicionales (opcional) --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
