<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Traits\ApiResponceTrait;
use GuzzleHttp\Psr7\Request;

class AuthController extends Controller
{
    use ApiResponceTrait;
  public function loginPage(){
      return view('Auth.login');
  }

  public function register (RegisterRequest $request){
      $user= User::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=> Hash::make($request->password)
      ]);

      $token =$user->createToken('myapptoken')->plainTextToken;
    $array=[
        'access_token'=>$token,
    ];
    return $this->apiResponce(200 ,'Account Created successfully',null, $array );
      
  }


  public function login(LoginRequest $request)
  {
       $user=User::where('email',$request->email)->first();
       if(!$user || !Hash::check($request['password'],$user->password)){
           return $this->apiResponce(400,'bad credtionals');
       }
       $token= $user->createToken('myapptoken')->plainTextToken;
       $array=[
           'access_token'=>$token,
       ];
       return $this->apiResponce(200 ,'logged in ',null, $array );
   
   
  }


  public function logout(){

    auth()->user()->tokens()->delete();
    return $this->apiResponce(200 ,'logged out successfully', );
  }



  
}
