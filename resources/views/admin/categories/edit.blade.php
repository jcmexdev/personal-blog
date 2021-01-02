@extends('adminlte::page')

@section('title', 'Categories | Edit')

@section('content_header')
<h1>Category Update</h1>
@stop

@section('content')
@include('partials.session')
<div class="card">
    <div class="card-body">
        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
        @include('admin.categories.form')
        {!! Form::submit('Update category', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
