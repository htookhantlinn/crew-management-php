<?php
include_once('./controller/CrewController.php');
include_once('./controller/VesselController.php');


$vessel_controller = new VesselController();
$cid = $_GET['cid'];
$crew_controller = new CrewController();
$result =  $crew_controller->show_crew_info($cid);


?>
<?php
include_once('./master_layouts/header.php');
?>
<?php
echo "<a  href='crew_edit_form.php?cid=" . $result['id'] . "'class=' float-end me-5 btn btn-outline-warning'>Edit</a>";
?>
<div class="shadow  container-fluid p-5 ">

    <div class="read_form_container container p-3">
        <div class=" row ">
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Profile Photo</label>
                    <?php
                    echo '<img style="width: 100px; height:100px;" src="data:image/jpeg;base64,' . base64_encode($result['image']) . '" />';
                    ?>
                </div>
            </div>
            <div class="col-md-5"></div>

        </div>
        <div class="row m-5 mt-0">

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Person Name</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['firstname'] . ' ' . $result['middlename'] . ' ' . $result['lastname'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Father Name</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['father_name'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Mother Name</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['mother_name'] ?>">
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
                    <label class="form-label">Birthdate</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['birthdate'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Rank </label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['rank'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Vessel Type</label>
                    <input type="text" class="form-control" disabled value="<?php
                                                                            echo $vessel_controller->get_vessel_by_id($result['vessel_type'])['name'];
                                                                            ?> 
                    ">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Final School</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['final_school'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Martial Status</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['martial_status'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Waistline</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['waistline'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Uniform Size</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['uniform_size'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Safe Shoe</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['safeshoe'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Blood Type</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['blood_type'] ?>">
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Health Status</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['health_status'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Bank Info</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['bank_info'] ?>">
                </div>
            </div>



            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Telephone One</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['tel1'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Telephone Two</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['tel2'] ?>">
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['address'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['city'] ?>">
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">English Level</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['english_level'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Application Date</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['application_date'] ?>">
                </div>
            </div>



            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Passport Number</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['passportno'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Passport Date</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['passportdate'] ?>">
                </div>
            </div>



            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Passport Expired Date</label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['passportexpiredate'] ?>">
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">SBook Number </label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['sbookno'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">SBook Date </label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['sbookdate'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">SBook Expired </label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['sbookexpire'] ?>">
                </div>
            </div>



            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">License Number </label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['lincece'] ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">License Date </label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['licencedate'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">License Expired </label>
                    <input type="text" class="form-control" disabled value="<?php echo $result['licen_expire'] ?>">
                </div>
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