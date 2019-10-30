<?php

namespace App\Http\Controllers;

use App\CategoryExpense;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categoryexpense.index', [
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
        return view('categoryexpense.create', [
            'category' => new CategoryExpense
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
            'name' => 'required',
            'date' => 'required|date'
        ]);

        CategoryExpense::create($fields);
        $alert = Alert::success('Registro Exitoso', 'Se ha guardo los datos correctamente');

        return redirect()->route('categoryexpense.index', compact('alert'));
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
    public function edit(CategoryExpense $categoryexpense)
    {
        return view('categoryexpense.edit',[
            'category' => $categoryexpense
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryExpense $categoryexpense)
    {
        $fields = request()->validate([
            'name' => 'required',
            'date' => 'required|date'
        ]);

        $categoryexpense->update($fields);
        $alert = Alert::success('Editado con Exito', 'Se ha editado los datos correctamente');

        return redirect()->route('categoryexpense.index', compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryExpense $categoryexpense)
    {
        $categoryexpense->delete();

        $alert = Alert::success('Eliminado con Exito', 'Se ha eliminado los datos correctamente');

        return redirect()->route('categoryexpense.index', compact('alert'));
    }
}
