<?php

namespace App\Http\Repositories; 

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgetPasswordEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\ForgetPasswordInterface;

class ForgetPasswordRepository implements ForgetPasswordInterface{
    
    use ApiResponceTrait;
  
    public function getEmail($request){
    
        $email = $request->email;


        if(User::where('email', $email)->doesntExist()){
            return response(['message'=>'This email does not exists!'], 200);
        }
        $token = Str::random(10);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()->addHours(6)
        ]);

         // Send Mail
        Mail::to($email)->send(new ForgetPasswordEmail($token));
        
        
        
        return $this->apiResponce(200,'check your email to verify changing your password') ;  
    }

    public function changePasswordPage(){
        return view('newpassword');
    }

    // reset password
    public function resetPassword($request,$token){
        dd($token);
        $token = $request->token;
        $passwordRest = DB::table('password_resets')->where('token', $token)->first();

        // Verify
        if(!$passwordRest){
            return response(['message' => 'Token Not Found.'], 200);
        }

        // Validate exipire time
        if(!$passwordRest->created_at >= now()){
            return response(['message' => 'Token has expired.'], 200);
        }

        $user = User::where('email', $passwordRest->email)->first();

        if(!$user){
            return response(['message' => 'User does not exists.'], 200);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('token', $token)->delete();

        return response(['message'=>'Password Successfully Updated.'], 200);
    }
   

    
}