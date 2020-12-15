@extends('adminlte::page')

@section('title', 'Categoriy details')

@section('content_header')
    <h1>Product details {{ $product->name }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        <p><strong>ID: </strong>{{ $product->id }}</p>
        <p><strong>Name: </strong>{{ $product->name }}</p>
        <p><strong>Category: </strong>{{ $product->category->title }}</p>
        <p><strong>Price: </strong>{{ $product->price }}</p>
        <p><strong>Description: </strong>{{ $product->description }}</p>
        
        <hr>

        <form action="{{ route('products.destroy',$product->id) }}" class="form" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
        
    </div>
</div>
<!-- /.card -->

@stop



