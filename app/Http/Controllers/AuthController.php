<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(StoreRegisterRequest $request)
    {
        try {
            return ($user = User::create($request->all()))
                ? response([
                    'message' => 'Pendaftaran berhasil, anda akan dialihan kehalaman login.',
                    'result' => $user
                ], 201)
                : throw new Exception('Terjadi kesalahan server');
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }

    public function login(StoreLoginRequest $request)
    {
        try {
            return Auth::attempt($request->all()) ?
                response([
                    'message' => 'Berhasil masuk, anda akan dialihkan dalam 2 detik.',
                    'result' => [
                        'token' => $request->user()->createToken($request->user()->email)->plainTextToken
                    ]
                ]) : throw new Exception('Alamat Email & Kata Sandi tidak cocok');
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage(),
                'result' => null
            ], 422);
        }
    }

    public function info(Request $request)
    {
        return response([
            'message' => null,
            'result' => $request->user()
        ]);
    }

    public function reset()
    {

    }
}
