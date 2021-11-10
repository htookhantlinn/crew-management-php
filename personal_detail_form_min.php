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



    // $crew_controller = new CrewController();
    // $crew_controller->addCrew($person_name, $middle_name, $sur_name, $father_name, $mother_name, $nationality, $dob, $rank, $applied_velssel_type, $final_school, $martial_status, $net_waistline, $uniform_size, $blood_type, $safe_shoe, $health_inspection, $bank_info, $telephone_one, $telephone_two, $home_address, $city_select, $english_capability, $apply_date, $passport_number, $passport_date, $passport_expired_date, $sbook_number, $sbook_date, $sbook_expired_date, $licensed_number, $License_date, $License_expired_date);
}

include_once('./master_layouts/header.php');

?>
<form method="post">


    <div class="container-fluid mt-5">

        <div class="row">
            <div class="col-md-4">
                <label class="form-label">First Name*:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Last Name*:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Nationality *:</label>
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Rank*:</label>
                <input type="text" class="form-control" id="rank" name="rank" placeholder="Enter Rank">
            </div>
            <div class="col-md-4">
                <label class="form-label">Applied vessel type *:</label>
                <input type="text" class="form-control" id="applied_velssel_type" name="applied_velssel_type" placeholder="Enter Applied Vessel Type">
            </div>
            <div class="col-md-4">
                <label class="form-label"> S Book No *:</label>
                <input type="text" class="form-control" id="sbook_number" name="sbook_number" placeholder="Enter  sbook No ">
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