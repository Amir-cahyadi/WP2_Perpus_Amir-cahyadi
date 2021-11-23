<?php

function cek_login()
{
  $ci = get_instance();
  // jika $ci berisi nilai false / pengambilan data email pada session tampilkan pesan akses di tolak dan ke halaman autentifikasi
  if (!$ci->session->userdata('email')) {
    $ci->session->set_flashdata('pesan', '<div class="alert
alert-danger" role="alert">Akses ditolak. Anda belum login!!
</div>');
    redirect('autentifikasi ');
    // yang lainya ambil data role id di session
  } else {
    $role_id = $ci->session->userdata('role_id');
  }
}
