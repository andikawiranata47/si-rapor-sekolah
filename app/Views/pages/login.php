<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $judul; ?></title>
  <!-- plugins:css -->
  <!-- <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <!-- <link rel="stylesheet" href="../../assets/css/style.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
  <!-- End layout styles -->
  <!-- <link rel="shortcut icon" href="../../assets/images/favicon.png" /> -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller" >
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth" style="background: url('/assets/images/dashboard/img_6.jpg'); background-size: cover;">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="../../assets/images/logo-dark.svg">
              </div>
              <!-- <h4>Silakan Login untuk Masuk ke dalam Sistem</h4> -->
              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
              <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('pesan') ?></div>
              <?php endif; ?>
              <form class="pt-3" action="/login/auth" method="post">
                <div class="form-group">
                  <!-- <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username"> -->
                  <label for="InputForEmail" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                </div>
                <div class="form-group">
                  <!-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> -->
                  <label for="InputForPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="InputForPassword">
                  <div class="form-check float-right">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" onclick="myFunction()" hidden>
                    <label class="form-check-label" for="flexCheckChecked" onclick="myFunction2()">
                      <div id="lihat" class="" style="cursor: pointer;">Lihat Password</div>
                    </label>
                  </div>
                </div>
                <div class="mt-5">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a> -->
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <!-- <script src="../../assets/vendors/js/vendor.bundle.base.js"></script> -->
  <script src="<?php echo base_url(); ?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!-- <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script> -->
  <script src="<?php echo base_url(); ?>/assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/misc.js"></script>
  <!-- endinject -->
</body>

<script>
  function myFunction() {
    var x = document.getElementById("InputForPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function myFunction2() {
    var x = document.getElementById("lihat");
    x.classList.toggle("text-primary");
  }
</script>

</html>