<?php

class Autentifikasi extends CI_Controller
{
  public function index()
  {
    // jika statusnya sudah login, maka tidak bisa mengakses halaman login (Alias di kembalikan ke tampilan user)
    // mengeset session
    // 	$this->session->set_userdata('nama_session', 'nilai_session');
    // mengecek apakah session ada jika ada redirect ke user/admin, jika tidak masuk ke form
    if ($this->session->userdata('email')) {
      redirect('user');
    }

    // form validation ini atur peraturan
    $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
      'required' => 'Email Harus Di isi !!',
      'valid_email' => 'Email Tidak Benar',
    ]);
    // form validation ini atur peraturan
    $this->form_validation->set_rules('password', 'Password', 'required|trim', [
      'required' => 'Password Harus di isi',
    ]);

    // jika form validation tidak berjalan 
    if ($this->form_validation->run() == false) {
      // set variable data dengan array judul = login dan kosongkan data user (aute_header)
      $data['judul'] = 'Login';
      $data['user'] = '';
      // kata 'Login' merupakan nilai dari variable judul dalam array $data dan di kirimkan ke view aute_header
      // kembali ke form dan kirimkan $data berisi data di atas
      $this->load->view('templates/aute_header', $data);
      $this->load->view('autentifikasi/login');
      $this->load->view('templates/aute_footer');
      // jika form berjalan jalankan fungsi login
    } else {
      $this->_login();
    }
  }
  // fungsi login
  private function _login()
  {
    $email = htmlspecialchars($this->input->post('email', true));
    $password = $this->input->post('password', true);
    $user = $this->ModelUser->cekData(['email' => $email]) > row_array();
    //jika usernya ada
    if ($user) {
      //jika user sudah aktif
      if ($user['is_active'] == 1) {
        //cekpassword
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];

          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            if ($user['image'] == 'default.jpg') {
              $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>'
              );
            }
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
          redirect('autentifikasi');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
        redirect('autentifikasi');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
      redirect('autentifikasi');
    }
  }
}
