<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view("login");
    }

    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->emailphone, 'password' => $request->password], true) && !Auth::attempt(['phone' => $request->emailphone, 'password' => $request->password], true)) {
            return Response::json([
                'message' => 'login failed',
            ], 401);
        }

        // Authentication passed...


        //$user = User::where('email', $request->emailphone)->where('phone', $request->emailphone);
        //$token = $user->createToken('authentication-token');

        if (Session::has('cart_items')) {
            $cart_controller = new CartController();
            if (!$cart_controller->addSessionCartToAccount())
                return Response::json(['message' => 'Binding session cart to account failed'], 404);
        }

        return Response::json([
            'is_authenticated' => true
        ], 200);
    }

    public function check()
    {
        if (Auth::check()) {
            $user = User::select('first_name')->where('id', Auth::id())->get();
            return Response::json([
                'user' => $user,
                'is_authenticated' => true
            ], 200);
        }

        return Response::json([
            'is_authenticated' => false
        ], 401);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
