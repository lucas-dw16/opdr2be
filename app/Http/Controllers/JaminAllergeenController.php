<?php

namespace App\Http\Controllers;

use App\Models\JaminAllergeenModel;
use Illuminate\Http\Request;

class JaminAllergeenController extends Controller
{
    private $AllergeenModel;

    public function __construct()
    {
        $this->AllergeenModel = new JaminAllergeenModel();
    }
    public function index($id)
    {
        $data = $this->AllergeenModel->getAllergeenData($id);

        return view('product.allergenenInfo', [
            'title' => 'Overzicht Allergenen',
            'product' => $data['product'],
            'allergenen' => $data['allergenen']
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
    public function show(JaminAllergeenModel $jaminAllergeenModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JaminAllergeenModel $jaminAllergeenModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JaminAllergeenModel $jaminAllergeenModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JaminAllergeenModel $jaminAllergeenModel)
    {
        //
    }
}
