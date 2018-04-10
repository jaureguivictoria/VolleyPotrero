<?php

namespace VolleyPotrero\Http\Controllers;

use VolleyPotrero\Http\Requests\CreatePaymentRequest;
use VolleyPotrero\Http\Requests\UpdatePaymentRequest;
use VolleyPotrero\Repositories\PaymentRepository;
use VolleyPotrero\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use VolleyPotrero\Models\Member;
use VolleyPotrero\Models\Payment;
use Carbon\Carbon;

class PaymentController extends AppBaseController
{
    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Payment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $from = Carbon::now()->startOfMonth();
        $to = Carbon::now()->endOfMonth();
        
        $this->paymentRepository->pushCriteria(new RequestCriteria($request));
        
        $payments = $this->paymentRepository->getPayments($from, $to);
        $debtors = $this->paymentRepository->getDebtors($from, $to);

        return view('payments.index')
            ->with('payments', $payments)
            ->with('from', $from->format('d/m/Y'))
            ->with('to', $to->format('d/m/Y'))
            ->with('debtors', $debtors);
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Response
     */
    public function create()
    {
        return view('payments.create')
            ->with('members', Member::kvlist());
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param CreatePaymentRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        Flash::success('Pago guardado con éxito.');

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Pago no encontrado');

            return redirect(route('payments.index'));
        }

        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Pago no encontrado');

            return redirect(route('payments.index'));
        }

        return view('payments.edit')
            ->with('members', Member::kvlist())
            ->with('payment', $payment);
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Pago no encontrado');

            return redirect(route('payments.index'));
        }

        $payment = $this->paymentRepository->update($request->all(), $id);

        Flash::success('Pago actualizado con éxito.');

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified Payment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Pago no encontrado');

            return redirect(route('payments.index'));
        }

        $payment->status = Payment::STATUS_UNPAYED;
        $payment->payed_at = null;
        $payment->save();

        Flash::success('Pago eliminado con éxito.');

        return redirect(route('payments.index'));
    }
    
    /**
     * Create the specified Payment in storage.
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return Response
     */
    public function pay($id, Request $request)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Pago no encontrado');

            return redirect(route('payments.index'));
        }

        $payment->status = Payment::STATUS_PAYED;
        $payment->payed_at = Carbon::now();
        $payment->save();

        Flash::success('Pago registrado con éxito.');

        return redirect(route('payments.index'));
    }
}
