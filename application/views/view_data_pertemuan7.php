<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Data Pertemuan-7</title>
</head>
<style>
  body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .container {
    width: 600px;
    padding: 10px 80px 30px;
    background-color: white;
    margin: 20px auto;
    box-shadow: 1px 0px 10px, -1px 0px 10px;
  }

  h1 {
    font-size: 25px;
    text-decoration: underline;
    text-align: center;
    font-family: Cambria, "Times New Roman", serif;
  }

  table {
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px black solid;
    width: 100%
  }


  th,
  td {
    padding: 8px 10px;
    border: 1px black solid;
    text-align: center;
  }


  .kembali {
    margin: 10px 0;
  }

  .kembali a {
    text-decoration: none;
    padding: 2px 5px;
    border: 1px solid blueviolet;
    transition: 0.2s ease-in-out;
    border-radius: 3px;
  }

  .kembali a:hover {
    background: violet;
    color: white;
  }
</style>

<?php
$a_merek = array(
  "375000" => "Nike",
  "300000" => "Adidas",
  "250000" => "Kickers",
  "275000" => "Eiger",
  "400000" => "Bucherri",
);
?>

<body>
  <div class="container">
    <table>
      <h1>Hasil Form Pertemuan-6 </h1>
      <tr>
        <th>Nama</th>
        <th>Nomor-Telpon</th>
        <th>Harga</th>
        <th>Merek Sepatu</th>
        <th>Ukuran</th>
      </tr>
      <tr>
        <td>
          <?php echo $nama; ?>
        </td>
        <td>
          <?php echo $notel; ?>
        </td>
        <td>
          <?php echo 'Rp' . " " . $sepatu; ?>
        </td>
        <td>
          <?php echo $a_merek[$sepatu] ?>
        </td>
        <td>
          <?php echo $ukuran; ?>
        </td>
      </tr>

    </table>
    <div class="kembali">
      <a href="<?= base_url('Pertemuan7'); ?>">Kembali</a>
    </div>
  </div>
</body>

</html>