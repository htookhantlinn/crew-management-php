<?php
    include_once('./controller/ServiceController.php');
    $service_controller = new ServiceController();
    $service_result =  $service_controller->select_all_service();
?>
<?php
include_once('./master_layouts/header.php');
?>

<div class="crew-index-contents-container container-fluid ">
    <a class="btn btn-outline-secondary float-end me-2 mb-2 " href="service_create.php"> <i class="fa fa-fw fa-cog" aria-hidden="true"></i> Add Service</a>

    <table class="table table-striped  " >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Person Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Rank</th>
                <th scope="col">Ship Name</th>
                <th scope="col">Vessel Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($service_result as  $x) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                
                echo "<td>" . $x['firstname'] . ' ' . $x['middlename'] . ' ' . $x['lastname'] . "</td>";
                echo "<td>" . $x['company'] . "</td>";
                echo "<td>" . $x['rank'] . "</td>";
                echo "<td>" . $x['shipname'] . "</td>";
                // Vessel Controller သုံးရင် ဒါကိုကူး 
                //$vessel_controller->get_vessel_by_id($x['vessel_type'])['name']
                echo "<td>" . $x['name']. "</td>";
               
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</div>

<?php
include_once('./master_layouts/footer.php');
?>
