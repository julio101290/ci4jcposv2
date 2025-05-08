<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Home extends BaseController
{
    
        public function __construct() {
   
        helper('menu');
        helper('auth');
    }
    public function index(): string
    {
        header("Location: ".site_url().'/admin');
        die();
        
      
    }
}
