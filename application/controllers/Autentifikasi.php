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
    // menghapus html entiti di hasil inputan email dan pass
    $email = htmlspecialchars($this->input->post('email', true));
    $password = $this->input->post('password', true);
    // cekdata di table user dengan kondisi email = hasil inputan email
    $user = $this->ModelUser->cekData(['email' => $email]) > row_array();
    //jika usernya ada
    if ($user) {
      //jika user sudah aktif berisi angka 1
      if ($user['is_active'] == 1) {
        //cekpassword jika password hasil inputan cocok dengan hasil cek data $user
        if (password_verify($password, $user['password'])) {
          // set $ data (email dan role id) dengan hasil pencarian cekdata $user
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          // membuat session dengan hasil inputan $data di atas
          $this->session->set_userdata($data);
          // dan setelah di cek role idnya (ceknya di atas) jika hasilnya 1 ke halaman admin
          if ($user['role_id'] == 1) {
            redirect('admin');
            // yang lainya jika hasil cek $user[image] gambarnya == default jpg
            // tampilkan pesan silahkan ubah profile dsb dan ke halaman user
          } else {
            if ($user['image'] == 'default.jpg') {
              $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>'
              );
            }
            redirect('user');
          }
          // ini berhubungan dengan if pass verify (jika hasil inputan tidak cocok) maka tampilkan pesan pass salah
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
          redirect('autentifikasi');
        }
        // ini berhuhungan dengan $user[is_active] jika user aktif tidak = 1 tampilkan pesan user belum di aktivasi
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
        redirect('autentifikasi');
      }
      // ini berhubungan dengan if($user) jika user tidak ada tampilkan pesan email tak terdaftar kembali ke autentifikasi
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
      redirect('autentifikasi');
    }
  }

  public function registrasi()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }
    //membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan 
    //bahasa sendiri yaitu 'Nama Belum diisi'
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', ['required' => 'Nama Belum diis!!']);
    //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
    //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri 
    //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
    //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
    //maka pesannya 'Email Sudah dipakai'
    $this->form_validation->set_rules(
      'email',
      'Alamat Email',
      'required|trim|valid_email|is_unique[user.email]',
      [
        'valid_email' => 'Email Tidak Benar!!',
        'required' => 'Email Belum diisi!!',
        'is_unique' => 'Email Sudah Terdaftar!'
      ]
    );
    //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
    //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan  
    //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
    //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah 
    //'Password Terlalu Pendek'.
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[3]|matches[password2]',
      [
        'matches' => 'Password Tidak Sama!!',
        'min_length' => 'Password Terlalu Pendek'
      ]
    );
    $this->form_validation->set_rules('password2', 'Repeat
        Password', 'required|trim|matches[password1]');
    //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
    //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
    //diinput akan disimpan ke dalam tabel user
    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Registrasi Member';
      $this->load->view('templates/aute_header', $data);
      $this->load->view('autentifikasi/registrasi');
      $this->load->view('templates/aute_footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'nama' => htmlspecialchars($this->input > post('nama', true)),
        'email' => htmlspecialchars($email), 'image' => 'default.jpg',
        'password' => password_hash($this->input > post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2, 'is_active' => 0, 'tanggal_input' => time()
      ];
      $this->ModelUser->simpanData($data);
      //menggunakan model
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
      redirect('autentifikasi');
    }
  }
}
