@extends('adminlte::page')

@section('title', 'Categories | Create')

@section('content_header')
<h1>Category Create</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.categories.store']) !!}
        @include('admin.categories.form')
        {!! Form::submit('Create category', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
