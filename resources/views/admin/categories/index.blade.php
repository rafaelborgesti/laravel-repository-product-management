@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add</a>
        Categories
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Categorias</li>
    </ol>
@stop

@section('content')


<div class="card card-outline card-success">
    <div class="card-body">
        <form action="{{ route('categories.search') }}" class="form form-inline" method="POST">
            @csrf
            <input type="text" name="title" value="{{ $data['title'] ?? '' }}" placeholder="Title" class="form-control">
            <input type="text" name="url" value="{{ $data['url'] ?? '' }}" placeholder="URL" class="form-control">
            <input type="text" name="description"value="{{ $data['description'] ?? '' }}"  placeholder="Description" class="form-control">
            <input type="submit" class="btn btn-success" value="Search">
        </form>

        @if (isset($search))
            <p>Resultados para: <strong>{{ $search }}</strong></p>
        @endif

    </div>
</div>

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
        
        @if( isset($data) )
            {!! $categories->appends($data)->links() !!}
        @else
            {!! $categories->links() !!}
        @endif

    </div>
</div>
<!-- /.card -->

@stop



