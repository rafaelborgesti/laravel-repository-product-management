@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Add</a>
        Products
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
@stop

@section('content')


<?php /*
<div class="card card-outline card-success">
    <div class="card-body">
        <form action="{{ route('products.search') }}" class="form form-inline" method="POST">
            @csrf
            <input type="text" name="title" value="{{ $data['title'] ?? '' }}" placeholder="Title" class="form-control">
            <input type="text" name="url" value="{{ $data['url'] ?? '' }}" placeholder="URL" class="form-control">
            <input type="text" name="description"value="{{ $data['description'] ?? '' }}"  placeholder="Description" class="form-control">
            <input type="submit" class="btn btn-success" value="Search">
        </form>

        @if (isset($data))
            <a href="{{ route('products.index') }}">(x) Clear Search Results</a>
        @endif

    </div>
</div>
*/ ?>

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Price</th>
                    <th scope="col" width="100px" >Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->category->title }}</td>
                    <td>R$ {{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.edit',$product->id) }}" class="badge gb-yellow">Edit</a>
                        <a href="{{ route('products.show',$product->id) }}" class="badge gb-info">Details</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <?php /*
        @if( isset($data) )
            {!! $categories->appends($data)->links() !!}
        @else
            {!! $categories->links() !!}
        @endif
        */ ?>

    </div>
</div>
<!-- /.card -->

@stop



