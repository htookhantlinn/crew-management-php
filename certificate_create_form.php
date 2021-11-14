<?php
include_once('./controller/CertificateController.php');
if (isset($_POST['certificate_create_submit'])) {
    $certificate_name = $_POST['certificate_name'];
    $certificate_controller = new CertificateController();
    if ($certificate_controller->add_certificate($certificate_name)) {
        header('location:certificate_index.php');
    }
}
include_once('./master_layouts/header.php');

?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <input class=" form-control " type="text" name="certificate_name" id="certificate_name" placeholder="Enter Certificate name " required autofocus />
        </div>
        <div class=" m-3   d-flex justify-content-center align-items-center">
            <input class=" btn btn-outline-dark" type="submit" name="certificate_create_submit" id="certificate_create_submit" />
        </div>
    </form>
</div>

<?php
include_once('./master_layouts/footer.php');
?>