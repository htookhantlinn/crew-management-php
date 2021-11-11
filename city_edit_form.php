<?php
include_once('./controller/CityController.php');
if (!empty($_GET['city_id'])) {
    //
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["city_id_update_form"] = $_GET['city_id'];
    $city_id = $_GET['city_id'];
} else {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $city_id = $_SESSION['city_id_update_form'];
}
$city_controller = new CityController();
$result = $city_controller->get_city_by_id($city_id);
if (isset($_POST['city_update_submit'])) {
    $city_name_update =  $_POST['city_name_update'];
    if ($city_controller->update_city($city_id, $city_name_update)) {
        header('location:city_index.php');
    }
}
?>
<?php
include_once('./master_layouts/header.php');
?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <input class=" form-control " type="text" value="<?php echo $result['name'] ?>" name="city_name_update" id="city_name_update" placeholder="Enter City name " required />
        </div>
        <div class=" m-3 d-flex justify-content-center align-items-center">
            <input class=" btn btn-outline-dark" value="UPDATE" type="submit" name="city_update_submit" id="city_update_submit" />
        </div>
    </form>
</div>



<?php
include_once('./master_layouts/footer.php');
?>