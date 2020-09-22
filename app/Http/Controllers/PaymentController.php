<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;

class PaymentController extends Controller
{

    public function store(PaymentGateway $paymentGateway)
    {
        dd($paymentGateway->charge(2500));
    }
}
