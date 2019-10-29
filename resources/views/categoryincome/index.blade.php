@extends('layouts.layout')

@section('title', 'Categoría de Ingresos')

@section('NavTitle', 'Categoría de Ingresos')

@section('contenido')
    <h2>Mes de septiembre
        <small class="text-muted">Detalles de Categoría de Ingresos</small>
    </h2>
    <button type="button" class="btn btn-outline-primary"><a class="nav-link" href="{{ route('categoryincome.create') }}">Nueva Categoría de Ingreso</a></button>
    <div class="container"><br>
    <table class="table">
        <thead class="thead-dark">
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
                <td class="text-center">
                <a href="{{ route('categoryincome.edit', $category) }}" class="btn btn-warning text-black-50 text-center">
                    <i class="fas fa-edit"></i>
                </a>  
                <a class="btn btn-danger text-black-50 text-center" href="{{ route('categoryincome.destroy', $category) }}"
                    onclick="event.preventDefault();
                    document.getElementById('delete-category').submit();">
                    <i class="fas fa-trash-alt"></i>
                </a>

                <form id="delete-category" action="{{ route('categoryincome.destroy', $category) }}" method="POST" style="display: none;">
                    @csrf @method('DELETE')
                </form>                  
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection