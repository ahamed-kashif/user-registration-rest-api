<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponse;

    /**
     * User registration
     * @param UserRegistrationRequest $request
     * @return HttpResponseException|\Illuminate\Http\JsonResponse
     */
    public function register(UserRegistrationRequest $request): HttpResponseException|\Illuminate\Http\JsonResponse
    {
        try{
            $user  = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return $this->successResponse($user->toArray(),200,'User registered successfully');
        }catch (\Exception $e){
            if($e instanceof HttpResponseException){
                return $e;
            }
            return $this->errorResponse(500,$e->getMessage(),$e->getTrace());
        }
    }
}
