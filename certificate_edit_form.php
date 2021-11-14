<?php
include_once('./controller/CertificateController.php');
if (!empty($_GET['cert_id'])) {
    //
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["cert_id_update_form"] = $_GET['cert_id'];
    $cert_id = $_GET['cert_id'];
} else {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $cert_id = $_SESSION['cert_id_update_form'];
}
$certificate_controller = new CertificateController();
$result = $certificate_controller->get_certificate_by_id($cert_id);
if (isset($_POST['certificate_update_submit'])) {
    $certificate_name_update =  $_POST['certificate_name_update'];
    if ($certificate_controller->update_certificate($cert_id, $certificate_name_update)) {
        header('location:certificate_index.php');
    }
}
?>
<?php
include_once('./master_layouts/header.php');
?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <input class=" form-control " type="text" value="<?php echo $result['name'] ?>" name="certificate_name_update" id="certificate_name_update" placeholder="Enter Certificate name " required autofocus />
        </div>
        <div class=" m-3   d-flex justify-content-center align-items-center">
            <input class=" btn btn-outline-dark" value="UPDATE" type="submit" name="certificate_update_submit" id="certificate_update_submit" />
        </div>
    </form>
</div>



<?php
include_once('./master_layouts/footer.php');
?>