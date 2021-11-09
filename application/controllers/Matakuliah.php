<!-- folder aplication config / config.php dan autoload -->
<!-- $config['base_url'] = 'http://localhost/pustaka-booking/'; -->
<!-- $autoload['helper'] = array('url', 'file'); -->


<?php
class Matakuliah extends CI_Controller
{

    public function index()
    {
        // halaman utama ketika di panggil controler matakuliah
        $this->load->view('view-form-matakuliah');
    }

    public function cetak()
    {
        // mengirim data ke view-data-matakuliah ini berupa variable
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'sks' => $this->input->post('sks')
        ];
        // menampilkan data
        $this->load->view('view-data-matakuliah', $data);
    }
    /* untuk setting base_url ada di folder config/config.php ($config['base_url']) 
    dan di folder yang sama autoload.php ($autoload['helper'])
    dan di folder yang sama routes $route['default_controller'] yang ini untuk menampilkan halaman utama 
    yang line 1 dan 2 untuk setting url
    */
}
