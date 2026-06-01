<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\coreModule\BackendModel;

class AdminLogin extends BaseController
{
	

	public function index()
	{	
		
		if(!empty($this->session->get('adminLogin'))){
			return redirect()->to('admin/dashboard');
		}
		$wconfig = websetting();
		$data['page_title'] = 'Admin Login | '.$wconfig['config_name'];
		$data['logo'] = $wconfig['config_logo'];
		return view('admin/login',$data);

	}




 public function Login_verifY_()
 {
	$array = array();
	$validation =  \Config\Services::validation();

	$model = new BackendModel();
	// $validation->setRule('username', 'Username', 'required|min_length[3]');
	// $validation->setRule('password', 'Password', 'required|min_length[6]|max_length[50]');
	
	$rules = [
		'username'=>'required',
		'password'=>'required|min_length[6]|max_length[50]',
	];
	
	if(!$this->validate($rules)){
		// print_r($this->validator);
	  $array['status'] =0;
	  $array['username'] = $validation->getError('username');
	  $array['password'] = $validation->getError('password');
	  echo json_encode($array);

	 }else{

		$username =  trim($this->request->getVar('username'));
		$password=   $this->request->getVar('password');
				 
		$user = $model->asObject()->where(array('username'=>$username))->first();
		
		if(empty($user)){
			$array['status'] = 0;
			$array['msg'] ='invalid username';
			echo json_encode($array); exit();
		}
		
		$check_password = password_verify($password,$user->password);
		if(empty($check_password)){
			$array['status'] = 0;
			$array['msg'] ='Password do not match';
			echo json_encode($array); exit();
		}

		$account = $model->asObject()->where(array('username'=>$username,'status'=>1))->first();
		
		if(empty($account)){
			$array['status'] = 0;
			$array['msg'] ='Your account is deactived';
			echo json_encode($array); exit();
		}

		if(!empty($user) && !empty($check_password)){
			   $this->session->set('adminLogin',$user->id);
			   $this->session->set('adminID',$user->id);
			    $array['status'] =1;
				$array['msg'] ='Login Success';
				$array['link'] = 'admin/dashboard';
				echo json_encode($array);
		}else{
			$array['status'] = 0;
			$array['msg'] ='Username and Password Do Not Match';
			echo json_encode($array);
		}

	}
}




}
