<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitTest extends CI_Controller {

    

    function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
    }

	public function index()
	{
        $this->loginTest();
        $this->registationTest();
        $this->profileTest();


		echo $this->unit->report();
	}

    public function loginTest()
    {
       
    
        $curl = curl_init("http://localhost/login/sign_in");
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $this->unit->run(true, strpos($response, '<title>Fuel Quote generator</title>'),"login");


        $curl = curl_init("http://localhost/login/sign_in");
        $data = array('email' => "king@kong.com",'password' => "kng" );
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
    

        $this->unit->run(true, strpos($response, 'Wrong Password/Email'),"Unable to login on wrong email and password");

    }

    public function registationTest()

    {
		$num = rand();
        $email = 'test'.$num.'@test.com';
        $curl = curl_init("http://localhost/login/sign_up");
        $data = array('email' => $email,'password' => "test",'passwordConfirm' => "testing" );

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $this->unit->run(true, strpos($response, 'Both Password and Password Confirm should match'),"wrong password match");

        $curl = curl_init("http://localhost/login/sign_up");
        $data = array('email' => $email,'password' => "testing",'passwordConfirm' => "testing" );
     
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $this->unit->run(true, strpos($response, 'Succesfully Registered'),"create on correct password and email match");


    }

    public function profileTest()
    {
        define("COOKIE_FILE", "cookie.txt");

        $curl = curl_init("http://localhost/login/sign_in");
        $data = array('email' => "test@testing45.com",'password' => "testing" );
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt ($curl, CURLOPT_COOKIEJAR, COOKIE_FILE); 
        curl_setopt ($curl, CURLOPT_COOKIEFILE, COOKIE_FILE); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);

        $curl = curl_init("http://localhost/quote/profile");

        curl_setopt($curl, CURLOPT_POST, false);
    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($curl, CURLOPT_COOKIEJAR, COOKIE_FILE); 
        curl_setopt ($curl, CURLOPT_COOKIEFILE, COOKIE_FILE); 
        curl_setopt($curl, CURLOPT_HEADER, true);
        $response = curl_exec($curl);


        $this->unit->run(true, strpos( $response , '200'),"updateProfile");

        curl_close($curl);

    }

}
