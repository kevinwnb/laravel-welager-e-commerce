<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Stripe\StripeClient;

class StripeController extends Controller
{
    private $sk = "sk_test_51HvacCKlmt80RKMYl78h0F8k7giZ8m2ficwRmRpc1iazBGOUyvi0dlqNeev5VU7FvpGS5lxALpdaAn5BZtEstNP000c3paEBtQ";

    function getDefaultPaymentMethod()
    {
        $stripe_cus_id = User::where('id', Auth::id())->value('stripe_customer_id');
        $stripe = new StripeClient(
            'sk_test_51HvacCKlmt80RKMYl78h0F8k7giZ8m2ficwRmRpc1iazBGOUyvi0dlqNeev5VU7FvpGS5lxALpdaAn5BZtEstNP000c3paEBtQ'
        );
        $customer = $stripe->customers->retrieve(
            $stripe_cus_id,
            []
        );
        $default_pm = $stripe->paymentMethods->retrieve(
            $customer->invoice_settings->default_payment_method,
            []
        );

        return Response::json($default_pm, 200);
    }

    function getPaymentMethods()
    {
        $stripe_cus_id = User::where('id', Auth::id())->value('stripe_customer_id');
        $stripe = new StripeClient(
            'sk_test_51HvacCKlmt80RKMYl78h0F8k7giZ8m2ficwRmRpc1iazBGOUyvi0dlqNeev5VU7FvpGS5lxALpdaAn5BZtEstNP000c3paEBtQ'
        );
        $payment_methods = $stripe->paymentMethods->all([
            'customer' => $stripe_cus_id,
            'type' => 'card',
        ]);

        return Response::json($payment_methods, 200);
    }

    function createInvoice($user_id)
    {
        $stripe_cus_id = User::where('id', Auth::id())->value('stripe_customer_id');

        $stripe = new \Stripe\StripeClient(
            'sk_test_51HvacCKlmt80RKMYl78h0F8k7giZ8m2ficwRmRpc1iazBGOUyvi0dlqNeev5VU7FvpGS5lxALpdaAn5BZtEstNP000c3paEBtQ'
        );
        $invoice = $stripe->invoices->create([
            'customer' => $stripe_cus_id,
            'collection_method' => 'send_invoice',
            'days_until_due' => 30
        ]);

        $invoice = $this->finalizeInvoice($invoice->id);

        $invoice = $stripe->invoices->sendInvoice(
            $invoice->id,
            []
        );

        return $invoice;
    }

    function makePayment($payment_method_id, $amount)
    {
        $stripe = new \Stripe\StripeClient(
            $this->sk
        );
        $stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => 'cad',
            'payment_method_types' => ['card'],
            'payment_method' => $payment_method_id,
        ]);
    }

    function createInvoiceItem($user_id, $product_id, $quantity)
    {
        $stripe_cus_id = User::where('id', $user_id)->value('stripe_customer_id');
        $stripe_price_id = Product::where('id', $product_id)->value('stripe_price_id');

        $stripe = new \Stripe\StripeClient(
            'sk_test_51HvacCKlmt80RKMYl78h0F8k7giZ8m2ficwRmRpc1iazBGOUyvi0dlqNeev5VU7FvpGS5lxALpdaAn5BZtEstNP000c3paEBtQ'
        );

        $invoice_item = $stripe->invoiceItems->create([
            'customer' => $stripe_cus_id,
            'price' => $stripe_price_id,
            'quantity' => $quantity,
        ]);

        return $invoice_item;
    }

    function finalizeInvoice($stripe_invoice_id)
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51HvacCKlmt80RKMYl78h0F8k7giZ8m2ficwRmRpc1iazBGOUyvi0dlqNeev5VU7FvpGS5lxALpdaAn5BZtEstNP000c3paEBtQ'
        );
        $invoice = $stripe->invoices->finalizeInvoice(
            $stripe_invoice_id,
            []
        );

        return $invoice;
    }

    function createPaymentMethod(Request $request)
    {
        $card = json_decode($request->getContent());

        $stripe = new \Stripe\StripeClient(
            $this->sk
        );
        $pm = $stripe->paymentMethods->create([
            'type' => $card->type,
            'card' => [
                'number' => $card->number,
                'exp_month' => $card->exp_month,
                'exp_year' => $card->exp_year,
                'cvc' => $card->cvc,
            ],
        ]);

        $stripe_cus_id = User::where('id', Auth::id())->value('stripe_customer_id');

        $stripe = new \Stripe\StripeClient(
            $this->sk
        );
        $stripe->paymentMethods->attach(
            $pm->id,
            ['customer' => $stripe_cus_id]
        );
    }
}
