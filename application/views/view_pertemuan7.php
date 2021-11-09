<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas-6 Form Input Matakuliah </title>
</head>
<style>
  body {
    height: 100vh;
    font-family: sans-serif;
  }

  .container {
    display: flex;
    height: 100vh;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .form {
    border: 1px solid red;
    padding: 30px;
    background: #80bfff;
    border-radius: 5px;
  }


  h2 {
    text-align: center;
    margin: 10px 0 30px 0;
    text-decoration: underline;
  }

  p {
    margin: 20px auto;
  }

  label {
    float: left;
    width: 120px;
  }

  input {
    outline: none;
    border: 1px solid red;
    border-radius: 3px;
  }

  select {
    outline: none;
    border: 1px solid red;
    border-radius: 3px;
  }

  input[type=submit] {
    outline: none;
    margin: 15px 0;
    padding: 3px 10px;
    background: white;
    transition: 0.2s ease-in-out;
  }

  input[type=submit]:hover {
    background: violet;
    color: white;
  }

  .error {
    color: red;
    margin: 10px;
    width: 350px;
  }
</style>
<?php
$a_sepatu = array(
  "375000" => "Nike",
  "300000" => "Adidas",
  "250000" => "Kickers",
  "275000" => "Eiger",
  "400000" => "Bucherri",
);
?>

<body>
  <div class="container">
    <div class="error">
      <?php echo validation_errors('<div class="error">', '</div>');  ?>
    </div>

    <div class="form">
      <!-- tindakannya = panggil fungsi cetak di controler pertemuan 7 -->
      <form autocomplete="off" action="<?= base_url('Pertemuan7/cetak'); ?>" method="post">
        <h2>Form input transaksi</h2>
        <!-- nama -->
        <!-- <div class="error">
          <?/* php echo form_error('nama')*/?>
          <?/* php echo form_error('notel'*/) ?> 
        </div> -->
        <p>
          <label for="nama">Nama :</label>
          <input type="text" name="nama" id="nama">
        </p>
        <!-- notel -->
        <p>
          <label for="notel">No-Tel :</label>
          <input type="text" name="notel" id="notel">
        </p>
        <!-- select sepatu -->
        <p>
          <label for="sepatu">Merek-Sepatu :</label>
          <select name="sepatu" id="sepatu">
            <?php
            foreach ($a_sepatu as $key => $value) {
              echo "<option value=\"{$key}\">{$value}</option>";
            }
            ?>
          </select>
        </p>
        <p>
          <!-- select ukuran -->
          <label for="ukuran">Ukuran :</label>
          <select name="ukuran" id="ukuran">
            <?php
            for ($i = 32; $i <= 44; $i++) {
              echo "<option value=\"{$i}\">{$i}</option>";
            }
            ?>
          </select>
        </p>
        <!-- submit -->
        <input type="submit" value="submit">
      </form>
    </div>
  </div>
</body>

</html>