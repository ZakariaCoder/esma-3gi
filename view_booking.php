<?php
require_once('./config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `booking_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
        $qry2 = $conn->query("SELECT f.*, c.name as category from `facility_list` f inner join category_list c on f.category_id = c.id where f.id = '{$facility_id}' ");
        if($qry2->num_rows > 0){
            foreach($qry2->fetch_assoc() as $k => $v){
                if(!isset($$k))
                $$k=$v;
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
<style>
    /* Styling for the booking details modal */
    .modal-title {
        color: #f1683a;
        font-weight: 600;
    }
    
    fieldset {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
    }
    
    legend {
        color: #f1683a !important;
        font-weight: 600;
        border-bottom: 2px solid #f1683a;
        padding-bottom: 5px;
        width: auto;
    }
    
    dt {
        font-weight: 600;
        color: #444;
        margin-bottom: 0.3rem;
    }
    
    dd {
        margin-bottom: 1rem;
    }
    
    .badge {
        font-size: 0.85rem;
        padding: 0.4rem 0.8rem;
        border-radius: 50px;
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
                            echo date("d M Y", strtotime($date_from));
                        }else{
                            echo date("d M Y", strtotime($date_from))." - ".date("d M Y", strtotime($date_to));
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
        <?php if(isset($status) && $status == 0): ?>
        <button class="btn btn-danger btn-flat bg-gradient-danger" type="button" id="cancel_booking">Annuler la réservation</button>
        <?php endif; ?>
        <button class="btn btn-dark btn-flat bg-gradient-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
    </div>
</div>
<script>
    $(function(){
        $('#cancel_booking').click(function(){
            _conf("Êtes-vous sûr de vouloir annuler votre réservation [Code de référence: <b><?= isset($ref_code) ? $ref_code : "" ?></b>] ?", "cancel_booking",["<?= isset($id) ? $id : "" ?>"])
        })
    })
    function cancel_booking($id){
        start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=update_booking_status",
			method:"POST",
			data:{id: $id,status:3},
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
					alert_toast("Une erreur s'est produite.",'error');
					end_loader();
				}
			}
		})
    }
</script>