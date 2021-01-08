@extends('adminlte::page')

@section('title', 'Posts | List')

@section('content_header')
<a href="{{route('admin.posts.create')}}" class="float-right btn btn-sm btn-secondary">New Post</a>
<h1>Posts List</h1>
@stop

@section('content')
@include('partials.session')
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-sm" style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>Published</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ optional($post->published_at)->format('d-m-Y') }}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('admin.posts.edit', $post)}}"
                           class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                              onsubmit="return confirm('¿Delete post?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Disable</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop


@section('plugins.Datatables', true)
@section('js')
<script>
    $().ready(()=>{
        $('table').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 3 }
            ]
        });
    });
</script>
@stop
