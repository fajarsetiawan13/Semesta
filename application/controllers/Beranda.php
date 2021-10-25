<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Sekolah Internasional Terbaik Semarang – Semesta Bilingual Boarding School';

        $this->load->view('templates/beranda_header', $data);
        $this->load->view('templates/beranda_navbar', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/beranda_footer');
    }

    public function kontak()
    {
        $data['title'] = 'Sekolah Internasional Terbaik Semarang – Semesta Bilingual Boarding School';

        $this->load->view('templates/beranda_header', $data);
        $this->load->view('templates/beranda_navbar', $data);
        $this->load->view('contact', $data);
        $this->load->view('templates/beranda_footer');
    }
}
