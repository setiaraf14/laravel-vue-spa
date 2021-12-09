<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required',
            "password" => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Gagal register :",
                "response" => $validator->errors()
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => true,
            "message" => "Berhasil register"
        ]);
    }

    public function masuk(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user['token'] = $user->createToken($request->email)->plainTextToken;
            return response()->json([
                "status" => true,
                "message" => $user
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "gagal"
            ]);
        }
    }

    public function keluar()
    {
        $user  = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            "status" => true,
            "message" => "berhasil keluar"
        ]);
    }
}
