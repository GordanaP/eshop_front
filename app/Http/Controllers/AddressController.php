<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    public function create()
    {
        return view('addresses.create');
    }

    public function store(AddressRequest $request)
    {
        return $request->billing;
    }
}
