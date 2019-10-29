@extends('layouts.layout')

@section('title', 'Gastos')

@section('NavTitle', 'Control de Gastos')

@section('contenido')
    <h2>Mes de septiembre
        <small class="text-muted">Detalles de Gastos</small>
    </h2>
    <button type="button" class="btn btn-outline-primary"><a class="nav-link" href="{{ route('expense.create') }}">Nuevo Gasto</a></button>
    <div class="container"><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Monto</th>
                <th scope="col">Categoria</th>
                <th scope="col">Fecha</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                @foreach ($categories as $category)                                    
                    <tr>
                    <th scope="row">{{$expense->id}}</th>
                        <td>{{$expense->description}}</td>
                        <td>{{$expense->amount}}</td>
                        @if($expense->category_id == $category->id)
                            <td>{{$category->name}}</td>
                        @endif
                        <td>{{$expense->date}}</td>
                        <td class="text-center">
                        <a href="{{ route('expense.edit', $expense) }}" class="btn btn-warning text-black-50 text-center">
                            <i class="fas fa-edit"></i>                        
                        </a>
                        <a class="btn btn-danger text-black-50 text-center" href="{{ route('expense.destroy', $expense) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-expense').submit();">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                        <form id="delete-expense" action="{{ route('expense.destroy', $expense) }}" method="POST" style="display: none;">
                                        @csrf @method('DELETE')
                        </form>                    
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    </div>
@endsection