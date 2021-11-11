<?php
include_once('./controller/CityController.php');
if (isset($_POST['city_create_submit'])) {
    $city_name = $_POST['city_name'];
    $city_controller = new CityController();
    if ($city_controller->add_city($city_name)) {
        header('location:city_index.php');
    }
}
include_once('./master_layouts/header.php');

?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <input class=" form-control " type="text" name="city_name" id="city_name" placeholder="Enter City name " required />
        </div>
        <div class=" m-3   d-flex justify-content-center align-items-center">
            <input class=" btn btn-outline-dark" type="submit" name="city_create_submit" id="city_create_submit" />
        </div>
    </form>
</div>

<?php
include_once('./master_layouts/footer.php');
?>