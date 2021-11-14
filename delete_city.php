<?php
include_once './model/db.php';
include_once('./controller/CityController.php');

$city_controller = new CityController();
if ($_POST['id']) {
    $city_id = $_POST['id'];
    try {
        if ($city_controller->delete_city($city_id)) {
            $result = $city_controller->show_all_city();
            $output = '';
            $count = 1;
            foreach ($result as  $x) {
                $output .=  "<tr>";
                $output .= "<td>" . $count++ . "</td>";
                $output .= "<td>" . $x['name'] .  "</td>";
                $output .= "<td city_id = '" . $x['id'] .  "'><a  href='city_detail_form.php?city_id=" . $x['id'] . "' class=' m-1 btn btn-outline-info'><i class=\"fas fa-eye\"></i></a><a  href='city_edit_form.php?city_id=" . $x['id'] . "'class=' m-1 btn btn-outline-warning'><i class=\"fas fa-edit\"></i></a><a href='city_index.php?city_id=" . $x['id'] . "' class=' m-1 btn btn-outline-danger' onclick=\"return confirm('Delete this record?')\" ><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
                        <a class=' m-1 btn btn-outline-danger delete' >
                                Test
                        </a>
                </td>";
                $output .= "</tr>";
            }
            echo $output;
        }
    } catch (\Throwable $th) {
        print_r($th);
    }
}


// $pdo = Database::connect();
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sql  = "delete  from city where id=:city_id";

// $statement = $this->pdo->prepare($sql);
// $statement->bindParam("city_id", $city_id);
// $statement->execute();
