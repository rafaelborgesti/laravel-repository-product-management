@extends('adminlte::page')

@section('title', 'Edit categoriy')

@section('content_header')
    <h1>Edit categoriy: {{ $category->title }}</h1>
    
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



