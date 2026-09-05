<?php

namespace App\Services;

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

    $profile = match ($user->role) {
        'teacher' => $user->teacherProfile,
        'student' => $user->studentProfile,
        default => null,
    };

    $token = $user->createToken('LMS-token')->plainTextToken;

    return [
      'user' => new UserResource($user->setRelation('profile', $profile)),
      'token' => $token
    ];
  }

  public function logout($request)
  {
    $request->user()->currentAccessToken()->delete();
  }
}
