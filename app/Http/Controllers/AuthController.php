<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use Illuminate\Http\Request;

use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(ApiLoginRequest $request)
    {
        return $this->ok($request->get('email'));
    }

    public function register(ApiLoginRequest $request)
    {
        return $this->ok($request->get('email'));
    }
}