@extends('adminlte::page')

@section('title', 'Add new product')

@section('content_header')
    <h1>Add new product</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        {!! Form::open(['route' => 'products.store', 'class' => 'form']) !!}
            @include('admin.products._partials.form')
        {!! Form::close() !!}

    </div>
</div>
<!-- /.card -->

@stop



