<script>
  $(document).ready(function(){
    $('#p_use').click(function(){
      uni_modal("Politique de Confidentialité","policy.php","mid-large")
    })
     window.viewer_modal = function($src = ''){
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if(t =='mp4'){
        var view = $("<video src='"+$src+"' controls autoplay></video>")
      }else{
        var view = $("<img src='"+$src+"' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
              show:true,
              backdrop:'static',
              keyboard:false,
              focus:true
            })
            end_loader()  

  }
    window.uni_modal = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("Une erreur s'est produite")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',")+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
  })
</script>

<!-- Modern Footer -->
<footer class="bg-gray-900 text-white pt-16 pb-6">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
      <div>
        <div class="flex items-center space-x-2 mb-6">
          <a href="./" class="navbar-brand">
            <img src="uploads/system-logo.png" width="180px" class="d-inline-block align-top" alt="Logo" loading="lazy">
          </a>
        </div>
        <p class="text-gray-400 mb-6">
          Solution complète pour la gestion d'espaces de coworking. Simplifiez votre quotidien et améliorez l'expérience de vos membres.
        </p>
        <div class="flex space-x-4">
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center transition-colors hover:bg-brand-orange">
            <i data-lucide="facebook" class="w-5 h-5" aria-hidden="true"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center transition-colors hover:bg-brand-orange">
            <i data-lucide="twitter" class="w-5 h-5" aria-hidden="true"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center transition-colors hover:bg-brand-orange">
            <i data-lucide="instagram" class="w-5 h-5" aria-hidden="true"></i>
          </a>
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center transition-colors hover:bg-brand-orange">
            <i data-lucide="linkedin" class="w-5 h-5" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      
      <div>
        <h3 class="text-lg font-semibold mb-6">Navigation</h3>
        <ul class="space-y-3">
          <li><a href="./" class="text-gray-400 hover:text-brand-orange transition-colors">Accueil</a></li>
          <li><a href="./?p=facility_available" class="text-gray-400 hover:text-brand-orange transition-colors">Espaces</a></li>
          <li><a href="./?p=about" class="text-gray-400 hover:text-brand-orange transition-colors">À Propos</a></li>
          <li><a href="#contact" class="text-gray-400 hover:text-brand-orange transition-colors">Contact</a></li>
        </ul>
      </div>
      
      <div>
        <h3 class="text-lg font-semibold mb-6">Fonctionnalités</h3>
        <ul class="space-y-3">
          <li><a href="./?p=facility_available" class="text-gray-400 hover:text-brand-orange transition-colors">Réservations d'espaces</a></li>
          <li><a href="./?p=register" class="text-gray-400 hover:text-brand-orange transition-colors">Inscription</a></li>
          <li><a href="./?p=login" class="text-gray-400 hover:text-brand-orange transition-colors">Connexion</a></li>
        </ul>
      </div>
      
      <div>
        <h3 class="text-lg font-semibold mb-6">Légal</h3>
        <ul class="space-y-3">
          <li><a href="#" id="p_use" class="text-gray-400 hover:text-brand-orange transition-colors">Politique de confidentialité</a></li>
          <li><a href="#" class="text-gray-400 hover:text-brand-orange transition-colors">Mentions légales</a></li>
          <li><a href="#" class="text-gray-400 hover:text-brand-orange transition-colors">CGV</a></li>
        </ul>
      </div>
    </div>
    
    <div class="border-t border-gray-800 pt-6 mt-8">
      <p class="text-gray-400 text-center">&copy; <span id="current-year"><?php echo date('Y'); ?></span> Coworking Manager; Tous droits réservés. Développée par <a href="https://github.com/ZakariaCoder/esma-3gi" target="_blank" class="text-brand-orange">Zakaria & Houssam</a></p>
    </div>
  </div>
</footer>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url ?>dist/js/adminlte.js"></script>
<!-- Lucide icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  // Initialize Lucide icons
  if (typeof lucide !== 'undefined') {
    lucide.createIcons();
  }
</script>
  