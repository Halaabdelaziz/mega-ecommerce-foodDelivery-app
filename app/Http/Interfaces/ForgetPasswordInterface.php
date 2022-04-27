<?php
namespace App\Http\Interfaces;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

interface ForgetPasswordInterface {
    
    public function changePasswordPage($token);
    public function getEmail($request);
    public function resetPassword($request);
}