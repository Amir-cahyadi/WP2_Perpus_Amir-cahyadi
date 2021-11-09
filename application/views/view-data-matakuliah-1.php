<html>

<head>
  <title>Tampil Data Matakuliah</title>
</head>

<body>
  <center>
    <table>
      <tr>
        <th colspan="3">
          Tampil Data Mata Kuliah1
        </th>
      </tr>
      <tr>
        <td colspan="3">
          <hr>
        </td>
      </tr>
      <tr>
        <th>Kode MTK</th>
        <th>:</th>
        <td>
          <!-- pengaksesan $data dari form mata kuliah -->
          <?= $kode; ?>
        </td>
      </tr>
      <tr>
        <td>Nama MTK</td>
        <td>:</td>
        <td>
          <!-- pengaksesan $data dari form mata kuliah -->
          <?= $nama; ?>
        </td>
      </tr>
      <tr>
        <td>SKS</td>
        <td>:</td>
        <td>
          <!-- pengaksesan $data dari form mata kuliah -->
          <?= $sks; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <!-- untuk kembali ke view-form-matalkuliah -->
          <a href="<?= base_url('Matakuliah1'); ?>">Kembali</a>
        </td>
      </tr>
    </table>
  </center>
</body>

</html>