<?php

namespace App\Http\Controllers;

use App\Income;
use App\CategoryIncome;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('income.index', [
            'incomes' => Income::get(),
            'categories' => CategoryIncome::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('income.create', [
            'categories' => CategoryIncome::get()
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

        Income::create($fields);

        $alert = Alert::success('Registro Exitoso', 'Se ha guardo los datos correctamente');

        return redirect()->route('income.index', compact('alert'));
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
    public function edit(Income $income)
    {
        return view('income.edit',[
            'income' => $income,
            'categories' => CategoryIncome::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Income $income)
    {
        $fields = request()->validate([
            'description' => 'required',
            'amount' => 'required',
            'category_id' => 'required',
            'date' => 'required|date'
        ]);

        $income->update($fields);
        $alert = Alert::success('Editado con Exito', 'Se ha editado los datos correctamente');

        return redirect()->route('income.index', compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();

        $alert = Alert::success('Eliminado con Exito', 'Se ha eliminado los datos correctamente');

        return redirect()->route('income.index', compact('alert'));        
    }
}
