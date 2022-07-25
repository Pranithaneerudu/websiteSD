<?php


class Quote_test extends TestCase
{

    public function test_index()
    {
        $output = $this->request('GET', 'login/sign_in');
        $this->assertNotNull( $output);

    }

    public function test_quote()
    {

        $num = rand();
        $email = 'testing'.$num.'@test.com';

       

        //creates account
        $output = $this->request(
            'POST', 
            'login/sign_up',  
            ['email' => $email,'password' => 'testing','passwordConfirm' => 'testing']
        );

        $this->assertNotNull($output);
        $output = $this->request(
            'GET', 
            'quote/profile'
        );
        $this->assertNull($output);
         //login
         $output = $this->request(
            'POST', 
            'login/sign_in',  
            ['email' => $email,'password' => 'testing']
        );
       
		

        //without login
        $output = $this->request(
            'GET', 
            'quote/show_profile'
        );
        $output = $this->request(
            'GET', 
            'quote/return_profile'
        );
        // without login view quote
        $output = $this->request(
            'GET', 
            'quote/view_quote'
        );

        $this->assertNull($output);

        $output = $this->request(
            'GET', 
            'quote/profile'
        );
       
		$this->assertNotNull($output);

        //Correct value inputs
        $output = $this->request(
            'POST', 
            'quote/profile',
            ['name' => 'testing','addressone' => 'testing','addresstwo' => 'testing','city' => 'testing','state' => 'CA','zip' => 'testing']
        );
        //incorrect value inputs

        $output = $this->request(
            'POST', 
            'quote/profile',
            ['name' => 'testing','addressone' => 'testing','addresstwo' => 'testing','city' => 'testing','state' => 'CA','zip' => 'tng']
        );

        $this->assertNotNull($output);

        }

}