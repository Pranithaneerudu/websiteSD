<?php 
class quote_model extends CI_Model {

    public function get_history_factor()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT *  FROM quotation_history WHERE user='$id'";

        $res = $this->db->query($query);
        if ( $res->num_rows() == 0)
        {
            return 0.01;
        }
        return 0;
    }

    public function save_quote($data)
    {
        $result = $this->db->insert('quotation_history', $data);


        return $result;
    }

    public function get_history()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT  *  FROM quotation_history WHERE user='$id'";

        $res = $this->db->query($query);
        return $res->result_array();
       
    }

}