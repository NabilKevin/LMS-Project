<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\ApiResponse;
use App\Services\Auth\AuthService;
use Exception;
use Illuminate\Http\Request;

class Post extends Controller
{
    use ApiResponse;

    /**
     * User Login
     *
     * Endpoint untuk mengautentikasi pengguna dan mendapatkan token akses Sanctum.
     *
     * @group Authentication
     * 
     * @unauthenticated
     *
     * @bodyParam email string required Alamat email pengguna. Example: nabil@sekolah.com
     * @bodyParam password string required Kata sandi pengguna. Example: password123
     *
     * @response 200 {
     *   "status": "success",
     *   "message": "Login berhasil",
     *   "data": {
     *     "user": {
     *       "id": 1,
     *       "name": "Nabil",
     *       "email": "nabil@sekolah.com",
     *       "role": "admin"
     *     },
     *     "token": "1|AbCdEfGhIjKlMnOpQrStUvWxYz"
     *   }
     * }
     * 
     * @response 401 {
     *   "status": "error",
     *   "message": "Email atau password salah!"
     * }
     * 
     * @response 422 {
     *   "message": "The email field is required.",
     *   "errors": {
     *     "email": [
     *       "The email field is required."
     *     ]
     *   }
     * }
     */
    public function login(LoginRequest $request, AuthService $service)
    {
        try {
            $data = $service->login($request->validated());
            
            return $this->respondSuccess('Success login!', $data, 200);
        } catch(Exception $e) {
            $statusCode = $e->getCode() > 100 ? $e->getCode() : 500;

            return $this->respondErrorWithoutData($e->getMessage(), $statusCode);
        }

    }

    /**
     * User Logout
     *
     * Endpoint untuk menghapus/mencabut token akses Sanctum yang sedang digunakan.
     *
     * @group Authentication
     * 
     * @authenticated
     *
     * @response 200 {
     *   "status": "success",
     *   "message": "Logout berhasil"
     * }
     * 
     * @response 401 {
     *   "message": "Unauthenticated."
     * }
     */
    public function logout(Request $request, AuthService $service)
    {
        try {
            $service->logout($request);
            
            return $this->respondSuccessWithoutData('Success logout!', 200);
        } catch(Exception $e) {
            $statusCode = $e->getCode() > 100 ? $e->getCode() : 500;

            return $this->respondErrorWithoutData($e->getMessage(), $statusCode);
        }

    }
}
