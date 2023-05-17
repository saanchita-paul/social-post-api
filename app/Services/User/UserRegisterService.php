<?php

namespace App\Services\User;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


/**
 * User Registration Service
 */
class UserRegisterService
{
    /**
     * Register new user
     * @param Request $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function userRegister(Request $data)
    {
        try {
            $user = User::create([
                'f_name' => $data->f_name,
                'l_name' => $data->l_name,
                'email' => $data->email,
                'password' => Hash::make($data->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return $th;
        }
    }

}
