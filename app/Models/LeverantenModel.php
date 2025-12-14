<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeverantenModel extends Model
{
    public function sp_GetLeverancierProductCount()
    {
        return DB::select('CALL sp_GetLeverancierProductCount()');
    }
}
