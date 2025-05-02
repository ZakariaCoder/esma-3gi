<div class="welcome-section">
  <h1>Bienvenue sur <?php echo $_settings->info('name') ?></h1>
  <p>Gérez vos réservations d'espaces de coworking, vos installations et vos clients en un seul endroit.</p>
</div>
<style>
  #cover_img_dash{
    width:100%;
    max-height:50vh;
    object-fit:cover;
    object-position:bottom center;
  }
</style>
<h2 class="section-title">Statistiques du <span>Tableau de Bord</span></h2>
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-copyright"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total des Catégories</span>
                <span class="info-box-number">
                  <?php 
                    $inv = $conn->query("SELECT count(id) as total FROM category_list where delete_flag = 0 ")->fetch_assoc()['total'];
                    echo number_format($inv);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-door-closed"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total des Espaces</span>
                <span class="info-box-number">
                  <?php 
                    $inv = $conn->query("SELECT count(id) as total FROM facility_list where delete_flag = 0 ")->fetch_assoc()['total'];
                    echo number_format($inv);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Clients Inscrits</span>
                <span class="info-box-number">
                  <?php 
                    $mechanics = $conn->query("SELECT sum(id) as total FROM `client_list` where delete_flag = 0 ")->fetch_assoc()['total'];
                    echo number_format($mechanics);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="shadow info-box mb-3">
              <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Réservations en Attente</span>
                <span class="info-box-number">
                <?php 
                    $services = $conn->query("SELECT COUNT(id) as total FROM `booking_list` WHERE status = 0")->fetch_assoc()['total'];
                    echo number_format($services ?? 0);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <hr>
    <section class="mt-4">
      <h2 class="section-title">Aperçu du <span>Système</span></h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="title-wrapper">
                <span class="feature-icon">📊</span>
                <h3 class="card-title">Gestion du Tableau de Bord</h3>
              </div>
              <p class="text-gray-600">Surveillez les réservations, suivez l'utilisation des installations et consultez les statistiques des clients en un seul endroit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="title-wrapper">
                <span class="feature-icon">🔧</span>
                <h3 class="card-title">Configuration du Système</h3>
              </div>
              <p class="text-gray-600">Personnalisez les paramètres du système, gérez les catégories et contrôlez les niveaux d'accès des utilisateurs.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="title-wrapper">
                <span class="feature-icon">📱</span>
                <h3 class="card-title">Gestion des Clients</h3>
              </div>
              <p class="text-gray-600">Consultez et gérez les comptes clients, les réservations et la communication dans une interface simplifiée.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="mt-4">
      <h2 class="section-title">Coworking <span>Spaces</span></h2>
      <div class="card">
        <div class="card-body p-0">
          <img src="<?= validate_image($_settings->info('cover')) ?>" alt="System Cover" class="w-100 img-fluid" id="cover_img_dash">
        </div>
      </div>
    </section>
