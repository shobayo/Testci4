<?php

namespace App\Controllers;
use \App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public $dModel;
    public function __construct()
    {
        $this->dModel = new DashboardModel();
        helper('form');
        $this->session = session();
    }
	public function index()
	{
        $data=[];
        if(!(session()->has('logged_user') || session()->has('google_user')))
        {
            return redirect()->to(base_url()."/login");
        }
        $uniid = session()->get('logged_user');
        $data["login_info"] = $this->dModel->getLoggedInUserInfo(session()->get('logged_user'));
        $data["userdata"] = $this->dModel->getLoggedInUserData($uniid);
		return view('dashboard_view', $data);
	}
    public function logout()
    {
        if(session()->has('logged_info')) 
        {
            $la_id = session()->get('logged_info');
            $this->dModel->updateLogoutTime($la_id);
        }

        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url()."/login");
    }

    public function login_activity()
    {
        $data["userdata"] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        $data["login_info"] = $this->dModel->getLoggedInUserInfo(session()->get('logged_user'));

        return view('login_activity_view', $data);
    }

    public function avatar()
    {
        $data = [];
        $data["userdata"] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        $data['validation'] = null;
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'picture'=> 'uploaded[picture]|max_size[avatar,1024]|ext_in[avatar,png,jpg,gif]',
            ];
            if($this->validate($rules)){

                $file = $this->request->getFile('avatar');

                if($file->isValid() && !$file->hasMoved()) 
                {
                    $newName = $file->getRandomName();
                    if($file->move(FCPATH.'/public/profiles/', $newName))
                    {
                       $path = base_url().'/public/profiles/'.$file->getName();
                        $status = $this->dModel->updateAvatar($path,session()->get('logged_user')); 
                        if($status == true)
                        {
                            session()->setTempdata('success','Profile Picture is Uploaded Successfully',3);
                            return redirect()->to(current_url());
                        }
                        else
                        {
                            session()->setTempdata('error','Sorry Unable to Upload the Picture',3);
                            return redirect()->to(current_url());
                        }              
                    }
                    else
                    {
                        session()->setTempdata('error',$file->getErrorString(),3);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    session()->setTempdata('error','You have uploaded an invalid files',3);
                    return redirect()->to(current_url());
                }

            }
            else
            {
                $data['validation'] = $this->validator;
            }
            
        }

        return view('avatarview', $data);
    }


	public function change_password()
	{
        $data = [];
        $data["userdata"] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        $data['validation'] = null;

        if($this->request->getMethod()== 'post')
        {
            $rules = [
                'opwd' => 'required|min_length[6]|max_length[16]',
                'npwd' => 'required|min_length[6]|max_length[16]',
                'cnpwd' => 'required|matches[npwd]',

            ];
            if($this->validate($rules))
            {
                $opwd = $this->request->getVar('opwd');
                $npwd = password_hash($this->request->getVar('npwd'), PASSWORD_DEFAULT);
                if(password_verify($opwd, $data['userdata']->password))
                {
                   if($this->dModel->updatePassword($npwd, session()->get('logged_user')))
                   {
                    $this->session->setTempdata('success','Password Updated Successfully', 3);
                    return redirect()->to(current_url());
                   }
                   else
                   {
                    $this->session->setTempdata('error','Sorry!, Unable to update the password, try again', 3);
                    return redirect()->to(current_url());
                   }
                }
                else
                {
                    $this->session->setTempdata('error','Sorry!, Old Password does not matched with db Password', 3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
		return view('change_password_view',$data);
	}

    public function edit()
	{
        $data = [];
        $data["userdata"] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        $data['validation'] = null;

        if($this->request->getMethod()== 'post')
        {
            $rules = [
                'firstname' => 'required|min_length[4]|max_length[20]',
                'lastname' => 'required|min_length[4]|max_length[20]',
                'mobile' => 'required|numeric|exact_length[11]',
            ];
            if($this->validate($rules))
            {
                $userdata = [
                    'firstname' => $this->request->getVar('firstname', FILTER_SANITIZE_STRING
                ),
                'lastname' => $this->request->getVar('lastname', FILTER_SANITIZE_STRING
                ),
                'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_STRING
                )
                ];
                if($this->dModel->updateUserInfo($userdata, session()->get('logged_user')))
                {
                    $this->session->setTempdata('success','Profile Updated Successfully', 3);
                    return redirect()->to(base_url().'/dashboard');
                }
                else
                {
                    $this->session->setTempdata('error','Sorry!, Unable to update Profile, try again later', 3);
                    return redirect()->to(current_url());
                }

            }
            else
            {
                $data['validation'] = $this->validator;
            }

        }
        
		return view('edit_view', $data);
	}

    
}