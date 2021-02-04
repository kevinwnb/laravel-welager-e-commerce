<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AddressController extends Controller
{
    public function getDefaultAddress()
    {
        $default_address = Address::where('user_id', Auth::id())->get()[0];
        $default_address->province = Province::where('id', $default_address->province_id)->value('name');
        return Response::json($default_address, 200);
    }

    public function getAddresses()
    {
        $addresses = Address::select('addresses.*', 'provinces.name as province', 'provinces.alpha')->where('user_id', Auth::id())
            ->join('provinces', 'provinces.id', '=', 'addresses.province_id')->get();
        // foreach ($addresses as $address) {
        //     $address->province = Province::where('id', $address->province_id)->value('name');
        // }
        return Response::json($addresses, 200);
    }
}
