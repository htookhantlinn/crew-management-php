<?php
include_once('./master_layouts/header.php');
include_once('./controller/VesselController.php');
$vessel_id = $_GET['vessel_id'];
$vessel_controller = new VesselController();
$result = $vessel_controller->get_vessel_by_id($vessel_id);
// $result = $certificate_controller->show_all_certificate();
// print_r($result);
?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <lable class=" form-label">Vessel Name </lable>
        <div class=" m-3 ">
            <input class=" form-control text-center " type="text" value="<?php echo $result['name']; ?>" disabled style="width: 400px;;" />
        </div>
    </form>
</div>

<?php
include_once('./master_layouts/footer.php');
?>