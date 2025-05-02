<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Liste des Espaces</h3>
		<div class="card-tools">
			<a href="?page=facilities/manage_facility" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Créer Nouveau</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
					<col width="25%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date de Création</th>
						<th>Prix</th>
						<th>Catégorie</th>
						<th>Nom</th>
						<th>Statut</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT f.*,c.name as category from `facility_list` f inner join category_list c on f.category_id = c.id where f.delete_flag = 0 order by (f.`facility_code`) asc ");
						while($row = $qry->fetch_assoc()):
							foreach($row as $k=> $v){
								$row[$k] = trim(stripslashes($v));
							}
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td><?php echo number_format($row['price'], 2) ?> DH</td>
							<td><?php echo ucwords($row['category']) ?></td>
							<td><?php echo ($row['name']) ?></td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Actif</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Inactif</span>
                                <?php endif; ?>
                            </td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> Voir</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Modifier</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Supprimer</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.view_data').click(function(){
			uni_modal("Facility Details","facilities/view_facility.php?id="+$(this).attr('data-id'));
		})
		$('.edit_data').click(function(){
			uni_modal("Edit Facility","facilities/manage_facility.php?id="+$(this).attr('data-id'));
		})
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Facility permanently?","delete_facility",[$(this).attr('data-id')])
		})
        $('.table th, .table td').addClass("align-middle px-2 py-1")
		$('.table').dataTable();
	})
	function delete_facility($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_facility",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
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