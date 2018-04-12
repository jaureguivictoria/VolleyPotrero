<?php

namespace VolleyPotrero\Http\Controllers;

use Illuminate\Http\Request;
use VolleyPotrero\Repositories\PaymentRepository;

class HomeController extends Controller
{
    /** @var  PaymentRepository */
    private $paymentRepository;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->middleware('auth')->except(['welcome']);
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * Show the landing page
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $debtors = $this->paymentRepository->getDebtorsInTotal();
        return view('welcome')->with('debtors', $debtors);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debtors = $this->paymentRepository->getDebtorsInTotal();
        return view('home')->with('debtors', $debtors);
    }
}
