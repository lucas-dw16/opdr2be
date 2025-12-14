<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeverantModel extends Model
{
    protected $table = 'leverancier'; // optie voor Eloquent, maar we gebruiken SP's

    /**
     * Haal alle producten op van een specifieke leverancier
     *
     * @param int $leverancierId
     * @return array
     */
    public function sp_GetProductsByLeverancier(int $leverancierId): array
    {
        return DB::select('CALL sp_GetProductsByLeverancier(?)', [$leverancierId]);
    }

    /**
     * Haal informatie van een specifieke leverancier
     *
     * @param int $leverancierId
     * @return object|null
     */
    public function sp_GetLeverancierInfoById(int $leverancierId): ?object
    {
        return DB::selectOne('CALL sp_GetLeverancierInfoById(?)', [$leverancierId]);
    }

    /**
     * Voeg een nieuwe levering toe voor een product
     *
     * @param int $productId
     * @param int $aantal
     * @param string $datumLevering (Y-m-d)
     * @return object|null
     */
    public function sp_AddProductLevering(int $productId, int $aantal, string $datumLevering): ?object
    {
        return DB::selectOne('CALL sp_AddProductLevering(?, ?, ?)', [$productId, $aantal, $datumLevering]);
    }

    /**
     * Haal leveringen van een specifiek product op
     *
     * @param int $productId
     * @return array
     */
    public function sp_GetProductLeveringen(int $productId): array
    {
        return DB::select('CALL sp_GetProductLeveringen(?)', [$productId]);
    }
}
