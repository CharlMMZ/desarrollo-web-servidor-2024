<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$videojuegos = [
            [
                "The Last of Us Part II",
                "18",
                "Acción, Aventura"
            ],
            [
                "Spider-Man: Miles Morales",
                "12",
                "Acción, Aventura"
            ],
            [
                "Demon's Souls",
                "16",
                "Acción, RPG"
            ],
            [
                "Ratchet & Clank: Rift Apart",
                "7",
                "Aventura, Plataformas"
            ],
            [
                "The Legend of Zelda: Breath of the Wild 2",
                "12",
                "Aventura, Mundo abierto"
            ],
            [
                "Super Mario Odyssey",
                "7",
                "Aventura, Plataformas"
            ]
        ]; */

        $videojuegos = Videojuego::all();
        

        return view('videojuegos/index', ['videojuegos' => $videojuegos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
