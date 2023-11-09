<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            return response()->json(['error_de_validacion' => $validator]);
        } else {
            // return response()->json(['validacion' => $validator->validated()]);
            $validatedData = $validator->validated();

            $validatedData['password'] = Hash::make($request->password);

            $user = User::create($validatedData);

            $token = $user->createToken('api_token')->plainTextToken;

            return response()->json(['token' => $token], 201);
        }
    }
}
