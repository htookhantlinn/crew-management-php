<?php
include_once('./controller/ServiceController.php');
$service_controller = new ServiceController();
// var_dump($_POST);
// var_dump(count($_POST["ship"]));
$hidden_crew_id = $_POST["hidden_crew_id"];
echo count($_POST["company"]);
if (
    isset($_POST["crew_service_list"]) && !empty($_POST["crew_service_list"]) &&
    isset($_POST["company"]) && !empty($_POST["company"])  && count($_POST["company"]) > 0 &&
    isset($_POST["ship"]) && !empty($_POST["ship"]) && count($_POST["ship"]) > 0 &&
    isset($_POST["vtype"]) && !empty($_POST["vtype"]) && count($_POST["vtype"]) > 0 &&
    isset($_POST["fromDate"]) && !empty($_POST["fromDate"]) && count($_POST["fromDate"]) > 0 &&
    isset($_POST["toDate"]) && !empty($_POST["toDate"])
) {
    $crew_id = $_POST["crew_service_list"];
    $company = $_POST["company"];
    echo $company;
    $ship = $_POST["ship"];
    $vtype_id = $_POST["vtype"];
    $fromDate = $_POST["fromDate"];
    $toDate = $_POST["toDate"];
    for ($i = 0; $i < count($company); $i++) {
        $service_controller->insertService($crew_id, $company[$i], 'This is rank', $ship[$i], $vtype_id[$i], $fromDate[$i], $toDate[$i], 'this is reason');
    }
    header('location:service_list.php');


    var_dump('condition true');

} else {
    var_dump('condition false');
    header('location:service_create.php?cid=' . $hidden_crew_id);
}
