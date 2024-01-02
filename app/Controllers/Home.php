<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('checkout.html');
    }

    public function success(): string
    {
        return view('success.html');
    }

    public function cancel(): string
    {
        return view('cancel.html');
    }
}
