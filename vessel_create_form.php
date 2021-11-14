<?php
include_once('./controller/VesselController.php');
if (isset($_POST['vessel_create_submit'])) {
    $vessel_name = $_POST['vessel_name'];
    $vessel_controller = new VesselController();
    if ($vessel_controller->add_vessel($vessel_name)) {
        header('location:vessel_index.php');
    }
}
include_once('./master_layouts/header.php');

?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <input class=" form-control " type="text" name="vessel_name" id="vessel_name" placeholder="Enter Vessel name " required autofocus />
        </div>
        <div class=" m-3   d-flex justify-content-center align-items-center">
            <input class=" btn btn-outline-dark" type="submit" name="vessel_create_submit" id="vessel_create_submit" />
        </div>
    </form>
</div>

<?php
include_once('./master_layouts/footer.php');
?>