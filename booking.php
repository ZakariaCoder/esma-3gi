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
        transition: border-color 0.3s;
    }
    .booking-form-container input[type="date"]:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(241, 104, 58, 0.25);
        outline: none;
    }
    .booking-note {
        font-size: 0.85rem;
        color: #666;
        margin-top: 15px;
        font-style: italic;
    }
</style>

<div class="booking-form-container">
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
		$('#booking-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
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
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = './?p=booking_list';
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
                    $("html, body, .modal").scrollTop(0);

				}
			})
		})
	})
</script>