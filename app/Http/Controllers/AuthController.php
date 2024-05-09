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
    /**
     * @OA\Post(
     *     path="/api/auth/register",
     *     operationId="registerUser",
     *     tags={"Register"},
     *     summary="Register a new user",
     *     description="User Registration Endpoint",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"name","email","password","password_confirmation"},
     *                 @OA\Property(property="name",type="text"),
     *                 @OA\Property(property="email",type="text"),
     *                 @OA\Property(property="password",type="password"),
     *                 @OA\Property(property="password_confirmation",type="password"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="User Registered Successfully",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *       response="200",
     *       description="Registered Successfull",
     *       @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Unprocessable Entity",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
     *         @OA\JsonContent()
     *     ),
     * )
     */
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
