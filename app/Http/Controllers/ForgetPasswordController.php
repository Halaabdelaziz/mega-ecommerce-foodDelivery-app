<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ForgetPasswordInterface;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    protected $ForgetPasswordInterface;

    public function __construct(ForgetPasswordInterface $ForgetPasswordInterface)
    {
         $this->ForgetPasswordInterface= $ForgetPasswordInterface;
    }
}
