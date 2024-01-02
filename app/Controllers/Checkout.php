<?php

namespace App\Controllers;

use PayOS\PayOS;

class Checkout extends BaseController
{
    public function __construct()
    {
    }

    public function createPaymentLink()
    {
        $YOUR_DOMAIN = "http://localhost:8080";
        $data = [
            "orderCode" => intval(substr(strval(microtime(true) * 10000), -6)),
            "amount" => 2000,
            "description" => "Thanh toán đơn hàng",
            "returnUrl" => $YOUR_DOMAIN . "/success",
            "cancelUrl" => $YOUR_DOMAIN . "/cancel"
        ];
        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
        try {
            $response = $payOS->createPaymentLink($data);
            return redirect()->to($response['checkoutUrl']);
            // $response = $payOS->getPaymentLinkInfomation($data['orderCode']);
            // return view('info', ['data' => $response]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
