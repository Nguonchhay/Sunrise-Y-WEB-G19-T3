<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAPIController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
        $queryUser = User::where('email', $data['email'])->first();
        if (!empty($queryUser)) {
            if (Hash::check($data['password'], $queryUser->password)) {
                $token = $queryUser->createToken($queryUser->email);
                return response()->json([
                    'message' => 'Logged in success',
                    'data' => [
                        'token' => $token->plainTextToken
                    ]
                ]);
            }
        }

        return response()->json([
            'message' => 'Invalid credentials',
            'data' => $data
        ]);
    }
}
