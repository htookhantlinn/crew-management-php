<?php
include_once('./master_layouts/header.php');
include_once('./controller/CityController.php');
$city_id = $_GET['cityID'];
var_dump($city_id);
$city_controller = new CityController();
$result = $city_controller->show_city_info($city_id);
?>
<h1>This is City Info</h1>
<?php
print_r($result);
?>
<?php
include_once('./master_layouts/footer.php');
?>