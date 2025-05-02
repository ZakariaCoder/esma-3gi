<?php
// Only start session if not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
  img#user_avatar {
    width: 2em;
    height: 2em;
    object-fit: cover;
    object-position: center center;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-gradient-light fixed-top" id="topNavBar">
  <div class="container px-4 px-lg-5">
    <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <a class="navbar-brand" href="./">
      <img src="uploads/system-logo.png" width="220px" padding-right="15px" class="d-inline-block align-top" alt="ESMA" loading="lazy">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        <li class="nav-item"><a class="nav-link <?= isset($page) && $page == 'home'? "active" : '' ?>" aria-current="page" href="./">Accueil</a></li>
        <li class="nav-item"><a class="nav-link <?= isset($page) && $page == 'facility_available'? "active" : '' ?>" href="./?p=facility_available">Espaces</a></li>
        <li class="nav-item"><a class="nav-link <?= isset($page) && $page == 'about'? "active" : '' ?>" href="./?p=about">À Propos</a></li>
      </ul>
    </div>
    
    <!-- User Authentication Section -->
    <div class="user-auth-section">
      <?php
      // Debug info (hidden)
      if(isset($debug_mode) && $debug_mode): ?>
      <div style="position:fixed; top:50px; right:0; background:rgba(0,0,0,0.7); color:white; padding:10px; z-index:9999; font-size:12px;">
        <h5>TopNav Debug</h5>
        <pre style="color:#eee;">
        Session ID: <?= session_id() ?>
        User ID: <?= isset($_SESSION['userdata']['id']) ? $_SESSION['userdata']['id'] : 'Not set' ?>
        Login Type: <?= isset($_SESSION['userdata']['login_type']) ? $_SESSION['userdata']['login_type'] : 'Not set' ?>
        </pre>
      </div>
      <?php endif; ?>
      
      <?php
      // Check if user is logged in
      $is_logged_in = false;
      $user_id = 0;
      $login_type = 0;
      $firstname = '';
      $image_path = '';
      
      if(isset($_SESSION['userdata'])) {
        $user_id = isset($_SESSION['userdata']['id']) ? $_SESSION['userdata']['id'] : 0;
        $login_type = isset($_SESSION['userdata']['login_type']) ? $_SESSION['userdata']['login_type'] : 0;
        $firstname = isset($_SESSION['userdata']['firstname']) ? $_SESSION['userdata']['firstname'] : '';
        $image_path = isset($_SESSION['userdata']['image_path']) ? $_SESSION['userdata']['image_path'] : '';
        
        if($user_id > 0 && $login_type == 2) {
          $is_logged_in = true;
        }
      }
      
      if($is_logged_in): ?>
        <!-- User is logged in - show avatar and dropdown -->
        <div class="d-flex align-items-end">
          <div class="navbar-nav nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span><img src="<?= validate_image($image_path) ?>" alt="user_avatar" id="user_avatar" class="img-fluid img-thumbnail rounded-circle border-dark"></span> 
              Bonjour, <?= $firstname ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./?p=booking_list">Mes Réservations</a>
              <a class="dropdown-item" href="./?p=manage_account">Gérer le Compte</a>
              <a class="dropdown-item" href="./classes/Login.php?f=logout_client">Déconnexion</a>
            </div>
          </div>
        </div>
      <?php else: ?>
        <!-- User is not logged in - show login links -->
        <a href="./login.php" class="text-reset text-decoration-none mx-2"><b>Connexion</b></a> | 
        <a href="./register.php" class="text-reset text-decoration-none mx-2"><b>S'inscrire</b></a> | 
        <a href="./admin/login.php" class="text-reset text-decoration-none mx-2"><b>Admin</b></a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
      $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
      if($('body').offset.top == 0)
        $('#mainNav').removeClass('navbar-shrink')
    })
    
    $('#search-form').submit(function(e){
    e.preventDefault()
     var sTxt = $('[name="search"]').val()
     if(sTxt != '')
      location.href = './?p=products&search='+sTxt;
  })
</script>