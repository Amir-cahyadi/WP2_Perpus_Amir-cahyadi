<!-- folder aplication config / config.php dan autoload -->
<!-- $config['base_url'] = 'http://localhost/pustaka-booking/'; -->
<!-- $autoload['helper'] = array('url', 'file'); -->


<?php
class Matakuliah1 extends CI_Controller
{

    public function index()
    {
        // halaman utama ketika di panggil controler matakuliah-1
        $this->load->view('view-form-matakuliah-1');
    }

    public function cetak()
    {
        // fungsi cetak form validation ini atur peraturan (name input,name input dari file,hapus sepasi atau di haruskan atau panjang minimal 5 maksimal 12)
        $this->form_validation->set_rules('kode', 'kode Matakuliah-1', 'trim|required|min_length[5]|max_length[12]', [
            'required' => 'Kode mata kuliah harus di isi',
            'min_lenght' => 'Kode terlalu pendek',
            'max_length' => 'Lebih daru 12 charackter'
        ]);

        $this->form_validation->set_rules('nama', 'nama Matakuliah-1', 'trim|required|min_length[5]|max_length[12]', [
            'required' => 'Nama mata kuliah harus di isi',
            'min_lenght' => 'Nama terlalu pendek',
            'max_length' => 'Lebih daru 12 charackter'
        ]);
        // jika form validation ini berjalan tidak benar (salah) 
        // ini load kembali view form matakulia-1
        if ($this->form_validation->run() != true) {
            $this->load->view('view-form-matakuliah-1');
        } else {
            /* yang lainya 
            $data 
            = kode = query string kode
            = nama = query string nama
            = sks = query string sks
            */
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'sks' => $this->input->post('sks'),
            ];
            // load ini ke view data matakuliah 1 , variable/array data
            $this->load->view('view-data-matakuliah-1', $data);
        };
    }
}
