@extends('adminlte::page')

@section('title', 'Add new categoriy')

@section('content_header')
    <h1>Add new categoriy</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        <form action="{{ route('categories.store') }}" class="form" method="POST">
            @include('admin.categories._partials.form')
        </form>

    </div>
</div>
<!-- /.card -->

@stop



