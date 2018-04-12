<?php 

namespace VolleyPotrero\Models;

use Eloquent as Model;
use Carbon\Carbon;

/**
 * 
 */
class BaseModel extends Model
{
    
    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)
            ->setTimezone('America/Argentina/Cordoba')
            ->format('d/m/Y H:i') : '';
    }
}


 ?>