<?php


class Login_test extends TestCase
{
	public function testLogin()
	{
		$output = $this->request('GET', 'login/sign_in');
		$this->assertNotEmpty($output);
	}


    public function testSignup()
	{
		$output = $this->request('GET', 'login/sign_up');
		$this->assertNotEmpty( $output);
	}

    /**
     * @test
     */
    public function testPost()
    {
        $num = rand();
        $email = 'testing'.$num.'@test.com';

        //fail creating
        $output = $this->request(
            'POST', 
            'login/sign_up',  
            ['email' => $email,'password' => 'testing','passwordConfirm' => 'esting']
        );
        $this->assertNotEmpty($output);

        //creates account
        $output = $this->request(
            'POST', 
            'login/sign_up',  
            ['email' => $email,'password' => 'testing','passwordConfirm' => 'testing']
        );
        

        //incorrect login
        $output = $this->request(
            'POST', 
            'login/sign_in',  
            ['email' => "mail",'password' => 'teting']
        );
       
		$this->assertNotEmpty( $output);

        //fails login
        $output = $this->request(
            'POST', 
            'login/sign_in',  
            ['email' => $email,'password' => 'teting']
        );
       
		$this->assertNotEmpty( $output);

        //login
        $output = $this->request(
            'POST', 
            'login/sign_in',  
            ['email' => $email,'password' => 'testing']
        );
       
		$this->assertNull($output);

        $output = $this->request('GET', 'login/logout');
        $this->assertNotNull($output);

       

    }

   

}
