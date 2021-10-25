<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard - Student";
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        // echo '<pre>';
        // var_dump($users[0]['fname']);
        // die;

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('student/index', $data);
        $this->load->view('admin/admin_footer');
    }

    public function class()
    {
        $data['title'] = "Class Schedule";
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('student/class');
        $this->load->view('admin/admin_footer');
    }

    public function scores()
    {
        $data['title'] = "My Score";
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('student/scores');
        $this->load->view('admin/admin_footer');
    }
}
