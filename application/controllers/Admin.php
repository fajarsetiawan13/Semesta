<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard - Admin";

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        // echo '<pre>';
        // var_dump($users[0]['fname']);
        // die;

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/admin_footer');
    }

    public function teacher()
    {
        $data['title'] = "Teachers";
        $data['students'] = $this->db->get('students')->result_array();
        $data['teachers'] = $this->db->get('teachers')->result_array();

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('admin/teacher', $data);
        $this->load->view('admin/admin_footer');
    }

    public function student()
    {
        $data['title'] = "Students";
        $data['students'] = $this->db->get('students')->result_array();
        $data['teachers'] = $this->db->get('teachers')->result_array();

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('admin/student', $data);
        $this->load->view('admin/admin_footer');
    }


    // Teacher's Data Function
    public function edit_teacher($tc)
    {
        $data['title'] = "Edit Teacher's Data of ";
        $data['teacher_choose'] = $this->db->get_where('teachers', ['teacher_ID' => $tc])->result_array();

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('admin/edit_teacher', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $this->change_teacher();
        }
    }

    public function activate_teacher($tc)
    {
        $this->db->set('is_active', 1);
        $this->db->where('teacher_ID', $tc);
        $this->db->update('teachers');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been Activated!</div>');
        redirect('admin/teacher');
    }

    public function change_teacher()
    {
        $teacher_ID = $this->input->post('teacher_ID');
        $email = $this->input->post('email');

        $this->db->set('teacher_ID', $teacher_ID);
        $this->db->where('email', $email);
        $this->db->update('teachers');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been changed successfully.</div>');
        redirect('admin/teacher');
    }

    // Student's Data Function
    public function edit_student($tc)
    {
        $data['title'] = "Edit Student's Data of ";
        $data['student_choose'] = $this->db->get_where('students', ['student_ID' => $tc])->result_array();

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('admin/edit_student', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $this->change_teacher();
        }
    }

    public function activate_student($tc)
    {
        $this->db->set('is_active', 1);
        $this->db->where('student_ID', $tc);
        $this->db->update('students');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been Activated!</div>');
        redirect('admin/student');
    }

    public function change_student()
    {
        $teacher_ID = $this->input->post('student_ID');
        $email = $this->input->post('email');

        $this->db->set('student_ID', $teacher_ID);
        $this->db->where('email', $email);
        $this->db->update('students');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been changed successfully.</div>');
        redirect('admin/student');
    }
}
