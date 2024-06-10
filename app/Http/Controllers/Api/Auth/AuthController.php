<?php

namespace App\Http\Controllers\Api\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Aut\LoginRequest;
use App\Http\Requests\Aut\RegisterRequest;
use App\Models\User;
use App\Http\Resources\Auth\AuthResources;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //Login Structure
    public function login(LoginRequest $request){

        //validation
        $request->validate([
        'email'=> 'required|email',
        'password'=> 'required'
        ]);
    
    //Getting the Data
    $user = User::where('email', $request->email)->first();

    //checking Authentication
    if(!$user || !Hash::check($request->password,$user->password)){
        //send a message if the user input wrong credentials
        throw ValidationException::withMessages([
            'email'=>['The Provided credentials are incorrect.'],
        ]);
    }
    //sending Token
        return $this->setToken($user);
    }

    //Register Structure
    public function register(RegisterRequest $request){
        
       $user = User::create($request->validated());
       return $this->setToken($user);

    }
    public function setToken($user)
    {
        $token = $user->createToken('userToken')->plainTextToken;
        return AuthResources::make([
             'token' => $token,
             'user' => [
                 'name' => $user->name,
                 'email' => $user->email,
 
             ],
         ]);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message'=> 'Logout Success'],200);
    }
}
