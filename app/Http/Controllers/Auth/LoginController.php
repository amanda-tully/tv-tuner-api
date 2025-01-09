<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @group Authentication
 *
 * Endpoints in this group are used for authentication.
 */
class LoginController extends Controller
{
    /**
     * Log the user in.
     *
     * @unauthenticated
     *
     * @responseFile 422 responses/validation.json
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = $request->user();
            $token = $user->createToken('main')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'The provided credentials do not match our records.'
        ], 401);
    }

}
