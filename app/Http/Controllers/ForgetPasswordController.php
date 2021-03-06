<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPassswordRequest;
use App\Http\Interfaces\ForgetPasswordInterface;

class ForgetPasswordController extends Controller
{
    protected $ForgetPasswordInterface;

    public function __construct(ForgetPasswordInterface $ForgetPasswordInterface)
    {
        $this->ForgetPasswordInterface= $ForgetPasswordInterface;
    }

    public function changePasswordPage($token){
        return   $this->ForgetPasswordInterface->changePasswordPage($token);
    }
    public function getEmail(ForgetPasswordRequest $request){
        return   $this->ForgetPasswordInterface->getEmail($request);
    }
    public function resetPassword(Request $request){
        return $this->ForgetPasswordInterface->resetPassword($request);
    }
    
}
