<!doctype html>
<html lang="en">
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Cetak</title>
</head>

<body>
  <div class="card" style="width: 28rem;">

    <div class="row">
      <div class="col-md-5"> <img class="img-thumbnail mt-3 ml-3" src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>"" alt=" Card image cap"></div>
      <div class="col-md-7">
        <div class="card-body">
          <h5 class="card-title">RENFI WIFI</h5>
          <h6 class="card-title">Username : <?= $username; ?></h6>
          <h6 class="card-title">password : <?= $password; ?></h6>
          <p class="card-text">Silahkan masukan username dan password ke http://localhost/renfi/</p>
          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
      </div>
    </div>


  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<script>
  window.print();
</script>