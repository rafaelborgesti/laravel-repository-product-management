@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>
        Categories
    </h1>
@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">Url</th>
                    <th scope="col" width="100px" >Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->url }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$category->id) }}" class="badge gb-yellow">Edit</a>
                        <a href="{{ route('categories.show',$category->id) }}" class="badge gb-info">Details</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.card -->

@stop



