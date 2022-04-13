<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\RestaruntInterface;


class RestaruntController extends Controller
{

        protected $RestaruntInterface;

        public function __construct(RestaruntInterface $restaruntInterface)
        {
                $this->RestaruntInterface = $restaruntInterface;
        }

        public function index()
        {

                return $this->RestaruntInterface->index();
        }
        public function restaruntDetails($id)
        {
                return $this->RestaruntInterface->restaruntDetails($id);
        }
}
