<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">Liste des Catégories</h3>
		<div class="card-tools">
			<button type="button" id="create_new" class="btn btn-flat btn-primary btn-sm"><span class="fas fa-plus"></span>  Créer Nouveau</button>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="30%">
					<col width="15%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date de Création</th>
						<th>Catégorie</th>
						<th>Description</th>
						<th>Statut</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `category_list` where delete_flag = 0 order by `name` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><p class="m-0 truncate-1"><?php echo $row['description'] ?></p></td>
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
								<span class="sr-only">Basculer Menu</span>
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
<script>
	$(document).ready(function(){
		$('#create_new').click(function(){
			uni_modal("Ajouter une Nouvelle Catégorie","categories/manage_category.php");
		})
		$('.edit_data').click(function(){
			uni_modal("Modifier la Catégorie","categories/manage_category.php?id="+$(this).attr('data-id'));
		})
		$('.view_data').click(function(){
			uni_modal("Détails de la Catégorie","categories/view_category.php?id="+$(this).attr('data-id'));
		})
		$('.delete_data').click(function(){
			_conf("Êtes-vous sûr de vouloir supprimer cette catégorie de façon permanente ?","delete_category",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_category($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_category",
			method:"POST",
			data:{id: $id},
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