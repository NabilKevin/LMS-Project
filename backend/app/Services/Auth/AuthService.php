<?php 

namespace App\Services\Auth;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthService
{
  public function login($credentials)
  {
    if(!Auth::attempt($credentials)) {
      throw new \Exception("Incorrect username or password!", 401);
    }

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $token = $user->createToken('LMS-token')->plainTextToken;
    
    return [
      'user' => new UserResource($user),
      'token' => $token
    ];
  }

  public function logout($request)
  {
    $request->user()->currentAccessToken()->delete();
  }
}