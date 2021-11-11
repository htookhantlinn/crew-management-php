<?php
include_once('./controller/VesselController.php');
if (!empty($_GET['vessel_id'])) {
    //
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["vessel_id_update_form"] = $_GET['vessel_id'];
    $vessel_id = $_GET['vessel_id'];
} else {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $vessel_id = $_SESSION['vessel_id_update_form'];
}
$vessel_controller = new VesselController();
$result = $vessel_controller->get_vessel_by_id($vessel_id);
if (isset($_POST['vessel_update_submit'])) {
    $vessel_name_update =  $_POST['vessel_name_update'];
    if ($vessel_controller->update_vessel($vessel_id, $vessel_name_update)) {
        header('location:vessel_index.php');
    }
}
?>
<?php
include_once('./master_layouts/header.php');
?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <input class=" form-control " type="text" value="<?php echo $result['name'] ?>" name="vessel_name_update" id="vessel_name_update" placeholder="Enter vessel name " required />
        </div>
        <div class=" m-3   d-flex justify-content-center align-items-center">
            <input class=" btn btn-outline-dark" value="UPDATE" type="submit" name="vessel_update_submit" id="vessel_update_submit" />
        </div>
    </form>
</div>



<?php
include_once('./master_layouts/footer.php');
?>