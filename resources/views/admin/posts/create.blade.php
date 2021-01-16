@extends('adminlte::page')

@section('title', 'Tag | Create')

@section('content_header')
<h1>Tag Create</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.posts.store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Post title') !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'required' => true]) !!}
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {!! Form::submit('Create post', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
