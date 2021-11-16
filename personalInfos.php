<?php
include_once('./controller/CrewController.php');
include_once('./controller/VesselController.php');



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

<?php
include_once('./master_layouts/footer.php');
?>