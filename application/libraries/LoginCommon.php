<?php 
class LoginCommon {

    public function login(){
        $this->load->model('login_model');
        $user = $this->login_model->get_user("king@kong.com","kong");
        print_r($user);
    }

}