<?php

namespace VolleyPotrero\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Member
 * @package VolleyPotrero\Models
 * @version April 9, 2018, 4:26 pm UTC
 *
 * @property string name
 * @property string surname
 * @property date birthday
 * @property integer dni
 * @property integer phone
 * @property string email
 */
class Member extends BaseModel
{
    use SoftDeletes;

    public $table = 'members';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'surname',
        'birthday',
        'dni',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'surname' => 'string',
        'birthday' => 'date',
        'dni' => 'integer',
        'phone' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'surname' => 'required',
        'birthday' => 'required|date',
        'dni' => 'nullable|numeric',
        'phone' => 'nullable|numeric',
        'email' => 'nullable|email'
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function payments()
    {
        return $this->hasMany(\VolleyPotrero\Models\Payment::class, 'member_id', 'id');
    }
    
    public function getFullName()
    {
        return "$this->name $this->surname";
    }
    
    public static function kvlist()
    {
        $members = \DB::table('members')
                    ->selectRaw("CONCAT_WS(' ',name,surname) as name, id")
                    ->get();
                    
        return $members->mapWithKeys(function ($item) {
                return [$item->id => $item->name];
            });
    }
    
    public function getAge()
    {
        return Carbon::parse($this->birthday)->age;
    }
    
    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)
            ->setTimezone('America/Argentina/Cordoba')
            ->format('d/m/Y H:i') : '';
    }
}
