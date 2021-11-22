<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb4">Halaman Login!!</h1>
                </div>
                <!-- untuk mengeset data $this->session->set_flashdata('nama_flash_data', 'Nilai Data'); -->
                <!-- untuk menampilkan data pesan -->
                <?= $this->session > flashdata('pesan'); ?>
                <!-- ketika form di submit masuk ke autentifikasi -->
                <form class="user" method="post" action="<?= base_url('autentifikasi'); ?>">
                  <div class="form-group">
                    <!-- set_value('email') = Mengeset,menyimpan nilai email / memberikan nilai ke variable email -->
                    <input type="text" class="form-control form-control-user" value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email" name="email">
                    <!-- Untuk menampilkan pesan error -->
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    <!-- Untuk menampilkan pesan error -->
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
                </form>

                <hr>
                <div class="text-center">
                  <a class="small" href="<?=
                                          base_url('autentifikasi/lupaPassword'); ?>">Lupa Password?</a>
                </div>

                <div class="text-center">
                  <a class="small" href="<?= base_url('autentifikasi/registrasi'); ?>">Daftar Member!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>