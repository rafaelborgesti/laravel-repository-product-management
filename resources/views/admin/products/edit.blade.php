@extends('adminlte::page')

@section('title', 'Edit product')

@section('content_header')
    <h1>Edit product: {{ $product->title }}</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        {{ Form::model($product, ['route' => ['products.update', $product->id], 'class' => 'form']) }}
            @method('PUT')
            @include('admin.products._partials.form')
        {{ Form::close() }}

    </div>
</div>
<!-- /.card -->

@stop



