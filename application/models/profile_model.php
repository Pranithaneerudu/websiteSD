<?php 
class profile_model extends CI_Model {

  

        public function is_profile_completed()
        {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $this->session->userdata('email'));
            $query = $this->db->get();

            foreach ($query->result() as $row)
            {
                if($row->name === "")
                {
                    return false;
                }
                else {
                    return true;
                }
            }
        }

        public function get_profile()
        {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $this->session->userdata('email'));
            $query = $this->db->get();

            foreach ($query->result() as $row)
            {
                return $row;
            }
        }
        public function complete_profile($name, $addressone, $addresstwo, $city, $state, $zip)
        {
            $this->db->set('name', $name);
            $this->db->set('address',$addressone);
            $this->db->set('address2',$addresstwo);
            $this->db->set('city',$city);
            $this->db->set('state',$state);
            $this->db->set('zip',$zip);
            $this->db->where('email', $this->session->userdata('email'));
            return $this->db->update('users');
        }
        public function get_States() {
            $data['CA'] = "Califonia";
            $data['TA'] = "Texas";
            $data['FL'] = "Florida";
            $data['VE'] = "Virgina";
            return  $data;
        }

       
}