<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class BuyNowController extends Controller
{
    function placeOrder(Request $request)
    {
        $user_id = Auth::id();
        $product = json_decode($request->getContent());
        $stripeController = new StripeController();
        $invoice_item = $stripeController->createInvoiceItem($user_id, $product->id, $product->quantity);
        $invoice = $stripeController->createInvoice($user_id);

        return Response::json(['invoice' => $invoice], 200);
    }
}
