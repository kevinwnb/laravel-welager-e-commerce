<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $stripe = new \Stripe\StripeClient(
            'sk_test_51HvacCKlmt80RKMYl78h0F8k7giZ8m2ficwRmRpc1iazBGOUyvi0dlqNeev5VU7FvpGS5lxALpdaAn5BZtEstNP000c3paEBtQ'
        );
        $response = $stripe->customers->create([
            'description' => 'My First Test Customer (created for API docs)',
        ]);

        $user = new User();
        $user->stripe_customer_id = $response->id;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return Response::json([
            'message' => 'registration successful',
            'customer' => $response
        ], 201);
    }
}
