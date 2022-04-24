<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ForgetPasswordInterface;
use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    protected $ForgetPasswordInterface;

    public function __construct(ForgetPasswordInterface $ForgetPasswordInterface)
    {
         $this->ForgetPasswordInterface= $ForgetPasswordInterface;
    }

    public function changePasswordPage(){
        return   $this->ForgetPasswordInterface->changePasswordPage();
    }
    public function getEmail(ForgetPasswordRequest $request){
        return   $this->ForgetPasswordInterface->getEmail($request);
    }
}
