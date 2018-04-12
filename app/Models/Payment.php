<?php

namespace VolleyPotrero\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Payment
 * @package VolleyPotrero\Models
 * @version April 9, 2018, 7:34 pm UTC
 *
 * @property integer member_id
 * @property double amount
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';
    
    public const STATUS_UNPAYED = 'UNPAYED';
    public const STATUS_PAYED = 'PAYED';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'member_id',
        'amount',
        'notes',
        'status',
        'payed_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'member_id' => 'integer',
        'amount' => 'double',
        'payed_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'member_id' => 'required',
        'amount' => 'required|numeric'
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function member()
    {
        return $this->belongsTo(\VolleyPotrero\Models\Member::class,'member_id','id')->withTrashed();
    }
    
    public function getStatusLabel()
    {
        if($this->status == self::STATUS_PAYED){
            return "<h4><span class='badge badge-success'>Pagado</span></h4>";
        } elseif($this->status == self::STATUS_UNPAYED){
            return "<h4><span class='badge badge-danger'>Impago</span></h4>";
        }
    }
}
