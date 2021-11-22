<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
  }

  public function index()
  {
    $data['judul'] = 'Dashboard';
    // mengirim yang ingin di cek dan nilai yang ingin di cek ke model user cekdata
    $data['user'] = $this->ModelUser->cekData(['email' => $this > session->userdata('email')])->row_array();
    // mengambil 10 data dari table user di dalam database 
    $data['anggota'] = $this->ModelUser->getUserLimit() > result_array();
    // mengambil semua data buku di dalam database
    $data['buku'] = $this->ModelBuku->getBuku()->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }
}
