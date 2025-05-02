<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT f.*, c.name as category from `facility_list` f inner join category_list c on f.category_id = c.id where f.id = '{$_GET['id']}' and f.delete_flag = 0 and f.status = 1");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=stripslashes($v);
        }
        
        // Get related facilities
        $related_qry = $conn->query("SELECT f.*, c.name as category from `facility_list` f inner join category_list c on f.category_id = c.id where f.category_id = '{$category_id}' AND f.id != '{$_GET['id']}' and f.delete_flag = 0 and f.status = 1 LIMIT 3");
    } else {
        echo "<script>alert('Espace non trouvé ou non disponible!');</script>";
        echo "<script>window.location.href='./?p=facility_available';</script>";
        exit;
    }
} else {
    echo "<script>window.location.href='./?p=facility_available';</script>";
    exit;
}
?>
<!-- Link to CSS files -->
<link rel="stylesheet" href="<?php echo base_url ?>assets/css/facility-view.css">
<link rel="stylesheet" href="<?php echo base_url ?>assets/css/footer.css">

<section class="facility-view-section">
    <div class="container">
        <div class="facility-container">
            <div class="facility-image-container">
                <img src="<?= validate_image(isset($image_path) ? $image_path : "") ?>" alt="<?= isset($name) ? $name : "Coworking Space" ?>" class="facility-img">
            </div>
            
            <div class="facility-details">
                <h1 class="facility-name"><?= isset($name) ? $name : 'Espace de Coworking' ?></h1>
                <div class="facility-category"><?= isset($category) ? $category : 'Catégorie' ?></div>
                
                <div class="facility-description">
                    <?= isset($description) ? $description : 'Description non disponible' ?>
                </div>
                
                <div class="facility-price">
                    <span class="price-label">Prix:</span>
                    <?= isset($price) ? number_format($price, 2) . ' DH' : 'Prix non disponible' ?>
                </div>
                
                <div class="facility-features">
                    <h3>Caractéristiques</h3>
                    <ul class="feature-list">
                        <li class="feature-item">Wifi haut débit</li>
                        <li class="feature-item">Espace climatisé</li>
                        <li class="feature-item">Café gratuit</li>
                        <li class="feature-item">Accès 24/7</li>
                        <li class="feature-item">Salles de réunion</li>
                        <li class="feature-item">Imprimante/Scanner</li>
                    </ul>
                </div>
                
                <button class="cta-button" id="book_now" type="button">Réserver Maintenant</button>
            </div>
        </div>
        
        <?php if($related_qry->num_rows > 0): ?>
        <div class="related-facilities">
            <h2 class="related-title">Espaces <span>Similaires</span></h2>
            <div class="related-grid">
                <?php while($row = $related_qry->fetch_assoc()): ?>
                <div class="related-card">
                    <img src="<?= validate_image($row['image_path']) ?>" alt="<?= $row['name'] ?>" class="related-img">
                    <div class="related-info">
                        <h3 class="related-name"><?= $row['name'] ?></h3>
                        <div class="related-price"><?= number_format($row['price'], 2) ?> DH</div>
                        <a href="./?p=view_facility&id=<?= $row['id'] ?>" class="related-link">Voir les détails</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
  $(function(){
    $('#book_now').click(function(){
        if("<?= $_settings->userdata('id') && $_settings->userdata('login_type') == 2 ?>" == 1)
            uni_modal("Book Facility","booking.php?fid=<?= $id ?>",'modal-sm');
        else
        location.href = './login.php';
    })
  })
</script>