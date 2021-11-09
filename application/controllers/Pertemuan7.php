<?php
class Pertemuan7 extends CI_Controller
{
  // set pertama x muncul
  public function index()
  {

    $this->load->view('view_pertemuan7');
  }

  public function cetak()
  {
    $this->form_validation->set_rules('nama', 'nama Pertemuan7', 'trim|required|min_length[4]', [
      'required' => 'Nama harus di isi',
    ]);

    $this->form_validation->set_rules('notel', 'notel Pertemuan7', 'trim|required|min_length[4]', [
      'required' => 'Notel harus di isi',
    ]);
    // jika form validation ini jalanya tidak benar (salah)
    if ($this->form_validation->run() != true) {
      // load ke view pertemuan 7 (awal)
      $this->load->view('view_pertemuan7');
    } else {
      // jika benar var $nama = query string hasil inputan nama.... dst
      $data = [
        'nama' => $this->input->post('nama'),
        'notel' => $this->input->post('notel'),
        'sepatu' => $this->input->post('sepatu'),
        'ukuran' => $this->input->post('ukuran')
      ];
      // setelah selesai kirimkan $data yang berisi array, pertemuan 7
      $this->load->view('view_data_pertemuan7', $data);
    }
  }
}
