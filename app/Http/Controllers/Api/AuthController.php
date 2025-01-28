<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\ResetPasswordRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        //login user
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'ایمیل یا کلمه عبور شما صحیح نیست.'
            ]);
        }

        //is admin
        $abiblities = match (Auth::user()->is_admin) {
            true => ['read', 'write'],
            false => ['read']
        };

        //create token
        $token = Auth::user()->createToken($request->get('email'), $abiblities)->plainTextToken;

        //return token to user
        return response()->json([
            'success' => true,
            'message' => 'وارد شدید',
            'token' => $token
        ]);
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        $user = User::create([
            'first_name' => $request->validated('first_name'),
            'last_name' => $request->validated('last_name'),
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
        ]);

        //is admin
        $abiblities = ['read'];

        if ($user->is_admin) {
            $abiblities = ['read', 'write'];
        }

        //create token
        $token = $user->createToken($request->validated('email'), $abiblities)->plainTextToken;

        DB::commit();

        //return token to user
        return response()->json([
            'success' => true,
            'message' => 'حساب کاربری شما ایجاد شد.',
            'token' => $token
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT ?
            response()->json(['status' => true, 'message' => 'لینک ریست کلمه عبور برای شما ارسال شد.']) :
            response()->json(['status' => false, 'message' => 'ارسال لینک ریست با مشکل مواجه شد و یا اینکه لینک برای شما از قبل ارسال شده است.']);
    }
}