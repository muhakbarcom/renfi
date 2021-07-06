<!DOCTYPE html>
<html lang="en">
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Renfi Voucher</title>
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

  <!-- <link rel="shortcut icon" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" type="image/x-icon"> -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
  <!-- akbr custom -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/akbr_custom.css">
</head>

<body>
  <div id="auth">

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12 mx-auto">
          <div class="card pt-4">
            <div class="card-body">
              <div class="text-center mb-5">
                <img src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" height="48" class='mb-4'>
                <h3><?= "{$setting_aplikasi->nama}"; ?></h3>
              </div>
              <p>Selamat menikmati jaringan Renfi ^_^</p>
              <?= $this->session->flashdata('success'); ?>
              <?php echo form_open("login_voucher/logout"); ?>
              <div class="form-group">
                Sisa Waktu :<h4 id="demo"></h4>
                <b>Nama : <?= $this->session->nama; ?> </b> <br>
                Status : <?= $this->session->status; ?><br><br>
              </div>
              <div class='form-check clearfix my-4'>
                <div class="checkbox float-left">
                </div>
              </div>
              <div class="clearfix">
                <button class="btn btn-primary float-right" type="submit">Logout</button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  <!-- Display the countdown timer in an element -->

  <?php $masa_aktif = $this->session->masa_aktif;
  var_dump($masa_aktif);
  ?>

  <script>
    // Set a valid end date
    var masa_aktif = '<?php echo $masa_aktif; ?>';
    var countDownDate = new Date(masa_aktif).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the countdown date
      var distance = countDownDate - now;

      // Calculate Remaining Time
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + " Hari : " + hours + " Jam : " +
        minutes + " Menit : " + seconds + "s ";

      // If the countdown is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
  </script>

  <script src="<?= base_url(); ?>assets/js/feather-icons/feather.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/app.js"></script>

  <script src="<?= base_url(); ?>assets/js/main.js"></script>
  <script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>

  <script>
    // sweetallert
    <?php
    if (isset($this->session->success)) { ?>
      alertify.set('notifier', 'position', 'center');
      Swal.fire(
        'Good Job!',
        '<?= $this->session->success; ?>',
        'success'
      )

    <?php } elseif (isset($this->session->error)) { ?>
      alertify.set('notifier', 'position', 'center');
      Swal.fire(
        'Oopss!',
        '<?= $this->session->error; ?>',
        'error'
      )
    <?php } ?>
  </script>
</body>

</html>