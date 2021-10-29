<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table_model extends CI_Model
{
    public function getUser()
    {
        $email = $this->input->post('email');

        $query = "SELECT * FROM (
                  SELECT email, pass, role_ID, is_active FROM `teachers` UNION
                  SELECT email, pass, role_ID, is_active FROM `students`
                  ) AS users
                  WHERE email = '" . $email . "'
                  ";
        return $this->db->query($query)->row_array();
    }

    public function getUserFull()
    {
        $email = $this->session->userdata('email');

        $query = "SELECT * FROM (
                  SELECT fname, lname, gender, birth, image, address, email, pass, role_ID, is_active FROM `teachers` UNION
                  SELECT fname, lname, gender, birth, image, address, email, pass, role_ID, is_active FROM `students`
                  ) AS users
                  WHERE email = '" . $email . "'
                  ";
        return $this->db->query($query)->result_array();
    }
}
