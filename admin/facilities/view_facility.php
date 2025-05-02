<?php
// Debug the incoming ID
echo "<script>console.log('View Facility - GET ID: " . (isset($_GET['id']) ? $_GET['id'] : 'not set') . "');</script>";

if(isset($_GET['id']) && $_GET['id'] > 0){
    // Store the ID in a variable for clarity
    $facility_id = intval($_GET['id']);
    echo "<script>console.log('View Facility - Parsed ID: {$facility_id}');</script>";
    
    $qry = $conn->query("SELECT f.*, c.name as category from `facility_list` f inner join category_list c on f.category_id = c.id where f.id = '{$facility_id}' ");
    if($qry->num_rows > 0){
        $facility_data = $qry->fetch_assoc();
        echo "<script>console.log('View Facility - Data found:', " . json_encode($facility_data) . ");</script>";
        
        foreach($facility_data as $k => $v){
            $$k = stripslashes($v);
        }
        
        // Debug the ID variable after setting it
        echo "<script>console.log('View Facility - ID variable after setting: {$id}');</script>";
    } else {
        echo "<script>alert('Facility not found!');</script>";
        echo "<script>window.location.href='./?page=facilities';</script>";
        exit;
    }
} else {
    echo "<script>window.location.href='./?page=facilities';</script>";
    exit;
}
?>
<style>
    .facility-img{
        width:100%;
        object-fit:scale-down;
        object-position:center center;
    }
</style>
<div class="content py-3">
    <div class="card card-outline rounded-0 card-primary shadow">
        <div class="card-header">
            <h4 class="card-title">Facility Details</h4>
            <div class="card-tools">
                <?php if(isset($facility_id) && $facility_id > 0): ?>
                <a class="btn btn-primary btn-sm btn-flat" href="./?page=facilities/manage_facility&id=<?= $facility_id ?>" onclick="console.log('Edit button clicked with ID: <?= $facility_id ?>');"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-danger btn-sm btn-flat" href="javascript:void(0);" id="delete_data"><i class="fa fa-trash"></i> Delete</a>
                <?php endif; ?>
                <a class="btn btn-default border btn-sm btn-flat" href="./?page=facilities"><i class="fa fa-angle-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="<?= validate_image(isset($image_path) ? $image_path : "") ?>" alt="facility Image <?= isset($name) ? $name : "" ?>" class="img-thumbnail facility-img">
                    </div>
                </div>
                <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <small class="mx-2 text-muted">Name</small>
                            <div class="pl-4"><?= isset($name) ? $name : '' ?></div>
                        </div>
                        <div class="col-md-12">
                            <small class="mx-2 text-muted">Description</small>
                            <div class="pl-4"><?= isset($description) ? $description : '' ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <small class="mx-2 text-muted">Price</small>
                            <div class="pl-4"><?= isset($price) ? number_format($price,2) : '' ?></div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <small class="mx-2 text-muted">Status</small>
                        <div class="pl-4">
                            <?php if(isset($status)): ?>
                                <?php if($status == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
		$('#delete_data').click(function(){
			_conf("Are you sure to delete this facility permanently?","delete_facility",[])
		})
    })
    function delete_facility($id = '<?= isset($id) ? $id : "" ?>'){
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
					location.href= './?page=facilities';
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>