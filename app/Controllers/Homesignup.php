<?php

namespace App\Controllers;
use \App\Models\DashboardModel;

class Homesignup extends BaseController
{  
    public $hModel;
    public function __construct()
    {
        $this->hModel = new DashboardModel();
        helper('form');
        $this->session = session();
    }
	public function index()
	{
        $data = [
            "page_title" => "Signup Home",
            "page_heading" => "Welcome to the Signup page",
        ];
        
        $uniid = session()->get('logged_user');
        $data["userdata"] = $this->hModel->getLoggedInUserData($uniid);
		return view('home_signup_view', $data);
	}
}
