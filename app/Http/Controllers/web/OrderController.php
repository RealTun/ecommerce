<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PayOS\PayOS;

class OrderController extends Controller
{
    //
    public function createPaymentLink(Request $request)
    {
        $product_cart = DB::table('cart_item')
            ->join('product', 'product.id', '=', 'cart_item.product_id')
            ->join('shopping_session', 'shopping_session.id', '=', 'cart_item.session_id')
            ->where('user_id', Auth::user()->id)
            ->get();
        if (!count($product_cart)) {
            return redirect()->back()->with('error', "Giỏ hàng của bạn đang trống!");
        }

        $YOUR_DOMAIN = "http://localhost:8000";
        $data = [
            "orderCode" => intval(substr(strval(microtime(true) * 10000), -6)),
            "amount" => 2000,
            "description" => "Thanh toán đơn hàng",
            "returnUrl" => "$YOUR_DOMAIN/checkout",
            "cancelUrl" => "$YOUR_DOMAIN/checkout"
        ];
        error_log($data['orderCode']);
        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
        try {
            $response = $payOS->createPaymentLink($data);
            return redirect($response['checkoutUrl']);
            // $response = $payOS->getPaymentLinkInformation($data['orderCode']);
            // return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function createOrder(Request $request)
    {
        $body = $request->input();
        $body["amount"] = intval($body["amount"]);
        $body["orderCode"] = intval(substr(strval(microtime(true) * 100000), -6));
        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
        try {
            $response = $payOS->createPaymentLink($body);
            return response()->json([
                "error" => 0,
                "message" => "Success",
                "data" => $response["checkoutUrl"]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getCode(),
                "message" => $th->getMessage(),
                "data" => null
            ]);
        }
    }

    public function getPaymentLinkInfoOfOrder(string $id)
    {
        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
        try {
            // $response = $payOS->getPaymentLinkInfomation($id);
            // return response()->json([
            //     "error" => 0,
            //     "message" => "Success",
            //     "data" => $response["data"]
            // ]);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getCode(),
                "message" => $th->getMessage(),
                "data" => null
            ]);
        }
    }

    public function cancelPaymentLinkOfOrder(Request $request, string $id)
    {
        $body = json_decode($request->getContent(), true);
        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
        try {
            $cancelBody = is_array($body) && $body["cancellationReason"] ? $body : null;
            $response = $payOS->cancelPaymentLink($id, $cancelBody);
            return response()->json([
                "error" => 0,
                "message" => "Success",
                "data" => $response["data"]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getCode(),
                "message" => $th->getMessage(),
                "data" => null
            ]);
        }
    }

    public function handlePayOSWebhook(Request $request)
    {
        $body = json_decode($request->getContent(), true);
        // Handle webhook test
        if (in_array($body["data"]["description"], ["Ma giao dich thu nghiem", "VQRIO123"])) {
            return response()->json([
                "error" => 0,
                "message" => "Ok",
                "data" => $body["data"]
            ]);
        }

        // Check webhook data integrity 
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');
        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');

        $webhookData = $body["data"];
        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
        $payOS->verifyPaymentWebhookData($webhookData);

        /**
         * Source code uses data of webhook
         * ....
         * ....
         */
        return response()->json([
            "error" => 0,
            "message" => "Ok",
            "data" => $webhookData
        ]);
    }
}
