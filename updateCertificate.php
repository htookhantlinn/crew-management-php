<?php


include_once './model/db.php';
include_once('./controller/CertificateController.php');

$cert_controller = new CertificateController();

if ($_POST['id']) {
    $cert_id = $_POST['id'];
    $cert_name = $_POST['name'];
    $cert_controller->update_certificate($cert_id, $cert_name);
}
