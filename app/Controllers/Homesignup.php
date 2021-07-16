<?php

namespace App\Controllers;

class Homesignup extends BaseController
{  
    public function __construct()
    {
        helper('form');
        helper('date');
    }
	public function index()
	{
        $data = [
            "page_title" => "Signup Home",
            "page_heading" => "Welcome to the Signup page",
        ];

		return view('home_signup_view', $data);
	}
}
