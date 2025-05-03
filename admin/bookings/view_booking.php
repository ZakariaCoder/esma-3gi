<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    // First, get the booking data without requiring client join
    $qry = $conn->query("SELECT * from `booking_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
        
        // Get client info if available
        if(isset($client_id) && $client_id > 0) {
            $client_qry = $conn->query("SELECT concat(lastname,', ', firstname,' ',middlename) as client_name from `client_list` where id = '{$client_id}' ");
            if($client_qry->num_rows > 0){
                $client = $client_qry->fetch_assoc()['client_name'];
            } else {
                $client = "Client #".$client_id;
            }
        } else {
            $client = "Client non spécifié";
        }
        
        // Get facility info
        if(isset($facility_id) && $facility_id > 0) {
            $qry2 = $conn->query("SELECT f.*, c.name as category from `facility_list` f inner join category_list c on f.category_id = c.id where f.id = '{$facility_id}' ");
            if($qry2->num_rows > 0){
                foreach($qry2->fetch_assoc() as $k => $v){
                    if(!isset($$k))
                    $$k=$v;
                }
            }
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>
<div class="container-fluid">
<fieldset class="border-bottom">
        <legend class="h5 text-muted">Détails de l'Espace</legend>
        <dl>
            <dt class="">Code de l'espace</dt>
            <dd class="pl-4"><?= isset($facility_code) ? $facility_code : "" ?></dd>
            <dt class="">Nom</dt>
            <dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
            <dt class="">Catégorie</dt>
            <dd class="pl-4"><?= isset($category) ? $category : "" ?></dd>
        </dl>
    </fieldset>
    <div class="clear-fix my-2"></div>
    <fieldset class="bor">
        <legend class="h5 text-muted">Détails de la Réservation</legend>
        <dl>
            <dt class="">Code de référence</dt>
            <dd class="pl-4"><?= isset($ref_code) ? $ref_code : "" ?></dd>
            <dt class="">Période</dt>
            <dd class="pl-4">
             <?php 
                    if(isset($date_from) && isset($date_to)){
                        if($date_from == $date_to){
                            echo date("M d, Y", strtotime($date_from));
                        }else{
                            echo date("M d, Y", strtotime($date_from))." - ".date("M d, Y", strtotime($date_to));
                        }
                    } else {
                        echo "<span class='text-muted'>Dates non disponibles</span>";
                    }
                ?>
            </dd>
            <dt class="">Statut</dt>
            <dd class="pl-4">
                <?php 
                    if(isset($status)){
                        switch($status){
                            case 0:
                                echo "<span class='badge badge-secondary bg-gradient-secondary px-3 rounded-pill'>En attente</span>";
                                break;
                            case 1:
                                echo "<span class='badge badge-primary bg-gradient-primary px-3 rounded-pill'>Confirmée</span>";
                                break;
                            case 2:
                                echo "<span class='badge badge-warning bg-gradient-success px-3 rounded-pill'>Terminée</span>";
                                break;
                            case 3:
                                echo "<span class='badge badge-danger bg-gradient-danger px-3 rounded-pill'>Annulée</span>";
                                break;
                        }
                    } else {
                        echo "<span class='text-muted'>Non défini</span>";
                    }
                ?>
            </dd>
        </dl>
    </fieldset>
        
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <?php if(isset($status) && $status == 0 ): ?>
        <button class="btn btn-default btn-flat bg-gradient-primary update_booking" type="button" data-status='1'>Confirmer</button>
        <?php endif; ?>
        <?php if(isset($status) && $status == 1 ): ?>
        <button class="btn btn-default btn-flat bg-gradient-success update_booking" type="button" data-status='2'>Marquer comme terminée</button>
        <?php endif; ?>
        <?php if(isset($status) && in_array($status, [0,1])): ?>
        <button class="btn btn-danger btn-flat bg-gradient-danger update_booking" type="button" data-status='3'>Annuler</button>
        <?php endif; ?>
        <button class="btn btn-dark btn-flat bg-gradient-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
    </div>
</div>
<script>
    $(function(){
        $('.update_booking').click(function(){
            var action = "Mettre en attente", status = $(this).attr('data-status');
            if(status == 1)
                action = "Confirmer"
            else if(status == 2)
                action = "Marquer comme terminée"
            else if(status == 3)
                action = "Annuler"
            _conf("Êtes-vous sûr de vouloir "+action+" cette réservation [Code de référence: <b><?= isset($ref_code) ? $ref_code : "" ?></b>] ?", "update_booking",["<?= isset($id) ? $id : "" ?>",status])
        })
    })
    function update_booking($id,$status){
        start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=update_booking_status",
			method:"POST",
			data:{id: $id,status:$status},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("Une erreur s'est produite.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
    }
</script>
