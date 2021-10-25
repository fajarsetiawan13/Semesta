<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sys extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function login()
	{
		if ($this->session->userdata('email')) {
			if ($this->session->userdata('role_ID') == 1) {
				redirect('admin');
			} elseif ($this->session->userdata('role_ID') == 2) {
				redirect('teacher');
			} else {
				redirect('student');
			}
		}

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email',
			[
				'required' => 'Email cannot be empty!',
				'valid_email' => 'Email not valid'
			]
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim',
			[
				'required' => 'Password cannot be empty!'
			]
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Semesta - Login Page";
			$this->load->view('templates/auth_header', $data);
			$this->load->view('sys/login');
			$this->load->view('templates/auth_footer');
		} else {
			// Successful Validation
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->load->model('Table_model', 'table');
		$users = $this->table->getUser();

		// echo '<pre>';
		// var_dump($users);
		// die;

		// Check registered account
		if ($users) {
			// Check account verification
			if ($users['is_active'] == 1) {
				// Check password
				if (password_verify($password, $users['pass'])) {
					$data = [
						'email' => $users['email'],
						'role_ID' => $users['role_ID']
					];
					$this->session->set_userdata($data);

					if ($users['role_ID'] == 1) {
						redirect('admin');
					} elseif ($users['role_ID'] == 2) {
						redirect('teacher');
					} else {
						redirect('student');
					}
				} else {
					// Invalid Password
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid Password!</div>');
					redirect('sys/login');
				}
			} else {
				// Account not verified
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account not verified!</div>');
				redirect('sys/login');
			}
		} else {
			// E-mail not registered
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">E-mail not registered!</div>');
			redirect('sys/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata['email'];
		$this->session->unset_userdata['role_ID'];
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have logged out of the system!</div>');
		redirect('sys/login');
		return true;
	}

	public function student_registration()
	{
		if ($this->session->userdata('email')) {
			if ($this->session->userdata('role_id') == 1) {
				redirect('admin');
			} elseif ($this->session->userdata('role_id') == 2) {
				redirect('teacher');
			} else {
				redirect('student');
			}
		}

		$this->form_validation->set_rules(
			'firstname',
			'Firstname',
			'required|trim',
			[
				'required' => 'Firstname cannot be empty!'
			]
		);
		$this->form_validation->set_rules(
			'lastname',
			'Lastname',
			'trim'
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[students.email]',
			[
				'required' => 'Email cannot be empty!',
				'valid_email' => 'Invalid email!',
				'is_unique' => 'Email already registered!'
			]
		);
		$this->form_validation->set_rules(
			'gender',
			'Gender',
			'required',
			[
				'required' => 'Select one!'
			]
		);
		$this->form_validation->set_rules(
			'birth',
			'Birth',
			'required',
			[
				'required' => 'Date of birth cannot be empty!'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[8]|matches[password2]',
			[
				'required' => 'Password cannot be empty!',
				'matches' => 'Password not matches!',
				'min_length' => 'Password is too short! minimum 8 characters!'
			]
		);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Semesta - Registration Page";
			$this->load->view('templates/auth_header', $data);
			$this->load->view('sys/student_registration');
			$this->load->view('templates/auth_footer');
		} else {
			$dob = date('d-m-Y', strtotime($this->input->post('birth', true)));
			$regis = [
				'teacher_ID' => '-',
				'fname' => htmlspecialchars($this->input->post('firstname', true)),
				'lname' => htmlspecialchars($this->input->post('lastname', true)),
				'gender' => htmlspecialchars($this->input->post('gender', true)),
				'birth' => date('Y-m-d', strtotime($this->input->post('birth', true))),
				'image' => 'default.png',
				'address' => '-',
				'email' => htmlspecialchars($this->input->post('email', true)),
				'pass' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_ID' => 3,
				'is_active' => 0
			];

			$this->db->insert('students', $regis);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registration Successful! Please wait for account verification.</div>');
			redirect('sys/login');
		}
	}

	public function teacher_registration()
	{
		if ($this->session->userdata('email')) {
			if ($this->session->userdata('role_id') == 1) {
				redirect('admin');
			} elseif ($this->session->userdata('role_id') == 2) {
				redirect('teacher');
			} else {
				redirect('student');
			}
		}

		$this->form_validation->set_rules(
			'firstname',
			'Firstname',
			'required|trim',
			[
				'required' => 'Firstname cannot be empty!'
			]
		);
		$this->form_validation->set_rules(
			'lastname',
			'Lastname',
			'trim'
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[teachers.email]',
			[
				'required' => 'Email cannot be empty!',
				'valid_email' => 'Invalid email!',
				'is_unique' => 'Email already registered!'
			]
		);
		$this->form_validation->set_rules(
			'gender',
			'Gender',
			'required',
			[
				'required' => 'Select one!'
			]
		);
		$this->form_validation->set_rules(
			'birth',
			'Birth',
			'required',
			[
				'required' => 'Date of birth cannot be empty!'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[8]|matches[password2]',
			[
				'required' => 'Password cannot be empty!',
				'matches' => 'Password not matches!',
				'min_length' => 'Password is too short! minimum 8 characters!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Semesta - Registration Page";
			$this->load->view('templates/auth_header', $data);
			$this->load->view('sys/teacher_registration');
			$this->load->view('templates/auth_footer');
		} else {
			$dob = date('d-m-Y', strtotime($this->input->post('birth', true)));
			$regis = [
				'teacher_ID' => '-',
				'fname' => htmlspecialchars($this->input->post('firstname', true)),
				'lname' => htmlspecialchars($this->input->post('lastname', true)),
				'gender' => htmlspecialchars($this->input->post('gender', true)),
				'birth' => date('Y-m-d', strtotime($this->input->post('birth', true))),
				'image' => 'default.png',
				'address' => '-',
				'email' => htmlspecialchars($this->input->post('email', true)),
				'pass' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_ID' => 2,
				'is_active' => 0
			];

			$this->db->insert('teachers', $regis);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registration Successful! Please wait for account verification.</div>');
			redirect('sys/login');
		}
	}

	public function blocked()
	{
		$data['title'] = "404 Not Found";
		$this->load->model('Table_model', 'table');
		$data['users'] = $this->table->getUserFull();

		$this->load->view('admin/admin_header', $data);
		$this->load->view('admin/admin_sidebar', $data);
		$this->load->view('admin/admin_topbar', $data);
		$this->load->view('sys/blocked');
		$this->load->view('admin/admin_footer');
	}
}
