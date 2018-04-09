<?php

namespace VolleyPotrero\Repositories;

use VolleyPotrero\Models\Payment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaymentRepository
 * @package VolleyPotrero\Repositories
 * @version April 9, 2018, 7:34 pm UTC
 *
 * @method Payment findWithoutFail($id, $columns = ['*'])
 * @method Payment find($id, $columns = ['*'])
 * @method Payment first($columns = ['*'])
*/
class PaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'member_id',
        'amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Payment::class;
    }
    
    public function getDebtors($from, $to)
    {
        return Payment::where('status',Payment::STATUS_UNPAYED)
            ->whereBetween('created_at', [$from,$to])
            ->get();
    }
    
    public function getPayments($from, $to)
    {
        return Payment::where('status',Payment::STATUS_PAYED)
            ->whereBetween('created_at', [$from,$to])
            ->paginate(10);
    }
}
