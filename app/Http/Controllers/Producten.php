<?php

namespace App\Http\Controllers;

use App\Models\LeverantModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Producten extends Controller
{
    private $leverantModel;

    public function __construct()
    {
        $this->leverantModel = new LeverantModel();
    }

    /**
     * Toon lijst van producten van een leverancier
     */
    public function index($leverancierId)
    {
        $leverancier = $this->leverantModel->sp_GetLeverancierInfoById($leverancierId);
        $producten = $this->leverantModel->sp_GetProductsByLeverancier($leverancierId);

        return view('leveranten.producten', [
            'title' => 'Geleverde Producten',
            'leverancier' => $leverancier,
            'producten' => $producten,
            'leverancierId' => $leverancierId
        ]);
    }

    /**
     * Formulier tonen voor het toevoegen van een levering
     */
    public function create($leverancierId, $productId)
    {
        $product = DB::selectOne('SELECT * FROM Product WHERE Id = ?', [$productId]);
        $leverancier = $this->leverantModel->sp_GetLeverancierInfoById($leverancierId);

        return view('leveranten.add-delivery', [
            'title' => 'Levering toevoegen',
            'productId' => $productId,
            'leverancierId' => $leverancierId,
            'productNaam' => $product?->Naam,
            'leverancier' => $leverancier
        ]);
    }

    /**
     * Nieuwe levering opslaan
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productId' => 'required|integer',
            'leverancierId' => 'required|integer',
            'aantal' => 'required|integer|min:1|max:32767',
            'datumEerstvolgendeLevering' => 'required|date'
        ]);

        $leverancier = $this->leverantModel->sp_GetLeverancierInfoById($validated['leverancierId']);
        $product = DB::selectOne('SELECT Naam FROM Product WHERE Id = ?', [$validated['productId']]);

        $result = $this->leverantModel->sp_AddProductLevering(
            $validated['productId'],
            $validated['aantal'],
            $validated['datumEerstvolgendeLevering']
        );

        if ($result->success == 1) {
            // Correcte redirect met succesmelding
            return redirect()->route('leveranten.producten', $validated['leverancierId'])
                             ->with('success', 'Levering succesvol toegevoegd');
        }

        $productNaam = $product?->Naam ?? 'Onbekend product';
        $leverancierNaam = $leverancier?->Naam ?? 'Onbekende leverancier';

        return back()->with('error', "Het product {$productNaam} van leverancier {$leverancierNaam} wordt niet meer geproduceerd")
                     ->withInput();
    }

    // Placeholder methods
    public function edit(ProductModel $productModel) { }
    public function update(Request $request, ProductModel $productModel) { }
    public function destroy(ProductModel $productModel) { }
}
