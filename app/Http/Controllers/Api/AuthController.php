<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return  $this->error('Invalid credentials', 403);
        }

        $user = User::firstWhere('email', $request->get('email'));

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken(
                    'Api token for ' . $user->email,
                    ['*'],
                    now()->addMonth()
                )->plainTextToken
            ]
        );
    }

    public function register(LoginUserRequest $request)
    {
        return $this->ok($request->get('email'));
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->ok('', []);
    }
}
