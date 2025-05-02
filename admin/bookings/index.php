<div class="card card-outline card-primary shadow rounded-0">
    <div class="card-header">
        <h3 class="card-title"><b>Liste des Réservations</b></h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                    <col width="20%">
                    <col width="15%">
                    <col width="15%">
                </colgroup>
                <thead>
                    <tr class="bg-gradient-dark text-light">
                        <th class="text-center">#</th>
                        <th class="text-center">Date de Réservation</th>
                        <th class="text-center">Code Réf.</th>
                        <th class="text-center">Espace</th>
                        <th class="text-center">Client</th>
                        <th class="text-center">Statut</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    $bookings = $conn->query("SELECT b.*,concat(c.lastname,', ', c.firstname,' ',COALESCE(c.middlename,'')) as client, f.name as facility,cc.name as category FROM `booking_list` b inner join client_list c on b.client_id = c.id inner join facility_list f on b.facility_id = f.id inner join category_list cc on f.category_id = cc.id order by unix_timestamp(b.date_created) desc ");
                    while($row = $bookings->fetch_assoc()):
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                            <td><?= $row['ref_code'] ?></td>
                            <td><?= $row['client'] ?></td>
                            <td>
                                <p class="truncate-1 m-0"><?= $row['facility'] ?></p>
                                <small class="text-muted"><?= $row['category'] ?></small>
                            </td>
                            <td class="text-center">
                                <?php 
                                    switch($row['status']){
                                        case 0:
                                            echo "<span class='badge badge-secondary bg-gradient-secondary px-3 rounded-pill'>En Attente</span>";
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
                                ?>
                            </td>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-flat btn-sm btn-default border view_data" href="javascript:void(0)" data-id="<?= $row['id'] ?>"><i class="fa fa-eye"></i> Voir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function(){

        $('.table th, .table td').addClass("align-middle px-2 py-1")
		$('.table').dataTable();
		$('.table').dataTable();
        $('.view_data').click(function(){
            uni_modal("Détails de la Réservation","bookings/view_booking.php?id="+$(this).attr('data-id'))
        })
    })
</script>