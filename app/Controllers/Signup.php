<?php

namespace App\Controllers;
use \App\Models\Registermodel;

class Signup extends BaseController
{  
    public $session;
    public $registerModel;
    public function __construct()
    {
        helper('form');
        helper('date');
        $this->registerModel = new Registermodel();
        $this->session =\CodeIgniter\Config\Services::session();
    }
	public function index()
	{
        $data = [];
        $data['validation'] = null;
        if($this->request->getMethod() == 'post')
		{

        $rules = [
			'firstname' => 'required|min_length[3]|max_length[20]',
            'lastname' => 'required|min_length[3]|max_length[20]',
			'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[16]',
            'confirm password' => 'required|matches[password]',
			'mobile' => 'required|numeric|exact_length[11]',
		 ];
         if($this->validate($rules))
         {
             $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
             $userdata = [
                 'firstname'=> $this->request->getVar('firstname', FILTER_SANITIZE_STRING),
                 'lastname'=> $this->request->getVar('lastname', FILTER_SANITIZE_STRING),
                 'gender'=> $this->request->getVar('gender'),
                 'email'=> $this->request->getVar('email', FILTER_SANITIZE_STRING),
                 'password'=> password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                 'mobile'=> $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
                 'uniid'=> $uniid,
                 'activation_date'=> date("Y-m-d h:i:s"),   
             ];

             $status = $this->registerModel->createUser($userdata);
            if($status)
            {
                $this->session->setTempdata('success','Account Created successfully.',3);
                return redirect()->to(base_url().'/login');
            }
            else
            {
                $data['error'] = 'Sorry!, Email does not exist';
            }


         }
         else
         {
            $data['validation'] = $this->validator;
         }

        }

		return view('signupview', $data);
	}
}
