<?php
include_once('./model/db.php');
include_once('./controller/ServiceController.php');
$service_controller = new ServiceController();
$service_result =  $service_controller->select_all_service();


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $company = $_POST['company'];
    $rank = $_POST['rank'];
    $ship = $_POST['ship'];
    $service_controller->update_service($id, $company, $rank, $ship);
}
