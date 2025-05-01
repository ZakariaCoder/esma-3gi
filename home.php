<!-- Carousel Slider -->
<link rel="stylesheet" href="<?php echo base_url ?>assets/css/slider.css?v=<?php echo time(); ?>">
<div class="carousel">
    <div class="time"></div>
    <!-- list item -->
    <div class="list">
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/coworking space img1.png">
            <div class="content">
                <div class="title">ESPACE DE COWORKING</div>
                <div class="topic">SYSTÈME DE RÉSERVATION</div>
                <div class="des">
                    Trouvez et réservez votre espace de travail idéal pour des réunions, des événements ou le travail quotidien. Nos espaces de coworking offrent l'environnement parfait pour la productivité et la collaboration.
                </div>
                <div class="buttons">
                    <a href="./?p=facility_available"><button>EXPLORER LES ESPACES</button></a>
                    <a href="./?p=register"><button>S'INSCRIRE</button></a>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/Untitled design (2)img2.png">
            <div class="content">
                <div class="title">ESPACES DE TRAVAIL FLEXIBLES</div>
                <div class="topic">POUR LES PROFESSIONNELS</div>
                <div class="des">
                    Nos espaces sont conçus pour les professionnels qui ont besoin d'un environnement productif. Avec internet haut débit, salles de réunion et toutes les commodités nécessaires pour réussir.
                </div>
                <div class="buttons">
                    <a href="./?p=facility_available"><button>EXPLORER LES ESPACES</button></a>
                    <a href="./?p=about"><button>EN SAVOIR PLUS</button></a>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/Untitled design (2)Img3.png">
            <div class="content">
                <div class="title">ORIENTÉ COMMUNAUTÉ</div>
                <div class="topic">ENVIRONNEMENT COLLABORATIF</div>
                <div class="des">
                    Rejoignez une communauté de professionnels partageant les mêmes idées. Nos espaces de coworking favorisent la collaboration, le réseautage et les opportunités de croissance pour les freelances et les entreprises.
                </div>
                <div class="buttons">
                    <a href="./?p=facility_available"><button>EXPLORER LES ESPACES</button></a>
                    <a href="./?p=login"><button>CONNEXION</button></a>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/Untitled design (2)img4.png">
            <div class="content">
                <div class="title">SERVICES PREMIUM</div>
                <div class="topic">CONFORT & COMMODITÉ</div>
                <div class="des">
                    Profitez de services premium comprenant internet haut débit, mobilier confortable, salles de réunion, cafétéria et accès 24h/24 et 7j/7. Tout ce dont vous avez besoin pour une journée de travail productive.
                </div>
                <div class="buttons">
                    <a href="./?p=facility_available"><button>EXPLORER LES ESPACES</button></a>
                    <a href="./?p=about"><button>À PROPOS DE NOUS</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Next and Prev buttons -->
    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <!-- Thumbnail -->
    <div class="thumbnail">
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/coworking space img1.png">
            <div class="content">
                <div class="title">
                    ESPACE DE COWORKING
                </div>
                <div class="description">
                    Réservez votre espace idéal
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/Untitled design (2)img2.png">
            <div class="content">
                <div class="title">
                    ESPACES DE TRAVAIL FLEXIBLES
                </div>
                <div class="description">
                    Pour les professionnels
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/Untitled design (2)Img3.png">
            <div class="content">
                <div class="title">
                    ORIENTÉ COMMUNAUTÉ
                </div>
                <div class="description">
                    Environnement collaboratif
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?php echo base_url ?>assets/image/Untitled design (2)img4.png">
            <div class="content">
                <div class="title">
                    SERVICES PREMIUM
                </div>
                <div class="description">
                    Confort & commodité
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url ?>assets/js/slider.js?v=<?php echo time(); ?>"></script>
<!-- Section-->
<section class="py-5">
    <div class="container">
        <div class="card shadow card-outline card-primary rounded-0">
            <div class="card-body">
                <?php include './welcome.html' ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(function(){
        $('#search').on('input',function(){
            var _search = $(this).val().toLowerCase().trim()
            $('#service_list .item').each(function(){
                var _text = $(this).text().toLowerCase().trim()
                    _text = _text.replace(/\s+/g,' ')
                    console.log(_text)
                if((_text).includes(_search) == true){
                    $(this).toggle(true)
                }else{
                    $(this).toggle(false)
                }
            })
            if( $('#service_list .item:visible').length > 0){
                $('#noResult').hide('slow')
            }else{
                $('#noResult').show('slow')
            }
        })
        $('#service_list .item').hover(function(){
            $(this).find('.callout').addClass('shadow')
        })
        $('#service_list .view_service').click(function(){
            uni_modal("Service Details","view_service.php?id="+$(this).attr('data-id'),'mid-large')
        })
        $('#send_request').click(function(){
            uni_modal("Fill the Service Request Form","send_request.php",'large')
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