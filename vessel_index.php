<?php
include_once('./master_layouts/header.php');
include_once('./controller/VesselController.php');

$vessel_controller = new VesselController();

if (!empty($_GET['vessel_id'])) {
    $vessel_id = $_GET['vessel_id'];
    $vessel_controller->delete_vessel($vessel_id);
}
$result = $vessel_controller->show_all_vessel();
?>
<div class=" container-fluid ">
    <a class="btn btn-outline-secondary float-end me-2 " href="vessel_create_form.php"> <i class="fas fa-fw fa-cog"></i>
        Add Vessel</a>

    <table class="table table-striped  " id="dataTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($result as  $x) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . $x['name'] .  "</td>";
                echo "<td><a  href='vessel_detail_form.php?vessel_id=" . $x['id'] . "' class=' m-1 btn btn-outline-info'>Read</a><a  href='vessel_edit_form.php?vessel_id=" . $x['id'] . "'class=' m-1 btn btn-outline-warning'>Edit</a><a href='vessel_index.php?vessel_id=" . $x['id'] . "' class=' m-1 btn btn-outline-danger' onclick=\"return confirm('Delete this record?')\" >Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>


    </table>

</div>

<?php
include_once('./master_layouts/footer.php');
?>