<?php
include_once('./master_layouts/header.php');
include_once('./controller/CityController.php');
$city_id = $_GET['city_id'];
$city_controller = new CityController();
$result = $city_controller->get_city_by_id($city_id);
// $result = $certificate_controller->show_all_certificate();
// print_r($result);
?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <label class="form-label" >City Name</label>
            <input class=" form-control text-center " type="text" value="<?php echo $result['name']; ?>" disabled style="width: 400px;;" />
        </div>
    </form>
</div>

<?php
include_once('./master_layouts/footer.php');
?>