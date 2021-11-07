<?php
include_once('./controller/CrewController.php');
$cid = $_GET['cid'];
$crew_controller = new CrewController();
$result =  $crew_controller->show_crew_info($cid);


?>
<?php
include_once('./master_layouts/header.php');
?>

<div class=" container-fluid">
    <div class="row m-5">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" disabled value="<?php echo $result['firstname'] ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control" disabled value="<?php echo $result['lastname'] ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Naionality</label>
                <input type="text" class="form-control" disabled value="<?php echo $result['nationality'] ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rank </label>
                <input type="text" class="form-control" disabled value="<?php echo $result['rank'] ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Vessel Type</label>
                <input type="text" class="form-control" disabled value="<?php echo $result['vessel_type'] ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SBook NO</label>
                <input type="text" class="form-control" disabled value="<?php echo $result['sbookno'] ?>">
            </div>
        </div>
    </div>
</div>


<?php

// print_r($result['firstname'] . '<br/>');
// print_r($result['lastname'] . '<br/>');
// print_r($result['nationality'] . '<br/>');
// print_r($result['rank'] . '<br/>');
// print_r($result['vessel_type'] . '<br/>');
// print_r($result['sbookno'] . '<br/>');
?>

<?php
include_once('./master_layouts/footer.php');
?>