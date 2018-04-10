<?php

namespace VolleyPotrero\Http\Controllers;

use VolleyPotrero\Http\Requests\CreateMemberRequest;
use VolleyPotrero\Http\Requests\UpdateMemberRequest;
use VolleyPotrero\Repositories\MemberRepository;
use VolleyPotrero\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use VolleyPotrero\Models\Member;

class MemberController extends AppBaseController
{
    /** @var  MemberRepository */
    private $memberRepository;

    public function __construct(MemberRepository $memberRepo)
    {
        $this->memberRepository = $memberRepo;
    }

    /**
     * Display a listing of the Member.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->memberRepository->pushCriteria(new RequestCriteria($request));
        $members = $this->memberRepository->getMembers($request);

        return view('members.index')
            ->with('members', $members)
            ->with('search', $request->get('search',''));
    }

    /**
     * Show the form for creating a new Member.
     *
     * @return Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created Member in storage.
     *
     * @param CreateMemberRequest $request
     *
     * @return Response
     */
    public function store(CreateMemberRequest $request)
    {
        $input = $request->all();

        $member = $this->memberRepository->create($input);

        Flash::success('Miembro guardado con éxito.');

        return redirect(route('members.index'));
    }

    /**
     * Display the specified Member.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $member = Member::where('id',$id)->withTrashed()->first();

        if (empty($member)) {
            Flash::error('Miembro no encontrado');

            return redirect(route('members.index'));
        }

        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified Member.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $member = $this->memberRepository->findWithoutFail($id);

        if (empty($member)) {
            Flash::error('Miembro no encontrado');

            return redirect(route('members.index'));
        }

        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified Member in storage.
     *
     * @param  int              $id
     * @param UpdateMemberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemberRequest $request)
    {
        $member = $this->memberRepository->findWithoutFail($id);

        if (empty($member)) {
            Flash::error('Miembro no encontrado');

            return redirect(route('members.index'));
        }

        $member = $this->memberRepository->update($request->all(), $id);

        Flash::success('Miembro actualizado con éxito.');

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified Member from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $member = $this->memberRepository->findWithoutFail($id);

        if (empty($member)) {
            Flash::error('Miembro no encontrado');

            return redirect(route('members.index'));
        }

        $this->memberRepository->delete($id);

        Flash::success('Miembro eliminado con éxito.');

        return redirect(route('members.index'));
    }
    
    /**
     * Restore the specified Member from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function restore($id)
    {
        $member = Member::where('id',$id)->withTrashed()->first();

        if (empty($member)) {
            Flash::error('Miembro no encontrado');

            return redirect(route('members.index'));
        }

        $member->restore($id);

        Flash::success('Miembro restaurado con éxito.');

        return redirect(route('members.index'));
    }
}
