<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function api_token(Request $request)
    {
        $token = $request->user()->create_token($request->token_name);

        return ['token' => $token->plainTextToken];
    }

    public function api_register(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validation) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['message' => 'User created successfully!']);
        }
    }

    public function api_login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validation) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $api_token = base64_encode(Str::random(40));
                    $user->update(['api_token' => $api_token]);
                    return response()->json(['message' => 'User logged in successfully!', 'api_token' => $api_token]);
                } else {
                    return response()->json(['message' => 'Password is incorrect!']);
                }
            } else {
                return response()->json(['message' => 'User not found!']);
            }
        }
    }
}
