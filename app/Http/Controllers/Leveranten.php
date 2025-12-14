<?php

namespace App\Http\Controllers;

use App\Models\LeverantenModel;
use Illuminate\Http\Request;

class Leveranten extends Controller
{
    private $leverantenModel;
    public function __construct()
    {
       $this->leverantenModel = new LeverantenModel();
    }
    public function index()
    {
        $leveranten = $this->leverantenModel->sp_GetLeverancierProductCount();

        return view('leveranten.index', [
            'title' => 'Overzicht Leveranten',
            'leveranten' => $leveranten
        ]);
        
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
    public function show(Leveranten $leveranten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leveranten $leveranten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leveranten $leveranten)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leveranten $leveranten)
    {
        //
    }
}
