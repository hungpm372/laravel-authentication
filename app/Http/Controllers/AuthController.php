<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    }

    /** @noinspection PhpUndefinedFieldInspection */
    protected function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "fail",
                "data" => $validator->errors()
            ], 400);
        }

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => "success",
            "data" => $user,
        ], 201);
    }
}
