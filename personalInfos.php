<?php
include_once('./controller/CrewController.php');
include_once('./controller/VesselController.php');


$vessel_controller = new VesselController();
$vessel_list = $vessel_controller->show_all_vessel();


$crew_controller = new CrewController();

if (!empty($_GET['cid'])) {
    $cid = $_GET['cid'];
    $crew_controller->delete_crew($cid);
}

$result =  $crew_controller->show_all_crew();

?>
<?php
include_once('./master_layouts/header.php');
?>

<div class="crew-index-contents-container container-fluid ">
    <a class="btn btn-outline-secondary float-end me-2 " href="personal_detail_form.php"> <i class="fa fa-download" aria-hidden="true"></i> Add Crew</a>

    <table class="table table-striped " >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Person Name</th>
                <th scope="col">Rank</th>
                <th scope="col">Nationality</th>
                <th scope="col">Rank</th>
                <th scope="col">Vessel Type</th>
                <th scope="col">Sbook Number</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($result as  $x) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . ' <img style="width: 100px; height:100px;" src="data:image/jpeg;base64,' . base64_encode($x['image']) . '" />' . "</td>";
                echo "<td>" . $x['firstname'].' '.$x['middlename'] .' '.$x['lastname'].  "</td>";
                echo "<td>" . $x['rank'] . "</td>";
                echo "<td>" . $x['nationality'] . "</td>";
                echo "<td>" . $x['rank'] . "</td>";
                // $rs = $vessel_controller->get_vessel_by_id($x['vessel_type']);
                // var_dump($rs);
                echo "<td>" .  $vessel_controller->get_vessel_by_id($x['vessel_type'])['name']. "</td>";
                echo "<td>" . $x['sbookno'] . "</td>";
                echo "<td><a  href='crew_detail.php?cid=" . $x['id'] . "' class=' m-1 btn btn-outline-info'><i class=\"fas fa-eye\"></i></a><a  href='crew_edit_form.php?cid=" . $x['id'] . "'class=' m-1 btn btn-outline-warning'><i class=\"fas fa-edit\"></i></a><a href='crew_index.php?cid=" . $x['id'] . "' class=' m-1 btn btn-outline-danger' onclick=\"return confirm('Delete this record?')\" > <i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</div>
<?php
include_once('./master_layouts/footer.php');
?>