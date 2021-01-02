@extends('adminlte::page')

@section('title', 'Tag | List')

@section('content_header')
<a href="{{route('admin.tags.create')}}" class="float-right btn btn-sm btn-secondary">New Tag</a>
<h1>Tags List</h1>
@stop

@section('content')
@include('partials.session')
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-sm" style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->color}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('admin.tags.edit', $tag)}}"
                           class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST"
                              onsubmit="return confirm('¿Delete tag?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
