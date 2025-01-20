@extends('adminlte::page')

@section('title', 'Edit Role')

@section('content_header')
    <h1>Edit Role</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Role</h3>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $role->name }}" id="name">
            </div>

            <div class="form-group">
                <label><strong>Permissions:</strong></label>
                <div class="row">
                    @foreach($permission as $value)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}" class="form-check-input" id="permission-{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                <label class="form-check-label" for="permission-{{ $value->id }}">{{ $value->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group d-flex justify-content-start">
                <a class="btn btn-primary btn-sm mr-2" href="{{ route('roles.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-floppy-disk"></i> Submit
                </button>
            </div>
        </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('js')
    <script>
        console.log('Edit Role Page Loaded');
    </script>
@stop
