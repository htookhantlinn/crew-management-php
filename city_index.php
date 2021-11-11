<?php
include_once('./master_layouts/header.php');
include_once('./controller/CityController.php');

$city_controller = new CityController();
if (!empty($_GET['city_id'])) {
    $city_id = $_GET['city_id'];
    $city_controller->delete_city($city_id);
}

$result = $city_controller->show_all_city();

?>
<div class=" container-fluid ">
    <a class="btn btn-outline-secondary float-end me-2 " href="city_create_form.php"><i class="fas fa-city    "></i> Add City</a>

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
                echo "<td><a  href='city_detail_form.php?city_id=" . $x['id'] . "' class=' m-1 btn btn-outline-info'>Read</a><a  href='city_edit_form.php?city_id=" . $x['id'] . "'class=' m-1 btn btn-outline-warning'>Edit</a><a href='city_index.php?city_id=" . $x['id'] . "' class=' m-1 btn btn-outline-danger' onclick=\"return confirm('Delete this record?')\" >Delete</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>


    </table>

</div>

<?php
include_once('./master_layouts/footer.php');
?>