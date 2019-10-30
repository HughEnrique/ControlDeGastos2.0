<?php

namespace App\Http\Controllers;

use App\Expense;
use App\CategoryExpense;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expense.index', [
            'expenses' => Expense::get(),
            'categories' => CategoryExpense::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create', [
            'categories' => CategoryExpense::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $fields = request()->validate([
            'description' => 'required',
            'amount' => 'required',
            'category_id' => 'required',
            'date' => 'required|date'
        ]);

        Expense::create($fields);
        $alert = Alert::success('Registro Exitoso', 'Se ha guardo los datos correctamente');

        return redirect()->route('expense.index', compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('expense.edit',[
            'expense' => $expense,
            'categories' => CategoryExpense::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Expense $expense)
    {
        $fields = request()->validate([
            'description' => 'required',
            'amount' => 'required',
            'category_id' => 'required',
            'date' => 'required|date'
        ]);

        $expense->update($fields);
        $alert = Alert::success('Editado con Exito', 'Se ha editado los datos correctamente');

        return redirect()->route('expense.index', compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        $alert = Alert::success('Eliminado con Exito', 'Se ha eliminado los datos correctamente');

        return redirect()->route('expense.index', compact('alert'));
    }
}
