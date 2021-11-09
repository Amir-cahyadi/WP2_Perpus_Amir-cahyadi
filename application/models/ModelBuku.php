<?php
class ModelBuku extends CI_model
{
  public function getBuku()
  {
    // select * from buku
    return $this->db->get('buku');
  }

  public function bukuWhere($where)
  {
    // select * from buku where = ($where / kondisi yang di inginkan / di input)
    return $this->db->get_where('buku', $where);
  }

  public function simpanBuku($data = null)
  {
    // insert from buku values (array $data)
    $this->db->insert('buku', $data);
  }

  public function updateBuku($data = null, $where = null)
  {
    // update buku $data(data yang ingin di update) $where(ketika kondisi (Sesuai parameter))
    $this->db->update('buku', $data, $where);
  }

  public function hapusBuku($where = null)
  {
    // DELETE FROM buku WHERE Kondisi;
    $this->db->delete('buku', $where);
  }

  // fungsi mencari total baris di mana kondisi
  public function total($field, $where)
  {
    // select * dan tambahkan $field (parameter yang ingin di cari dan di tambahkan hasil pencarianya)
    $this->db->select_sum($field);
    // jika tidak kosong $where dan isi $where lebih besar dari 0
    if (!empty($where) && count($where) > 0) {
      // dimana $where(kondisi)
      $this->db->where($where);
      // dari table buku
      $this->db->from('buku');
      // kembalikan semua baris $field
      return $this->db->get()->row($field);
    }
    // SELECT SUM($field) WHERE = '$where' from buku
  }

  //manajemen kategori
  public function getKategori()
  {
    // select * from kategori
    return $this->db->get('kategori');
  }

  public function kategoriWhere($where)
  {
    // select * from kategori where = '$where';
    return $this->db->get_where('kategori', $where);
  }

  public function simpanKategori($data = null)
  {
    // insert into kategori values($data)
    $this->db->insert('kategori', $data);
  }

  public function hapusKategori($where = null)
  {
    // DELETE FROM kategori WHERE = '$where' 
    $this->db->delete('kategori', $where);
  }

  public function updateKategori($where = null, $data = null)
  {
    // UPDATE kategori set = 'array $data' where = '$where'; 
    $this->db->update('kategori', $data, $where);
  }
  //join
  public function joinKategoriBuku($where)
  {
    // SELECT buku.id_kategori,kategori.kategori FROM buku JOIN  kategori', 'kategori.id = buku.id_kategori where = '$where'; 
    // * SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate FROM Orders INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
    // * $this->db->where('emp_name', $name); (Produces: WHERE emp_name = 'John')
    // kembalikan hasilnya
    $this->db->select('buku.id_kategori,kategori.kategori');
    $this->db->from('buku');
    $this->db->join('kategori', 'kategori.id = buku.id_kategori');
    $this->db->where($where);
    return $this->db->get();
  }
}
