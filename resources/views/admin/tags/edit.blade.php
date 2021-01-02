@extends('adminlte::page')

@section('title', 'Tag | Edit')

@section('content_header')
<h1>Tag Update</h1>
@stop

@section('content')
@include('partials.session')
<div class="card">
    <div class="card-body">
        {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}
        @include('admin.tags.form')
        {!! Form::submit('Update tag', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
