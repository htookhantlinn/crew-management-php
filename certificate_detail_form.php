<?php
include_once('./master_layouts/header.php');
include_once('./controller/CertificateController.php');
$cert_id = $_GET['cert_id'];
$certificate_controller = new CertificateController();
$result = $certificate_controller->get_certificate_by_id($cert_id);
// $result = $certificate_controller->show_all_certificate();
// print_r($result);
?>

<div class=" container  d-flex justify-content-center align-items-center " style="height: 400px;">
    <form method="post">
        <div class=" m-3 ">
            <input class=" form-control text-center " type="text" value="<?php echo $result['name']; ?>" disabled style="width: 400px;;" />
        </div>
    </form>
</div>

<?php
include_once('./master_layouts/footer.php');
?>