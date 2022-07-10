<?php 
class login_model extends CI_Model {

        public function get_user($email,$password)
        {
            $password = hash("sha256",$password);
            $query = "SELECT *  FROM users WHERE email='$email'and password='$password'";

            $res = $this->db->query($query);
    
            $object = new stdClass();
            $object->name = 'nouser';
            $nouser = [$object];
    
            if ( $res->num_rows() == 0)
            {
                return $nouser;
            }
            return $res->result();
        }

        public function add_user($email,$pass)
        {
                $password = hash("sha256",$pass);

                $data = array(
                'email' => $email,
                'password' => $password
                );

                $result = $this->db->insert('users', $data);

                return $result;
                
        }
}