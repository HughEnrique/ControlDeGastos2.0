@extends('layouts.layout')

@section('title', 'Categoría de Ingresos')

@section('NavTitle', 'Categoría de Ingresos')

@section('contenido')
    <h2>Mes de septiembre
        <small class="text-muted">Detalles de Categoría de Ingresos</small>
    </h2>
    <button type="button" class="btn btn-outline-primary"><a class="nav-link" href="{{ route('categoryincome.create') }}">Nueva Categoría de Ingreso</a></button>
    <div class="container"><br>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col"></th>            
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
            <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->date}}</td>
                <td>
                <a href="{{ route('categoryincome.edit', $category) }}" class="btn btn-warning">Editar</a>                    
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection