@extends('adminlte::page')

@section('title', 'Categories | List')

@section('content_header')
<h1>Category List</h1>
@stop

@section('content')
@include('partials.session')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.categories.create')}}" class="btn btn-success">Add Category</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-sm" style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('admin.categories.edit', $category)}}"
                           class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                              onsubmit="return confirm('¿Delete category?')">
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
