<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeverantController extends Controller
{
    public function index($id)
    {
        // Leverancierinformatie ophalen
        $leverantResult = DB::select('CALL sp_GetLeverancierInfoById(?)', [$id]);

        // Omdat DB::select altijd een array teruggeeft, pakken we het eerste element
        $leverant = !empty($leverantResult) ? $leverantResult[0] : null;

        // Producten van de leverancier ophalen
        $producten = DB::select('CALL sp_GetProductsByLeverancier(?)', [$id]);

        // Blade-view aanpassen naar juiste pad: resources/views/Product/leverantieInfo.blade.php
        return view('Product.leverantieInfo', [
            'title' => 'Leveringsinformatie',
            'leverant' => $leverant,
            'producten' => $producten,
        ]);
    }
}
