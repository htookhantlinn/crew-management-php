<?php
include_once('./controller/CrewController.php');
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
    $lastname =  $_POST['lastname'];
    $nationality =  $_POST['nationality'];
    $rank =  $_POST['rank'];
    $vessel_type =  $_POST['vessel_type'];
    $sbookno =  $_POST['sbookno'];

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

                // $db = mysqli_connect("localhost", "root", "", "crew-db"); //keep your db name
                $image = file_get_contents($_FILES['profile_photo_update']['tmp_name']);

                if ($crew_controller->update_crew($cid, $firstname, $lastname, $nationality, $rank, $vessel_type, $sbookno, $image)) {
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
        $result =  $crew_controller->show_crew_info($cid);
        $image = $result['image'];
        if ($crew_controller->update_crew($cid, $firstname, $lastname, $nationality, $rank, $vessel_type, $sbookno, $image)) {
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

    <div class=" container-fluid">
        <div class="row m-5">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input name="firstname" type="text" class="form-control" value="<?php echo $result['firstname'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input name="lastname" type="text" class="form-control" value="<?php echo $result['lastname'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Naionality</label>
                    <input name="nationality" type="text" class="form-control" value="<?php echo $result['nationality'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Rank </label>
                    <input name="rank" type="text" class="form-control" value="<?php echo $result['rank'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Vessel Type</label>
                    <input name="vessel_type" type="text" class="form-control" value="<?php echo $result['vessel_type'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">SBook NO</label>
                    <input name="sbookno" type="text" class="form-control" value="<?php echo $result['sbookno'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Old Profile Photo ::</label>
                    <?php
                    echo '<img class="shadow" style="width: 100px; height:100px;" src="data:image/jpeg;base64,' . base64_encode($result['image']) . '" />';
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Upload Your New Profile Photo ::</label><br />
                    <input type="file" name="profile_photo_update"  />
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <div class="mb-3">
                    <input class=" btn btn-outline-success" type="submit" name="update_btn" value="UPDATE" />
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