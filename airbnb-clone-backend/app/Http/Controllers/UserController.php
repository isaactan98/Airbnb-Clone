<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function api_get_user(Request $request)
    {
        $user = User::query()->where('user_token', $request->user_token)->first();
        return response()->json($user);
    }

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
            $user->user_token = md5('secret' . $user->id);
            $user->save();
            return response()->json(['message' => 'User created successfully!', 'user' => $user]);
        }
    }

    public function api_login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $request->session()->regenerate();
        return response()->json([
            'message' => 'Login successful',
            'user' => auth()->user(),
            'token' => csrf_token(),
        ]);
    }

    public function api_update_user(Request $request)
    {
        $user = User::query()->where('user_token', $request->user_token)->first();
        if ($request->name) {
            $user->name = $request->name;
        }

        $user->update();
        return response()->json(['message' => 'User updated successfully!', 'user' => $user]);
    }
}
