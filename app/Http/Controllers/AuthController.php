<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|unique:users',
      'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);

    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json(['user' => $user, 'token' => $token], 201);
  }

  public function login(Request $request)
  {
    $loginData = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::attempt($loginData)) {
      $user = Auth::user();
      $token = $user->createToken('authToken')->plainTextToken;
      return response()->json(['user' => $user, 'token' => $token]);
    } else {
      return response()->json(['message' => 'Credenciales inválidas'], 401);
    }
  }

  public function logout()
  {
    User::user()->token()->revoke();
    return response()->json(['message' => 'Sesión cerrada exitosamente']);
  }

  public function user(Request $request)
  {
    return response()->json($request->user());
  }
}
