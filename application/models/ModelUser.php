<?php
class ModelUser extends Ci_Model
{
  //Fungsi simpan data(parameter input)
  public function simpanData($data = null)
  {
    // database ini tambahkan,di table user , $data = data yang ingin di tambahkan bisa berupa array atau satuan
    $this->db->insert('user', $data);
  }
  // Fungsi cek data (Parameter kondisi)
  public function cekData($where = null)
  {
    // kembalikan hasil database ini,ketika table bernama user,dimana kondisi = parameter $where
    return $this->db->get_where('user', $where);
  }

  // Fungsi getuserwhere(Parameter yang di cari)
  public function getUserWhere($where = null)
  {
    // kembalikan hasil databese ini,ketika table bernama user,ketika kondisi $where
    return $this->db->get_where('user', $where);
  }
  // fungsi cekuseracces (parameter yang di cari)
  public function cekUserAccess($where = null)
  {
    // databaseini select/ambil segalanya
    $this->db->select('*');
    // dari access_menu
    $this->db->from('access_menu');
    // ketika kondisi
    $this->db->where('$where');
    // kembali hasil database ini
    return $this->db->get();
  }

  // fungsi getuserlimit
  public function getUserLimit()
  {
    // select / ambil semua datanya
    $this->db->select('*');
    // dari tabel user
    $this->db->from('user');
    // limit 10 dari ke 0
    $this->db->limit(10, 0);
    // kembalikan hasil pemanggilan
    $this->db->get();
  }
}

// * Contoh pemanggilan fungsi $amir = getUserWhere(parameter yang ingin di cari)