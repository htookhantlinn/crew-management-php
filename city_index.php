<?php
include_once('./master_layouts/header.php');
include_once('./controller/CityController.php');
$city_controller  = new CityController();
$result  = $city_controller->show_all_city();
?>

<table class="table" id="cityDataTable">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Name</th>
            <th scope="col">Country Code</th>
            <th scope="col">District</th>
            <th scope="col">Population</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($result as $key => $value) {
            echo "<tr>";
            echo "<td>" . $count++ . "</td>";
            echo "<td>" . $value['Name'] . "</td>";
            echo "<td>" . $value['CountryCode'] . "</td>";
            echo "<td>" . $value['District'] . "</td>";
            echo "<td>" . $value['Population'] . "</td>";
            echo "<td><a class='btn btn-outline-info' href='city_info.php?cityID=" . $value['ID'] . "'><i class='fab fa-readme'></i></a>
            <a class='btn btn-outline-danger' href='city_info.php?cityID=" . $value['ID'] . "'><i class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
include_once('./master_layouts/footer.php');
?>