<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Management';

        // echo '<pre>';
        // var_dump($users[0]['fname']);
        // die;

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('manage/index', $data);
        $this->load->view('admin/admin_footer');
    }

    public function menu()
    {
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('manage/menu', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu has been added successfully!</div>');
            redirect('manage');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu'] = $this->db->get('user_sub_menu')->result_array();

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('manage/submenu', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $sub = [
                'menu_id' => $this->input->post('menu_id'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $sub);
            $this->session->flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu has been added successfully!</div>');
            redirect('manage');
        }
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['role'] = $this->db->get('user_role')->result_array();

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('manage/role', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Berhasil Ditambahkan!</div>');
            redirect('manage');
        }
    }

    public function subjects()
    {
        $data['title'] = 'Subjects';
        $data['subjects'] = $this->db->get('subjects')->result_array();

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('sub1', 'Sub1', 'required');
        $this->form_validation->set_rules('sub2', 'Sub2', 'required');
        $this->form_validation->set_rules('sub3', 'Sub3', 'required');
        $this->form_validation->set_rules('sub4', 'Sub4', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('manage/subjects', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $sub = $this->input->post('sub1');
            $sub .= strval($this->input->post('sub2'));
            $sub .= strval($this->input->post('sub3'));
            $sub .= $this->input->post('sub4');

            $subjects = [
                'sub_ID' => $sub,
                'title' => $this->input->post('title'),
                'course_ID' => '-',
                'description' => $this->input->post('desc'),
            ];
            $this->db->insert('subjects', $subjects);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Subjects has been added successfully!</div>');
            redirect('manage');
        }
    }

    public function courses()
    {
        $data['title'] = 'Courses';
        $data['courses'] = $this->db->get('courses')->result_array();

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('manage/courses', $data);
        $this->load->view('admin/admin_footer');
    }

    public function schedules()
    {
        $data['title'] = 'Schedules';
        $data['schedules'] = $this->db->get('schedules')->result_array();

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('manage/schedules', $data);
        $this->load->view('admin/admin_footer');
    }

    // Function for Edit Item //
    public function editMenu($m)
    {
        $data['title'] = "Edit Menu";
        $data['menu_choose'] = $this->db->get_where('user_menu', ['id' => $m])->result_array();

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('manage/edit_menu', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $this->changeMenu();
        }
    }

    public function changeMenu()
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');
        $icon = $this->input->post('icon');

        $this->db->set('menu', $menu);
        $this->db->set('icon', $icon);
        $this->db->where('id', $id);
        $this->db->update('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been changed successfully.</div>');
        redirect('manage');
    }

    public function editSubmenu($sm)
    {
        $data['title'] = "Edit Sub Menu";
        $data['submenu_choose'] = $this->db->get_where('user_sub_menu', ['id' => $sm])->result_array();

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('manage/edit_submenu', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $this->changeSubmenu();
        }
    }

    public function changeSubmenu()
    {
        $id = $this->input->post('id');
        $menuid = $this->input->post('menu_id');
        $title = $this->input->post('title');
        $url = $this->input->post('url');

        $this->db->set('menu_id', $menuid);
        $this->db->set('title', $title);
        $this->db->set('url', $url);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu has been changed successfully.</div>');
        redirect('manage');
    }

    public function editRole($sm)
    {
        $data['title'] = "Edit Sub Menu";
        $data['role_choose'] = $this->db->get_where('user_role', ['id' => $sm])->result_array();

        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_sidebar', $data);
            $this->load->view('admin/admin_topbar', $data);
            $this->load->view('manage/edit_role', $data);
            $this->load->view('admin/admin_footer');
        } else {
            $this->changeRole();
        }
    }

    public function changeRole()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role');

        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been changed successfully.</div>');
        redirect('manage');
    }

    public function roleaccess($id)
    {
        $data['title'] = 'Role Access';
        $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // This Model is used to find out which "User Session" is currently active //
        $this->load->model('Table_model', 'table');
        $data['users'] = $this->table->getUserFull();

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/admin_sidebar', $data);
        $this->load->view('admin/admin_topbar', $data);
        $this->load->view('manage/role-access', $data);
        $this->load->view('admin/admin_footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access has been changed!</div>');
    }

    // Function for Delete Item //
    public function deleteMenu($id)
    {
        $this->db->get('user_menu')->result_array();

        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been deleted!</div>');
        redirect('manage');
    }

    public function deleteSubMenu($id)
    {
        $this->db->get('user_menu')->result_array();

        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu has been deleted!</div>');
        redirect('manage');
    }

    public function deleteRole($id)
    {
        $this->db->get('user_role')->result_array();

        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been deleted!</div>');
        redirect('manage');
    }

    public function deleteSubjects($id)
    {
        $this->db->get('subjects')->result_array();

        $this->db->where('sub_ID', $id);
        $this->db->delete('subjects');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Subjects has been deleted!</div>');
        redirect('manage');
    }

    public function deleteCourses($id)
    {
        $this->db->get('courses')->result_array();

        $this->db->where('course_ID', $id);
        $this->db->delete('courses');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Course has been deleted!</div>');
        redirect('manage');
    }
}
