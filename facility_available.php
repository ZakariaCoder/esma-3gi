 <!-- Link to Facility CSS -->
<link rel="stylesheet" href="<?php echo base_url ?>assets/css/facility.css">
<link rel="stylesheet" href="<?php echo base_url ?>assets/css/footer.css">

<!-- Hero Section -->
<section class="facility-hero">
    <div class="facility-hero-content">
        <h1>Nos Espaces de Coworking</h1>
        <p>Découvrez et réservez l'espace idéal pour vos besoins professionnels</p>
    </div>
</section>

<!-- Search Section -->
<section class="search-section">
    <div class="container">
        <div class="search-container">
            <div class="search-box">
                <input type="search" id="search" class="search-input" placeholder="Rechercher un espace...">
                <button class="search-button">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Espaces Disponibles</h2>
        
        <div class="facilities-grid" id="facility_list">
            <?php 
            $facilities = $conn->query("SELECT f.*, c.name as category FROM `facility_list` f inner join category_list c on f.category_id = c.id where f.delete_flag = 0 order by f.`facility_code`");
            while($row = $facilities->fetch_assoc()):
            ?>
            <a class="facility-card item" href="./?p=view_facility&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">
                <div class="facility-image-container">
                    <span class="facility-category"><?php echo $row['category'] ?></span>
                    <img src="<?= validate_image($row['image_path']) ?>" alt="<?php echo $row['name'] ?>" class="facility-image">
                </div>
                <div class="facility-content">
                    <h3 class="facility-title"><?php echo $row['name'] ?></h3>
                    <p class="facility-description"><?= strip_tags(html_entity_decode($row['description'])) ?></p>
                    <div class="facility-meta">
                        <?php if(isset($row['price']) && !empty($row['price'])): ?>
                        <div class="facility-price"><?php echo number_format($row['price'], 2) ?> DH</div>
                        <?php else: ?>
                        <div class="facility-price">Sur demande</div>
                        <?php endif; ?>
                        <button class="facility-button">Réserver</button>
                    </div>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
        
        <div id="noResult" style="display:none" class="no-results">
            <i class="fa fa-search fa-3x mb-3" style="color: #ddd;"></i>
            <h3>Aucun résultat trouvé</h3>
            <p>Essayez d'autres termes de recherche</p>
        </div>
    </div>
</section>

<script>
    $(function(){
        $('#search').on('input',function(){
            var _search = $(this).val().toLowerCase().trim()
            $('#facility_list .item').each(function(){
                var _text = $(this).text().toLowerCase().trim()
                    _text = _text.replace(/\s+/g,' ')
                    console.log(_text)
                if((_text).includes(_search) == true){
                    $(this).toggle(true)
                }else{
                    $(this).toggle(false)
                }
            })
            if( $('#facility_list .item:visible').length > 0){
                $('#noResult').hide('slow')
            }else{
                $('#noResult').show('slow')
            }
        })
        $('#facility_list .item').hover(function(){
            $(this).find('.callout').addClass('shadow')
        })
      

    })
    $(document).scroll(function() { 
        $('#topNavBar').removeClass('bg-transparent navbar-light navbar-dark bg-gradient-light text-light')
        if($(window).scrollTop() === 0) {
           $('#topNavBar').addClass('navbar-dark bg-transparent text-light')
        }else{
           $('#topNavBar').addClass('navbar-light bg-gradient-light ')
        }
    });
    $(function(){
        $(document).trigger('scroll')
    })
</script>