@extends('adminlte::page')

@section('title', 'Post | Edit')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.css') }}">
<style>
    .dropzone {
        border-radius: 8px;
        border: 3px dashed #007bff;
        color: #007bff;
        padding: 0;
        height: 160px;
    }

    .post-image {
        height: 160px;
    }

    .post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection

@section('content_header')
<h1>Post Update</h1>
@stop

@section('content')
@include('partials.session')
{!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'put']) !!}
{{-- POST GENERALS --}}
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
                            {!! Form::text('title', null, ['class' => 'form-control', 'required' => true, 'maxlength' =>
                            60]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('extract', 'Extract') !!}
                            {!! Form::textarea('extract', null, ['class' => 'form-control', 'rows' => 3,
                            'maxlength' => 165]) !!}
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
                            'name'=>'tags[]',
                            'style' => 'width: 100%;']) !!}
                            @error('tags') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- POST IMAGES --}}
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Post Images</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                           class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row" id="images">
                    <div class="mt-3 col-12 col-md-3">
                        <div id="dropzone" class="dropzone"></div>
                    </div>
                    @forelse ($post->images as $image)
                    <div class="mt-3 col-12 col-md-3 post-image" id="deletable-{{$image->id}}">
                        <img src="{{ $image->url }}"
                             class="rounded img-fluid image-item"
                             alt="Image for post">
                        <button type="button" role="button" data-id="{{ $image->id }}"
                                class="deletable btn btn-danger btn-sm position-absolute"
                                style="right: 24px; top: 8px;">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    @empty
                    <div id="no-images" class="col-12 col-md-9 d-flex justify-content-center align-items-center">
                        Aun no hay imágenes cargadas para este post
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

{{-- POST BODY --}}
<div class="mt-3 row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary mt-4']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop


@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@section('js')
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/dropzone/dropzone.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.10.0/bootstrap-maxlength.min.js"
        integrity="sha512-04L+TAgzlDAaUpaEGriEBg/qEryUjw4GNL/FkxA3h621EFPycccO2Y8vNhvid9UhgGC/9+MHLAFwGythpvOAAQ=="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // TAGS
        $('#tags').select2({
            multiple: true,
            width: '100%',
            allowClear: true
        });

        // EDITOR
        CKEDITOR.replace( 'body' );

        // MAX LENGTH
        $('[maxlength]').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger",
            preText: 'write ',
            separator: ' of ',
            postText: ' chars.'
        });
    });

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    // COPY TO CLIPBOARD
    $(window).on('click', (e) => {
            if(!e.target.classList.contains('image-item')) return;
            const copyText = e.target.src;
            let textarea = document.createElement("textarea");
            textarea.textContent = copyText;
            textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            Toast.fire({
                type: 'success',
                title: 'Url copied to clipboard'
            });
    });

    // DELETE IMAGE
    $(window).on('click', function(e){
        if(!e.target.classList.contains('deletable')) return;

        if(!window.confirm('¿Delete Image?')) return;

        const id = e.target.dataset.id;

        let route = `{{ route('admin.images.destroy') }}`;
        $.ajax(route, {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method:'DELETE',
            data: {
                id: id
            },
            success: function(res) {
                if(res.was_deleted) {
                    $(`#deletable-${id}`).remove();
                    Toast.fire({
                        type: 'success',
                        title: 'Image was deleted'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Something unexpected has happened :('
                    });
                }
            }
        });
    });

     // DROPZONE
     Dropzone.autoDiscover = false;
    let myDropZone = new Dropzone("#dropzone", {
        createImageThumbnails: false,
        url:"{{ route('admin.images.store', $post) }}",
        dictDefaultMessage:"pick to select an image",
        maxFilesize: 2,
        paramName:'image',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        thumbnailMethod: 'contain'
    });

    myDropZone.on('error', function(file, res){
        $('.dz-error-message:last > span').text(res.errors.image[0]);
    })

    myDropZone.on("complete", function(file) {
        myDropZone.removeFile(file);
    });

    myDropZone.on('success', function(res){
        let {id, url} = JSON.parse(res.xhr.response);
        $('#no-images').remove();
        $('.dz-filename:last > span').text(url);
        $('#images').append(`
            <div class="mt-3 col-12 col-md-3 post-image" id="deletable-${id}">
                <img src="${url}"
                        class="rounded img-fluid image-item"
                        alt="Image for post">
                <button type="button" role="button" data-id="${id}"
                        class="deletable btn btn-danger btn-sm position-absolute"
                        style="right: 24px; top: 8px;">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        `);
    })
</script>
@stop
