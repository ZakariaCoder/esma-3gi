<?php
require_once('./config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `booking_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
    /* Modal styling */
    #uni_modal .modal-header {
        background: linear-gradient(135deg, #f1683a, #ff8c00);
        color: white;
        border-radius: 0;
        padding: 15px 20px;
    }
    
    #uni_modal .modal-title {
        font-weight: 600;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }
    
    #uni_modal .modal-content {
        border: none;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    #uni_modal .modal-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #eee;
        padding: 15px 20px;
    }
    
    #uni_modal .btn-primary {
        background: linear-gradient(135deg, #f1683a, #ff8c00);
        border: none;
        box-shadow: 0 2px 5px rgba(241, 104, 58, 0.3);
        transition: all 0.3s ease;
    }
    
    #uni_modal .btn-primary:hover {
        background: linear-gradient(135deg, #ff8c00, #f1683a);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(241, 104, 58, 0.4);
    }
    
    #uni_modal .btn-secondary {
        background-color: #6c757d;
        border: none;
        box-shadow: 0 2px 5px rgba(108, 117, 125, 0.3);
        transition: all 0.3s ease;
    }
    
    #uni_modal .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.4);
    }
    
    /* Form styling */
    .booking-form-container {
        padding: 20px;
    }
    
    .booking-form-container .form-group {
        margin-bottom: 20px;
    }
    
    .booking-form-container label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }
    
    .booking-form-container input[type="date"] {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .booking-form-container input[type="date"]:focus {
        border-color: #f1683a;
        box-shadow: 0 0 0 0.2rem rgba(241, 104, 58, 0.25);
        outline: none;
    }
    
    .booking-note {
        font-size: 0.85rem;
        color: #666;
        margin-top: 15px;
        font-style: italic;
    }
    
    /* Success message */
    .booking-success {
        display: none;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
        animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="booking-form-container">
    <!-- Success message container -->
    <div class="booking-success" id="booking-success">
        <strong><i class="fa fa-check-circle"></i> Réservation réussie!</strong> Votre espace a été réservé avec succès.
    </div>
    
    <form action="" id="booking-form">
        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
        <input type="hidden" name="facility_id" value="<?= isset($_GET['fid']) ? $_GET['fid'] : (isset($facility_id) ? $facility_id : "") ?>">
        <div class="form-group">
            <label for="date_from" class="control-label">Date de début</label>
            <input name="date_from" id="date_from" type="date" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="date_to" class="control-label">Date de fin</label>
            <input name="date_to" id="date_to" type="date" class="form-control" required />
        </div>
        <p class="booking-note">Veuillez sélectionner les dates pour lesquelles vous souhaitez réserver cet espace.</p>
    </form>
</div>

<script>
	$(document).ready(function(){
		// Initialize date inputs with today's date as minimum
		var today = new Date().toISOString().split('T')[0];
		$('#date_from, #date_to').attr('min', today);
		
		// Set date_from to today by default
		$('#date_from').val(today);
		
		// When date_from changes, ensure date_to is not before it
		$('#date_from').change(function(){
			var fromDate = $(this).val();
			$('#date_to').attr('min', fromDate);
			
			// If date_to is before date_from, update it
			if($('#date_to').val() < fromDate) {
				$('#date_to').val(fromDate);
			}
		});
		
		$('#booking-form').submit(function(e){
			e.preventDefault();
            var _this = $(this);
			$('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_booking",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err);
					alert_toast("Une erreur s'est produite",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						// Hide the form
						$('#booking-form').slideUp();
						
						// Show success message with animation
						$('#booking-success').slideDown();
						
						// Update modal footer
						$('#uni_modal .modal-footer #submit').hide();
						$('#uni_modal .modal-footer .btn-secondary').text('Fermer');
						
						// End loader
						end_loader();
						
						// Redirect after 3 seconds
						setTimeout(function(){
							location.href = './?p=booking_list';
						}, 3000);
					} else if(resp.status == 'failed' && !!resp.msg) {
                        var el = $('<div>');
                        el.addClass("alert alert-danger err-msg").text(resp.msg);
                        _this.prepend(el);
                        el.show('slow');
                        end_loader();
                    } else {
						alert_toast("Une erreur s'est produite",'error');
						end_loader();
                        console.log(resp);
					}
                    $("html, body, .modal").scrollTop(0);
				}
			});
		});
	});
</script>