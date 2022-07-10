<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {



	public function sign_in()
	{
		if($this->input->post('email'))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$valid = true;
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password)<6) {
				$this->session->set_flashdata('unabletologin','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Wrong Password/Email Format</p>
			  </div>');
			  $valid=false;
			}

			if($valid)
			{
				$this->load->model('login_model');
			$user = $this->login_model->get_user($email,$password);

			if ($user[0]->name == "nouser")
			{
				$this->session->set_flashdata('unabletologin','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Wrong Password/Email</p>
			  </div>');
				
			}else {
				$this->session->set_userdata('email',$this->input->post('email'));
				$this->session->set_userdata('id',$user[0]->sno);
				redirect(base_url().'quote/profile');
			} 
			}
			
			
		
		}
		$this->load->view('login');
	}

	public function sign_up()
	{
		if($this->input->post('email'))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$passwordConfirm = $this->input->post('passwordConfirm');

			if($password !== $passwordConfirm)
			{
				$this->session->set_flashdata('unabletosignup','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Both Password and Password Confirm should match</p>
			  </div>');
			}
			else {
				$this->load->model('login_model');
				if($this->login_model->add_user($email,$password))
				{
					$this->session->set_flashdata('unabletosignup','<div class="bg-greeen-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
				<p class="font-bold">Succesfully Registered</p><p>Please login to continue</p>
				
			  </div>');
				}else {
					$this->session->set_flashdata('unabletosignup','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Unable to signup</p>
			  </div>');
				}
			}
		}
		$this->load->view('signup');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect(base_url().'login/sign_in');

	}
}
