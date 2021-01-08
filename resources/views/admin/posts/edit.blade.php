@extends('adminlte::page')

@section('title', 'Post | Edit')

@section('content_header')
<h1>Post Update</h1>
@stop

@section('content')
@include('partials.session')
{!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'put']) !!}
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Post Info</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                           class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('extract', 'Extract') !!}
                            {!! Form::textarea('extract', null, ['class' => 'form-control', 'rows' => 3]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cover', 'Cover Url') !!}
                            {!! Form::text('cover', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'
                            =>
                            'Pick a category']) !!}
                            @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="published_at">Published</label>
                                <input type="datetime-local"
                                       class="form-control"
                                       name="published_at" id="published_at"
                                       value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
                                @error('published_at') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'Tags') !!}
                            {!! Form::select('tags', $tags, $tagsSelected, ['class' => 'select2bs4',
                            'multiple' => 'multiple', 'data-placeholder' => 'Choose tags',
                            'style' => 'width: 100%;']) !!}
                            @error('tags') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop
@section('plugins.Select2', true)
@section('js')
<script>
    $(document).ready(function() {
        $('#tags').select2({
            multiple: true,
            width: '100%',
            allowClear: true
        });
    });
</script>
@stop
