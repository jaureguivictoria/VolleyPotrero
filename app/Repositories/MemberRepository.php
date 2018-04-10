<?php

namespace VolleyPotrero\Repositories;

use VolleyPotrero\Models\Member;
use InfyOm\Generator\Common\BaseRepository;
use Carbon\Carbon;

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
    
    public function getMembers($request)
    {
        $juniors = $request->get('juniors',false) != false;
        $seniors = $request->get('seniors',false) != false;
        $sub18 = Carbon::now()->subYears(18);
        $search = $request->get('search', false);
        
        if($request->get('withTrashed', false)){
            $members = Member::onlyTrashed();
        } else {            
            $members = \DB::table('members')
                        ->where(function($query) use ($juniors, $seniors, $sub18){
                            if($juniors || $seniors){
                                if($juniors){
                                    $query->where('birthday','>=', $sub18->format('Y-m-d'));
                                } else {
                                    $query->where('birthday','<', $sub18);
                                }
                            }
                        })
                        ->where(function($query) use ($search){
                            if($search){
                                $query->where('name','like', "%$search%")
                                    ->orWhere('surname','like', "%$search%");
                            }
                        });
        }
        
        return $members->paginate(10);

    }
}
