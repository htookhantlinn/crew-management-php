<?php
include_once('./controller/CrewController.php');
include_once('./controller/VesselController.php');
$vessel_controller = new VesselController();
$vessel_list = $vessel_controller->show_all_vessel();

//ဒေတာဘေ့စ် ထဲ က ဒေ တာတွေ ကို ဖောင်ပေါ် ပြန်တင်တာ 
if (!empty($_GET['cid'])) {
    //
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["cid_update_form"] = $_GET['cid'];
    $cid = $_GET['cid'];
} else {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $cid = $_SESSION['cid_update_form'];
}
$crew_controller = new CrewController();
$result =  $crew_controller->show_crew_info($cid);

if (isset($_POST['update_btn'])) {

    $firstname =  $_POST['firstname'];
    $middle_name = $_POST['middle_name'];
    $lastname =  $_POST['lastname'];

    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $nationality =  $_POST['nationality'];


    $rank =  $_POST['rank'];
    $vessel_type =  $_POST['vessel_type'];
    $sbookno =  $_POST['sbook_number'];

    $final_school = $_POST['final_school'];
    $martial_status = $_POST['martial_status'];
    $net_waistline = $_POST['net_waistline'];

    $uniform_size = $_POST['uniform_size'];
    $blood_type = $_POST['blood_type'];
    $safe_shoe = $_POST['safe_shoe'];

    $health_inspection = $_POST['health_inspection'];
    $bank_info = $_POST['bank_info'];
    $telephone_one = $_POST['telephone_one'];

    $telephone_two = $_POST['telephone_two'];
    $home_address = $_POST['home_address'];
    $city_select = $_POST['city_select'];

    $english_capability = $_POST['english_capability'];
    $birth_date = $_POST['birth_date'];
    $apply_date = $_POST['apply_date'];

    $passport_number = $_POST['passport_number'];
    $passport_date = $_POST['passport_date'];
    $passport_expired_date = $_POST['passport_expired_date'];

    $sbook_number = $_POST['sbook_number'];
    $sbook_date = $_POST['sbook_date'];
    $sbook_expired_date = $_POST['sbook_expired_date'];

    $licensed_number = $_POST['licensed_number'];
    $License_date = $_POST['License_date'];
    $License_expired_date = $_POST['License_expired_date'];

    //profile photo အတွက် 
    $profile_photo = $_FILES['profile_photo_update'];

    $profile_photo_name = $profile_photo['name']; //hkl.jpg
    $profile_photo_ext = explode('.', $profile_photo_name);
    $file_actual_ext = strtolower(end($profile_photo_ext));

    $allowed = ['jpeg', 'jpg', 'png', 'pdf'];
    if (in_array($file_actual_ext, $allowed)) {
        //ပရိုဖိုင် ဖိုတိုကို ရွေးလိုက်တယ့် လမ်းကြောင်း
        if ($profile_photo['error'] == 0) {
            if ($profile_photo['size'] < 500000) {
                $image = file_get_contents($_FILES['profile_photo_update']['tmp_name']);

                if ($crew_controller->update_crew(
                    $cid,
                    $firstname,
                    $middle_name,
                    $lastname,
                    $father_name,
                    $mother_name,
                    $nationality,
                    $rank,
                    $vessel_type,
                    $sbookno,
                    $final_school,
                    $martial_status,
                    $net_waistline,
                    $uniform_size,
                    $blood_type,
                    $safe_shoe,
                    $health_inspection,
                    $bank_info,
                    $telephone_one,
                    $telephone_two,
                    $home_address,
                    $city_select,
                    $english_capability,
                    $birth_date,
                    $apply_date,
                    $passport_number,
                    $passport_date,
                    $passport_expired_date,
                    $sbook_date,
                    $sbook_expired_date,
                    $licensed_number,
                    $License_date,
                    $License_expired_date,
                    $image
                )) {
                    session_destroy();

                    //ဒီ project ထဲ မှာ ရှိတယ့် uploads Folder ထဲမှာ file သွား save ထားတာ 
                    $file_new_name = uniqid("Crew" . $sbook_number . "_", true) . "." . $file_actual_ext;
                    $filedestination = "/Applications/XAMPP/xamppfiles/htdocs/sb-admin-pages/uploads/" . $file_new_name;
                    move_uploaded_file($profile_photo['tmp_name'], $filedestination);

                    header("location:crew_index.php");
                }
            }
        }
    } else {
        //profile photo အသစ် ထပ်မရွေးခဲ့ရင် အဟောင်းကိုပြန်ထည့်တာ 
        $result =  $crew_controller->show_crew_info($cid);
        $image = $result['image'];
        if ($crew_controller->update_crew(
            $cid,
            $firstname,
            $middle_name,
            $lastname,
            $father_name,
            $mother_name,
            $nationality,
            $rank,
            $vessel_type,
            $sbookno,
            $final_school,
            $martial_status,
            $net_waistline,
            $uniform_size,
            $blood_type,
            $safe_shoe,
            $health_inspection,
            $bank_info,
            $telephone_one,
            $telephone_two,
            $home_address,
            $city_select,
            $english_capability,
            $birth_date,
            $apply_date,
            $passport_number,
            $passport_date,
            $passport_expired_date,
            $sbook_date,
            $sbook_expired_date,
            $licensed_number,
            $License_date,
            $License_expired_date,
            $image
        )) {
            session_destroy();
            header("location:crew_index.php");
        }
    }
}
?>
<?php
include_once('./master_layouts/header.php');
?>

<form method="POST" enctype="multipart/form-data">

    <div class="  container-fluid p-5 ">
        <div class=" container edit_form_container">
            <div class="row ">

                <div class="col-12  d-flex  justify-content-center align-items-center">
                    <div class="mb-3 mr-3">
                        <?php
                        echo '<img id="profile_photo_update_img" class="shadow" style="width: 100px; height:100px;" src="data:image/jpeg;base64,' . base64_encode($result['image']) . '" />';
                        ?>
                    </div>

                    <div class="mb-3">

                        <input type="file" name="profile_photo_update" id="profile_photo_update" />
                    </div>
                </div>


            </div>
            <div class="row ">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input name="firstname" type="text" class="form-control" value="<?php echo $result['firstname'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Middle Name*:</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="<?php echo $result['middlename'] ?>" required>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input name="lastname" type="text" class="form-control" value="<?php echo $result['lastname'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Father Name*:</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father Name" value="<?php echo $result['father_name'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Mother Name*:</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter Mother Name" value="<?php echo $result['mother_name'] ?>">
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Naionality</label>
                        <input name="nationality" type="text" class="form-control" value="<?php echo $result['nationality'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Rank </label>
                        <input name="rank" type="text" class="form-control" value="<?php echo $result['rank'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Vessel Type</label>

                        <select class="form-select" id="vessel_type" name="vessel_type">
                            <?php
                            foreach ($vessel_list as $x) {
                                if ($result['vessel_type'] == $x['id']) {
                                    echo "<option value='" . $x['id'] . "' selected >" . $x['name'] . "</option>";
                                } else {
                                    echo "<option value='" . $x['id'] . "'  >" . $x['name'] . "</option>";
                                }
                            }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Final School</label>
                        <input name="final_school" type="text" class="form-control" value="<?php echo $result['final_school'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Martial Status</label>
                        <input name="martial_status" type="text" class="form-control" value="<?php echo $result['martial_status'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Net Waistline</label>
                        <input name="net_waistline" type="text" class="form-control" value="<?php echo $result['waistline'] ?>">
                    </div>
                </div>




                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Uniform Size</label>
                        <select class="form-select form-select" id="uniform_size" name="uniform_size">
                            <option selected>XL</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Blood Type</label>
                        <select class="form-select form-select" id="blood_type" name="blood_type">
                            <option selected>A</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Safe Shoe</label>
                        <input name="safe_shoe" type="number" class="form-control" value="<?php echo $result['safeshoe'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Health Status</label>
                        <input name="health_inspection" type="text" class="form-control" value="<?php echo $result['health_status'] ?>">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Bank Info</label>
                        <input name="bank_info" type="text" class="form-control" value="<?php echo $result['bank_info'] ?>">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Telephone 1</label>
                        <input name="telephone_one" type="text" class="form-control" value="<?php echo $result['tel1'] ?>">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Telephone 2</label>
                        <input name="telephone_two" type="text" class="form-control" value="<?php echo $result['tel2'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input name="home_address" type="text" class="form-control" value="<?php echo $result['address'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input name="city_select" type="text" class="form-control" value="<?php echo $result['city'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">English</label>
                        <input name="english_capability" type="text" class="form-control" value="<?php echo $result['english_level'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Birth Date</label>
                        <div class="input-group date">
                            <input type="text" name='birth_date' class="datepicker form-control" value="<?php echo $result['birthdate'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Application Date</label>

                        <div class="input-group date">
                            <input type="text" name='apply_date' class="datepicker form-control" value="<?php echo $result['application_date'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Passport Number</label>
                        <input name="passport_number" type="text" class="form-control" value="<?php echo $result['passportno'] ?>">

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Passport Date</label>
                        <div class="input-group date">
                            <input type="text" name='passport_date' class="datepicker form-control" value="<?php echo $result['passportdate'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Passport Expired</label>

                        <div class="input-group date">
                            <input type="text" name='passport_expired_date' class="datepicker form-control" value="<?php echo $result['passportexpiredate'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">SBook Number</label>
                        <input name="sbook_number" type="text" class="form-control" value="<?php echo $result['sbookno'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">SBook Date</label>
                        <div class="input-group date">
                            <input type="text" name='sbook_date' class="datepicker form-control" value="<?php echo $result['sbookdate'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">SBook Expired</label>

                        <div class="input-group date">
                            <input type="text" name='sbook_expired_date' class="datepicker form-control" value="<?php echo $result['sbookexpire'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">License Number</label>
                        <input name="licensed_number" type="text" class="form-control" value="<?php echo $result['lincece'] ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">License Date</label>
                        <div class="input-group date">
                            <input type="text" name='License_date' class="datepicker form-control" value="<?php echo $result['licencedate'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">License Expired</label>

                        <div class="input-group date">
                            <input type="text" name='License_expired_date' class="datepicker form-control" value="<?php echo $result['licen_expire'] ?>">
                            <span class="input-group-append">
                                <span class="input-group-text d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>



                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <div class="mb-3">
                        <input class=" btn btn-outline-success" type="submit" name="update_btn" value="UPDATE" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


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