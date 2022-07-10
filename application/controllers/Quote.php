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

	public function view_quote()
	{

		$this->load->model('profile_model');
		$this->load->model('quote_model');
		$data="";

		if(!$this->profile_model->is_profile_completed()) {
			$this->session->set_flashdata('profileupdate','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Please Complete Profile</p>
			  </div>');
			redirect(base_url().'quote/profile');
		}

		if($this->input->post('quote'))
		{
			
			$user  = $this->profile_model->get_profile();
			$current_market_price = 1.2;
			$gallons = $this->input->post('gallons');
			$date = $this->input->post('date');

			$margin = $this->calculate_margin($current_market_price,$gallons,$date,$user->state);

			$suggested_price = $current_market_price + $margin;
			$amount = $suggested_price * $gallons;

			$data = array('due' =>$amount,'price'=>$suggested_price, 'date' =>$date,'address' =>$user->address,'gallons'=>$gallons);
			
			$this->load->view('quote',['data'=>$data]);
		}
		else if($this->input->post('save'))
		{
			$user  = $this->profile_model->get_profile();
			$current_market_price = 1.2;
			$gallons = $this->input->post('gallons');
			$date = $this->input->post('date');

			$margin = $this->calculate_margin($current_market_price,$gallons,$date,$user->state);

			$suggested_price = $current_market_price + $margin;
			$amount = $suggested_price * $gallons;

			$data = array('user'=>$this->session->userdata('id'),'amount_due' =>$amount,'price'=>$suggested_price, 'date' =>$date,'address' =>$user->address,'gallons'=>$gallons);

			if($this->quote_model->save_quote($data))
			{
				$this->session->set_flashdata('quote','<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
				<p class="font-bold">Quote Saved</p>
			  </div>');
			}else {
				$this->session->set_flashdata('quote','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Unable to save</p>
			  </div>');
			}

			$data = array('due' =>$amount,'price'=>$suggested_price, 'date' =>$date,'address' =>$user->address,'gallons'=>$gallons);
			$this->load->view('quote',['data'=>$data]);
		}
		else {
			$this->load->view('quote',['data'=>""]);
		}

	}

    public function quote_history()
	{

		$this->load->model('quote_model');
		$this->load->model('profile_model');
		if(!$this->profile_model->is_profile_completed()) {
			$this->session->set_flashdata('profileupdate','<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
				<p class="font-bold">Please Complete Profile</p>
			  </div>');
			redirect(base_url().'quote/profile');
		}
		$data = $this->quote_model->get_history();
		

		$this->load->view('quote_history',['data'=>$data]);
	}

	public function calculate_margin($current_market_price,$gallons,$date,$state) {

		$company_profit_factor = 0.1;
		$location_factor = $state === 'TA' ? 0.02 : 0.04;
		$rate_history_factor =  $this->quote_model->get_history_factor();
		$gallonsFactor = $gallons>1000 ? 0.02 : 0.03;

		$timestamp = strtotime($date);
		$date = date("m", $timestamp);
		$dateFluctuationFactor = $date > 5 && $date < 9 ? 0.04 :0.03 ;

		return $current_market_price * ($location_factor - $rate_history_factor + $gallonsFactor +$dateFluctuationFactor + $company_profit_factor);;
	}
}
