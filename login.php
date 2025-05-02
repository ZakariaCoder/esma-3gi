<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <style>
      body{
          width:calc(100%);
          height:calc(100%);
          background-image:url('<?= validate_image($_settings->info('cover')) ?>');
          background-repeat: no-repeat;
          background-size:cover;
      }
      #logo-img{
          width:15em;
          height:15em;
          object-fit:scale-down;
          object-position:center center;
          background-color: transparent;
          backdrop-filter: brightness(0.5);
      }
      .login-box {
          width: 400px;
          margin: 0 auto;
      }
      .card-outline.card-primary {
          border-top: 3px solid var(--brand-orange);
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
          border-radius: 10px;
      }
      .btn-primary {
          background: linear-gradient(135deg, #ff8800, #ff5500) !important;
          border: none !important;
          border-radius: 30px !important;
          padding: 8px 15px !important;
          font-weight: 600 !important;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          transition: all 0.3s ease;
          box-shadow: 0 4px 10px rgba(255, 136, 0, 0.3);
      }
      .btn-primary:hover {
          background: linear-gradient(135deg, #ff5500, #ff8800) !important;
          transform: translateY(-2px);
          box-shadow: 0 6px 15px rgba(255, 136, 0, 0.4);
      }
      .btn-block {
          display: block;
          width: 100%;
      }
      a {
          color: #ff7700;
          transition: color 0.2s ease;
      }
      a:hover {
          color: #ff5500;
          text-decoration: none;
      }
      button[type="submit"] {
        font-size: 16px;
        font-weight: 600 !important;
      }
  </style>
<div class="login-box">
<?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
     <?php if($_settings->chk_flashdata('success')): ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
      </script>
    <?php endif;?>
  <!-- /.login-logo -->
  <center><img src="uploads/system-logo.png" alt="System Logo" class="img-thumbnail rounded-circle" id="logo-img"></center>
  <div class="clear-fix my-2"></div>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1 text-decoration-none"><b>Connexion</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez-vous pour commencer votre session</p>

      <form id="clogin-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" autofocus placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-6">
            <a href="<?php echo base_url ?>">Retour au site</a>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12 text-center">
             <a href="<?php echo base_url.'register.php' ?>">Créer un compte</a>
            </div>
        </div>
      </form>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>