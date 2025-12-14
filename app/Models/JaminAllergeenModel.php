<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JaminAllergeenModel extends Model
{
    public function getAllergeenData($id)
    {
        // Product info
        $product = DB::select('CALL sp_GetAllergeenProInfo(?)', [$id]);
        
        // Allergenen info
        $allergenen = DB::select('CALL sp_GetAllergeenInfo(?)', [$id]);

        return [
            'product' => $product[0] ?? null,
            'allergenen' => $allergenen
        ];
    }
}

