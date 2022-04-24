<?php
namespace App\Http\Interfaces;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

interface ForgetPasswordInterface {
    
    public function changePasswordPage();
    public function getEmail($request);
}
