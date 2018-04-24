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
        return Payment::whereNull('payed_at')
            ->whereBetween('created_at', [$from,$to])
            ->get();
    }
    
    public function getPayments($from, $to)
    {
        return Payment::whereNotNull('payed_at')
            ->whereBetween('created_at', [$from,$to])
            ->orderBy('payed_at','desc')
            ->get();
            
    }
    
    public function getDebtorsInTotal()
    {
        return \DB::table('payments')
                ->select(\DB::raw('sum(payments.amount) as total, count(payments.id) as quotas,  members.name as gname, SUBSTR(members.surname,1,1) as surname, members.id as id'))
                ->whereNull('payed_at')
                ->join('members','members.id','=','payments.member_id')
                ->groupBy('payments.member_id')
                ->get();
    }
}
