<?php
class Web extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['judul'] = 'Halaman Depan';
    $this->load->view('v_header', $data);
    $this->load->view('v_index', $data);
    $this->load->view('v_footer', $data);
  }

  // Mengganti index denga about
  public function about()
  {
    $data['judul'] = 'Halaman About';
    $this->load->view('v_header', $data);
    $this->load->view('v_about', $data);
    $this->load->view('v_footer', $data);
  }
}