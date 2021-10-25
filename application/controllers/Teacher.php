<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard - Teacher";
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        // echo '<pre>';
        // var_dump($data['users']);
        // die;

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('teacher/index');
        $this->load->view('admin/admin_footer');
    }

    public function class()
    {
        $data['title'] = "Class List";
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('teacher/class');
        $this->load->view('admin/admin_footer');
    }

    public function scores()
    {
        $data['title'] = "Student Score";
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('teacher/scores');
        $this->load->view('admin/admin_footer');
    }
}
