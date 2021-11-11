<?php

include_once('./controller/CrewController.php');
if (isset($_POST['submit'])) {
    $person_name = $_POST['person_name'];
    $middle_name = $_POST['middle_name'];
    $sur_name = $_POST['sur_name'];

    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $nationality = $_POST['nationality'];

    $dob = $_POST['dob'];
    $rank = $_POST['rank'];
    $applied_velssel_type = $_POST['applied_velssel_type'];

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


    if (!empty($_FILES['profile_photo']['tmp_name'])) {
        $image = file_get_contents($_FILES['profile_photo']['tmp_name']);
    } else {
        $image = null;
    }
    $crew_controller = new CrewController();
    if ($crew_controller->addCrew($person_name, $middle_name, $sur_name, $father_name, $mother_name, $nationality, $dob, $rank, $applied_velssel_type, $final_school, $martial_status, $net_waistline, $uniform_size, $blood_type, $safe_shoe, $health_inspection, $bank_info, $telephone_one, $telephone_two, $home_address, $city_select, $english_capability, $apply_date, $passport_number, $passport_date, $passport_expired_date, $sbook_number, $sbook_date, $sbook_expired_date, $licensed_number, $License_date, $License_expired_date, $image)) {
        //profile photo အတွက် 
        $profile_photo = $_FILES['profile_photo'];

        $profile_photo_name = $profile_photo['name']; //hkl.jpg
        $profile_photo_ext = explode('.', $profile_photo_name);
        $file_actual_ext = strtolower(end($profile_photo_ext));

        $allowed = ['jpeg', 'jpg', 'png', 'pdf'];
        if (in_array($file_actual_ext, $allowed)) {
            if ($profile_photo['error'] == 0) {
                if ($profile_photo['size'] < 500000) {

                    //ဒီ project ထဲ မှာ ရှိတယ့် uploads Folder ထဲမှာ file သွား save ထားတာ 
                    $file_new_name = uniqid("Crew" . $sbook_number . "_", true) . "." . $file_actual_ext;
                    $filedestination = "/Applications/XAMPP/xamppfiles/htdocs/sb-admin-pages/uploads/" . $file_new_name;
                    move_uploaded_file($profile_photo['tmp_name'], $filedestination);
                }
            }
        }

        header("location:crew_index.php");
    }
}

include_once('./master_layouts/header.php');

?>
<form method="post" enctype="multipart/form-data">


    <div class="container-fluid mt-5">

        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Person Name*:</label>
                <input type="text" class="form-control" id="person_name" name="person_name" placeholder="Enter Person Name" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Middle Name*:</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Surname Name*:</label>
                <input type="text" class="form-control" id="sur_name" name="sur_name" placeholder="Enter Surname" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Father Name*:</label>
                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father Name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Mother Name*:</label>
                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter Mother Name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Nationality *:</label>
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Age:</label>
                <input type="number" class="form-control" id="age" name="age" placeholder=0>
            </div>
            <div class="col-md-4">
                <label class="form-label">Rank*:</label>
                <input type="text" class="form-control" id="rank" name="rank" placeholder="Enter Rank" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Applied vessel type *:</label>
                <input type="text" class="form-control" id="applied_velssel_type" name="applied_velssel_type" placeholder="Enter Applied Vessel Type" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Birth:</label>
                <div class="input-group date">
                    <input type="text" name='dob' class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Proposed Vsl*:</label>
                <select class="form-select form-select " id="proposed_vsl" name="proposed_vsl">
                    <option selected>Tanker</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Final School *:</label>
                <input type="text" class="form-control" id="final_school" name="final_school" placeholder="Enter Final School">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Martial Status:</label>
                <input type="text" class="form-control" id="martial_status" name="martial_status" placeholder="Enter Martial Status">
            </div>
            <div class="col-md-4">
                <label class="form-label">Telephone 1*:</label>
                <input type="text" class="form-control" id="telephone_one" name="telephone_one" placeholder="Enter Telephone one">
            </div>
            <div class="col-md-4">
                <label class="form-label">Telephone 2*:</label>
                <input type="text" class="form-control" id="telephone_two" name="telephone_two" placeholder="Enter Telephone two">
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Home Address:</label>
                <input type="text" class="form-control" id="home_address" name="home_address" placeholder="Enter Home Address">
            </div>
            <div class="col-md-3">
                <label class="form-label">Net Waistline(kg/lb):</label>
                <input type="number" class="form-control" id="net_waistline" name="net_waistline" placeholder=0>
            </div>
            <div class="col-md-3">
                <label class="form-label">City*:</label>
                <select class="form-select form-select " id="city_select" name="city_select">
                    <option selected>Yangon</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">English Capability *:</label>
                <input type="text" class="form-control" id="english_capability" name="english_capability" placeholder="Enter English Capability">
            </div>
            <div class="col-md-4">
                <label class="form-label">Apply Date:</label>
                <div class="input-group date">
                    <input type="text" id="apply_date" name="apply_date" class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text  d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Net of kin *:</label>
                <input type="text" class="form-control" id="net_of_kin" name="net_of_kin" placeholder="Enter Net of kin">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label"> Passport No *:</label>
                <input type="text" class="form-control" id="passport_number" name="passport_number" placeholder="Enter  Passport No ">
            </div>
            <div class="col-md-4">
                <label class="form-label">Passport Date:</label>
                <div class="input-group date">
                    <input type="text" id="passport_date" name="passport_date" class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text  d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Passport Expired Date:</label>
                <div class="input-group date">
                    <input type="text" id="passport_expired_date" name="passport_expired_date" class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text  d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label"> S Book No *:</label>
                <input type="text" class="form-control" id="sbook_number" name="sbook_number" placeholder="Enter  sbook No " required>
            </div>
            <div class="col-md-4">
                <label class="form-label">S Book Date:</label>
                <div class="input-group date">
                    <input type="text" id="sbook_date" name="sbook_date" class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text  d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>


            </div>
            <div class="col-md-4">
                <label class="form-label">S Book Expired Date:</label>
                <div class="input-group date">
                    <input type="text" id="sbook_expired_date" name="sbook_expired_date" class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text  d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label"> License</label>
                <input type="text" class="form-control" id="license" name="license" placeholder="Enter License  ">
            </div>
            <div class="col-md-4">
                <label class="form-label">License Date:</label>
                <div class="input-group date">
                    <input type="text" id="License_date" name="License_date" class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text  d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">License Expired Date:</label>
                <div class="input-group date">
                    <input type="text" id="License_expired_date" name="License_expired_date" class="datepicker form-control">
                    <span class="input-group-append">
                        <span class="input-group-text  d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label"> License No*:</label>
                <input type="text" class="form-control" id="licensed_number" name="licensed_number" placeholder="Enter License Number  ">
            </div>
            <div class="col-md-2">
                <label class="form-label"> Uniform Size*:</label>
                <select class="form-select form-select" id="uniform_size" name="uniform_size">
                    <option selected>XL</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label"> Blood Type*:</label>
                <select class="form-select form-select" id="blood_type" name="blood_type">
                    <option selected>A</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label"> Safe Shoe*:</label>
                <input type="number" class="form-control" name="safe_shoe" id="safe_shoe" placeholder=0>
            </div>
            <div class="col-md-2">
                <label class="form-label"> Heigt (cm)*:</label>
                <input type="number" class="form-control" name="height" id="height" placeholder=0>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label"> Nok Relationship:</label>
                <input type="text" class="form-control" id="nok_relationship" name="nok_relationship" placeholder="Enter Nok Relationship  ">
            </div>
            <div class="col-md-6">
                <label class="form-label">Health Inspection:</label>
                <input type="text" class="form-control" id="health_inspection" name="health_inspection" placeholder="Enter Health Inspection">
            </div>
            <div class="col-md-2">
                <label class="form-label">Status*:</label>
                <select class="form-select form-select" id="status_pr" name="status_pr">
                    <option selected>PR</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label"> Bank Info:</label>
                <input type="text" class="form-control" id="bank_info" name="bank_info" placeholder="Enter Bank Info  ">
            </div>
            <div class="col-md-3">
                <label class="form-label"> Profile Photo:</label>
                <input name="profile_photo" type="file" id="profile_photo_input">
            </div>
            <div class="col-md-3">
                <img id="blah" src="./img/no_profile.png" alt="your image" style="width: 100px; height: 100px;" />
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <input type="submit" class=" btn btn-outline-secondary float-left" name="submit" value="SAVE" />
                <input class=" btn btn-outline-danger float-end" type="button" value="CANCEL" />
            </div>
            <div class="col-md-4">

            </div>
        </div>

    </div>
</form>

<?php include_once('./master_layouts/footer.php');
?>