<?php
include_once('./controller/VesselController.php');
include_once('./controller/CrewController.php');
$hidden_crew_id = $_GET["cid"];
$crew_controller = new CrewController();
$vessel_controller = new VesselController();
$vessel_results=$vessel_controller->show_all_vessel();
$crew_alone=$crew_controller->show_crew_info($hidden_crew_id);

foreach ($vessel_results as $x) {
    if ($crew_alone['vessel_type'] == $x['id']) {
        echo "<option selected value='" . $x['id'] . "'>" . $x['name'] . "</option>";
    } else {
        echo "<option value='" . $x['id'] . "'>" . $x['name'] . "</option>";
    }
}
// header('location:service_create.php?cid=' . $hidden_crew_id);