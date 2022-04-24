<?php

namespace App\Http\Repositories; 

use App\Http\Interfaces\ForgetPasswordInterface;
use App\Http\Traits\ApiResponceTrait;
use App\Mail\ForgetPasswordEmail;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordRepository implements ForgetPasswordInterface{

    use ApiResponceTrait;
    public function getEmail($request){
      
        Mail::to($request->email)->send(new ForgetPasswordEmail);
        
        return $this->apiResponce(200,'check your email to verify changing your password') ;  
     }
    public function changePasswordPage(){
        return view('newpassword');
    }

    
   

    
}