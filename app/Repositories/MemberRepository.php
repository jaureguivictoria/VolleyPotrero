<?php

namespace VolleyPotrero\Repositories;

use VolleyPotrero\Models\Member;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MemberRepository
 * @package VolleyPotrero\Repositories
 * @version April 9, 2018, 4:26 pm UTC
 *
 * @method Member findWithoutFail($id, $columns = ['*'])
 * @method Member find($id, $columns = ['*'])
 * @method Member first($columns = ['*'])
*/
class MemberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'surname',
        'birthday',
        'dni',
        'phone',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Member::class;
    }
}
