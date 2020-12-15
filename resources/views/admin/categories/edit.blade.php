@extends('adminlte::page')

@section('title', 'Edit categoriy')

@section('content_header')
    <h1>Edit categoriy: {{ $category->title }}</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')
        
        <form action="{{ route('categories.update',$category->id) }}" class="form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            @include('admin.categories._partials.form')
        </form>
    </div>
</div>
<!-- /.card -->

@stop



