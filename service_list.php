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

    <table class="table table_service  ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Person Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Rank</th>
                <th scope="col">Ship Name</th>
                <th scope="col">Vessel Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($service_result as  $x) {
                echo "<tr class='service_list_tr'>";
                echo "<td>" . $count++ . "</td>";

                echo "<td>" . $x['firstname'] . ' ' . $x['middlename'] . ' ' . $x['lastname'] . "</td>";

                echo "<td class='company_td'
                data-id='" . $x['id'] . "'
                ><label class='company_label'>" . $x['company'] . "</label><input type='text' class='company_text text-uppercase form-control'>";

                // echo "<td>" . $x['company'] . "</td>";
                // echo "<td>" . $x['rank'] . "</td>";

                echo "<td class='rank_td'
                data-id='" . $x['id'] . "'
                ><label class='rank_label'>" . $x['rank'] . "</label><input type='text' class='rank_text text-uppercase form-control'>";


                echo "<td class='ship_td'
                data-id='" . $x['id'] . "'
                ><label class='ship_label'>" . $x['shipname'] . "</label><input type='text' class='ship_text text-uppercase form-control'>";

                // echo "<td>" . $x['shipname'] . "</td>";
                // Vessel Controller သုံးရင် ဒါကိုကူး 
                //$vessel_controller->get_vessel_by_id($x['vessel_type'])['name']
                echo "<td>" . $x['name'] . "</td>";
                echo "<td>
                <a  href='#'class=' service_list_edit_btn m-1 btn btn-outline-warning '>EDIT</a>
                </td>";


                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</div>

<?php
include_once('./master_layouts/footer.php');
?>