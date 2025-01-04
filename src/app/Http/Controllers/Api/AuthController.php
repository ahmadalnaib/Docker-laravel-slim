<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\LoginUserRequest;

class AuthController extends Controller
{
    //

    use ApiResponses;
    public function login(LoginUserRequest $request)
    {
       $request->validated($request->all());
        
     if(!Auth::attempt($request->only('email','password'))){
         return $this->errorResponse('Invalid credentials', 401);
        }
       $user=User::firstWhere('email', $request->email);

       return $this->ok(
        'Authenticated',
        [
            'token' => $user->createToken('authToken for' .$user->email)->plainTextToken,
            
        ]
       );
        
    }

    public function register(Request $request)
    {
        return $this->ok('test','register');
    }

}