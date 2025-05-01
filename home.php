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
<!-- Add home.css for the new sections -->
<link rel="stylesheet" href="<?php echo base_url ?>assets/css/home.css?v=<?php echo time(); ?>">

<!-- Features Section -->
<section id="features" class="section-padding">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="feature-card p-6 bg-white rounded-md shadow-md">
                <i data-lucide="coffee" class="w-10 h-10 text-brand-orange mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Café à volonté</h3>
                <p class="text-gray-600">Profitez d'un café de qualité pour rester concentré tout au long de la journée.</p>
            </div>
            <div class="feature-card p-6 bg-white rounded-md shadow-md">
                <i data-lucide="wifi" class="w-10 h-10 text-brand-orange mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Internet haut débit</h3>
                <p class="text-gray-600">Bénéficiez d'une connexion internet rapide et fiable pour tous vos besoins professionnels.</p>
            </div>
            <div class="feature-card p-6 bg-white rounded-md shadow-md">
                <i data-lucide="users" class="w-10 h-10 text-brand-orange mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Salles de réunion</h3>
                <p class="text-gray-600">Réservez des salles de réunion équipées pour vos présentations et collaborations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="section-padding bg-gray-50">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-semibold heading-gradient mb-6">Nos Services</h2>
        <p class="text-lg text-gray-700 mb-8">
            Découvrez une gamme complète de services pour répondre à tous vos besoins professionnels.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-6 bg-white rounded-md shadow-md">
                <i data-lucide="monitor" class="w-10 h-10 text-brand-orange mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Bureaux Flexibles</h3>
                <p class="text-gray-600">Des espaces de travail adaptés à vos besoins, disponibles à l'heure, à la journée ou au mois.</p>
            </div>
            <div class="p-6 bg-white rounded-md shadow-md">
                <i data-lucide="mail" class="w-10 h-10 text-brand-orange mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Domiciliation d'Entreprise</h3>
                <p class="text-gray-600">Une adresse prestigieuse pour votre entreprise et la gestion de votre courrier.</p>
            </div>
            <div class="p-6 bg-white rounded-md shadow-md">
                <i data-lucide="phone" class="w-10 h-10 text-brand-orange mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Support Téléphonique</h3>
                <p class="text-gray-600">Un service de permanence téléphonique professionnel pour ne manquer aucun appel important.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="section-padding">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-semibold heading-gradient mb-6">Nos Tarifs</h2>
        <p class="text-lg text-gray-700 mb-8">
            Choisissez la formule qui correspond le mieux à votre activité et à votre budget.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="pricing-card p-6 bg-white rounded-md shadow-md">
                <h3 class="text-xl font-semibold mb-2">Forfait Découverte</h3>
                <div class="text-2xl font-bold text-brand-orange mb-4">15€ / jour</div>
                <ul class="text-gray-600 list-disc list-inside mb-4">
                    <li>Accès à l'espace de coworking</li>
                    <li>Internet haut débit</li>
                    <li>Café et thé à volonté</li>
                </ul>
                <a href="./?p=facility_available" class="btn-primary">Réserver</a>
            </div>
            <div class="pricing-card p-6 bg-white rounded-md shadow-md">
                <h3 class="text-xl font-semibold mb-2">Abonnement Mensuel</h3>
                <div class="text-2xl font-bold text-brand-orange mb-4">250€ / mois</div>
                <ul class="text-gray-600 list-disc list-inside mb-4">
                    <li>Accès illimité à l'espace de coworking</li>
                    <li>Internet haut débit</li>
                    <li>Accès aux salles de réunion (2h/mois)</li>
                </ul>
                <a href="./?p=register" class="btn-primary">S'abonner</a>
            </div>
            <div class="pricing-card p-6 bg-white rounded-md shadow-md">
                <h3 class="text-xl font-semibold mb-2">Forfait Premium</h3>
                <div class="text-2xl font-bold text-brand-orange mb-4">400€ / mois</div>
                <ul class="text-gray-600 list-disc list-inside mb-4">
                    <li>Accès illimité 24/7</li>
                    <li>Internet haut débit</li>
                    <li>Accès illimité aux salles de réunion</li>
                    <li>Domiciliation d'entreprise</li>
                </ul>
                <a href="./?p=register" class="btn-primary">Choisir</a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="section-padding bg-gray-50">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-semibold heading-gradient mb-6">Témoignages</h2>
        <p class="text-lg text-gray-700 mb-8">
            Ce que nos membres pensent de notre espace de coworking.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="testimonial-card p-6 bg-white rounded-md shadow-md">
                <p class="text-gray-600 mb-4">"Un espace de travail agréable et stimulant, idéal pour développer mon activité."</p>
                <p class="font-semibold">- Sophie, Freelance</p>
            </div>
            <div class="testimonial-card p-6 bg-white rounded-md shadow-md">
                <p class="text-gray-600 mb-4">"L'ambiance est conviviale et les services proposés sont de grande qualité."</p>
                <p class="font-semibold">- Marc, Entrepreneur</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section-padding">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <span class="text-3xl font-semibold heading-gradient mb-6">Contact</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Nous sommes là pour vous aider</h2>
            <p class="max-w-2xl mx-auto text-gray-600">
                Une question, une demande spécifique ou besoin d'un conseil personnalisé ? 
                Notre équipe est à votre disposition.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <div>
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 mb-8">
                    <h3 class="text-xl font-semibold mb-6">Informations de contact</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-brand-orange/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i data-lucide="map-pin" class="text-brand-orange" width="20" height="20"></i>
                            </div>
                            <div>
                                <p class="font-medium">Adresse</p>
                                <p class="text-gray-600">123 Avenue des Entrepreneurs, 75001 Paris, France</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-brand-orange/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i data-lucide="mail" class="text-brand-orange" width="20" height="20"></i>
                            </div>
                            <div>
                                <p class="font-medium">Email</p>
                                <p class="text-gray-600">contact@orangecoworking.fr</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-brand-orange/10 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i data-lucide="phone" class="text-brand-orange" width="20" height="20"></i>
                            </div>
                            <div>
                                <p class="font-medium">Téléphone</p>
                                <p class="text-gray-600">+33 1 23 45 67 89</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-brand-orange rounded-xl overflow-hidden h-64">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.142047744348!2d2.3354330157420694!3d48.87456857928921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e38f817b573%3A0x48d69c30470e7aeb!2sPlace+de+l&#39;Op%C3%A9ra%2C+75009+Paris!5e0!3m2!1sen!2sfr!4v1559231867617!5m2!1sen!2sfr"
                        style="border: 0; width: 100%; height: 100%;" 
                        allowfullscreen
                        loading="lazy"
                        title="Map location"
                    ></iframe>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <h3 class="text-xl font-semibold mb-6">Envoyez-nous un message</h3>
                <form id="contactForm" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="user" class="text-gray-400" width="18" height="18"></i>
                            </div>
                            <input 
                                type="text" 
                                id="name" 
                                name="name"
                                class="pl-10 block w-full rounded-md border border-gray-300 py-3 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 focus:ring-opacity-50"
                                placeholder="Votre nom"
                                required
                            />
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="text-gray-400" width="18" height="18"></i>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                class="pl-10 block w-full rounded-md border border-gray-300 py-3 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 focus:ring-opacity-50"
                                placeholder="Votre email"
                                required
                            />
                        </div>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea 
                            id="message" 
                            name="message"
                            rows="4" 
                            class="block w-full rounded-md border border-gray-300 py-3 px-4 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 focus:ring-opacity-50"
                            placeholder="Votre message"
                            required
                        ></textarea>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full btn-primary"
                    >
                        Envoyer le message
                    </button>
                </form>
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

<!-- Lucide icons library -->
<script src="https://unpkg.com/lucide@latest"></script>
<!-- Home page JS -->
<script src="<?php echo base_url ?>assets/js/home.js?v=<?php echo time(); ?>"></script>