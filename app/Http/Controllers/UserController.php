<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registro(Request $request)
    {
        // return "caca";
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->messages());
        } else {
            // return response()->json(['validacion' => $validator->validated()]);
            $validatedData = $validator->validated();

            $validatedData['password'] = Hash::make($request->password);

            $user = User::create($validatedData);

            $token = $user->createToken('api_token')->plainTextToken;

            return response()->json($token, 201);
        }
    }
    public function getApiKey(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->messages());
        } else {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('api_token')->plainTextToken;

                return response()->json([$token , 'user' => $user ,'tokens' => $user->tokens], 201);
            }

            return response()->json(['Login failed'], 401);
        }
    }
}
