<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {


	public function profile()
	{
		$this->load->model('profile_model');
		$data="";

		if($this->session->userdata('email')) {

			if($this->input->post('name'))
			{
				$name = $this->input->post('name');
				$addressone = $this->input->post('addressone');
				$addresstwo = $this->input->post('addresstwo');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				
				if($this->profile_model-> complete_profile($name, $addressone, $addresstwo, $city, $state, $zip))
				{
					$this->session->set_flashdata('profileupdate','<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
				<p class="font-bold">Profile Updated</p>
			  </div>');
				}
				else {
					$this->session->set_flashdata('profileupdate','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Unable to update Profile</p>
			  </div>');
				}
			}
			if($this->profile_model->is_profile_completed())
			{
				$data = $this->profile_model->get_profile();
			}

			$result= $this->profile_model->get_States();

			$this->load->view('profile',['data'=>$data,'states'=>$result]);
		}
		else {
			redirect('login/sign_in', 'refresh');
		}
	}


}
