@extends('layouts.layout')

@section('title', 'Categoría de Gastos')

@section('NavTitle', 'Categoría de Gastos')

@section('contenido')
    <h2>Mes de septiembre
        <small class="text-muted">Detalles de Categoría de Gastos</small>
    </h2>
    <button type="button" class="btn btn-outline-primary"><a class="nav-link" href="{{ route('categoryexpense.create') }}">Nueva Categoría de Gasto</a></button>
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
                <a href="{{ route('categoryexpense.edit', $category) }}" class="btn btn-warning text-black-50 text-center">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger text-black-50 text-center" href="{{ route('categoryexpense.destroy', $category) }}"
                    onclick="event.preventDefault();
                    document.getElementById('delete-category').submit();">
                    <i class="fas fa-trash-alt"></i>
                </a>

                <form id="delete-category" action="{{ route('categoryexpense.destroy', $category) }}" method="POST" style="display: none;">
                    @csrf @method('DELETE')
                </form>                     
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection