@extends('adminlte::page')

@section('title', 'Categoriy details')

@section('content_header')
    <h1>Categoriy details {{ $category->title }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        <p><strong>ID: </strong>{{ $category->id }}</p>
        <p><strong>Title: </strong>{{ $category->title }}</p>
        <p><strong>URL: </strong>{{ $category->url }}</p>
        <p><strong>Description: </strong>{{ $category->description }}</p>
        <hr>

        <form action="{{ route('categories.destroy',$category->id) }}" class="form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="btn btn-danger" value="Deletar">
        </form>
        
    </div>
</div>
<!-- /.card -->

@stop



