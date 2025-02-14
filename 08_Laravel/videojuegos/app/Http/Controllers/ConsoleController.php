<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consola;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$consolas = [
            "PS4",
            "PS5",
            "Nintendo Switch 2"
        ]; */

        $consola=Consola::all();

        return view('consolas/index', ['consolas' => $consola]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("consolas/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $consola = new Consola;
        $consola -> nombre = $request -> input("nombre");

        $consola -> ano_lanzamiento = $request -> input("ano_lanzamiento");
        $consola -> save();
        return redirect('/consolas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consola = Consola::find($id);

        return view('consolas/show', ["consola" => $consola]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
