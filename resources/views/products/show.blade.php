@extends('adminlte::page')

@section('title', 'detalle de producto')

@section('content_header')
    <h1>Detalle</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Producto</h3>
        <div class="card-tools">
            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">
                <i class="fa fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label><strong>Name:</strong></label>
                    <p>{{ $product->name }}</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label><strong>Details:</strong></label>
                    <p>{{ $product->detail }}</p>
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
        console.log('Show Product Page Loaded');
    </script>
@stop
