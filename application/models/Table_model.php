<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table_model extends CI_Model
{
    public function getEditTeacher()
    {
        $id = $this->uri->segment(3);
        $data = $this->db->get_where('users', ['id' => $id])->row_array();

        $query = "SELECT `users`.`id`, `users`.`username`, `users`.`email`, `users`.`image`, `users`.`is_active`,
                         `user_employee`.`employee_id`, `user_employee`.`occupation` 
                    FROM `users` 
                    JOIN `user_employee` ON `user_employee`.`email` = `users`.`email`
                    WHERE `users`.`email` = '" . $data['email'] . "'
        
        ";
        return $this->db->query($query)->result_array();
    }

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
