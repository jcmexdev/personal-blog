@extends('adminlte::page')

@section('title', 'Tag | Create')

@section('content_header')
<h1>Tag Create</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tags.store']) !!}
        @include('admin.tags.form')
        {!! Form::submit('Create tag', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
