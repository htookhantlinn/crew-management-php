<?php


include_once './model/db.php';
include_once('./controller/CrewCertificateController.php');

$crew_cert_controller = new CrewCertificateController();

if (isset($_POST['id'])) {
    echo "I'm arrived<br/> ";

    $id = $_POST['id'];
    $cert_id = $_POST['cert_id'];
    $crew_id = $_POST['crew_id'];
    $date_issued = $_POST['date_issued'];
    $number = $_POST['number'];
    $date_expired = $_POST['date_expired'];

    echo $id;
    echo '<br/>';
    echo $cert_id;
    echo '<br/>';
    echo $crew_id;
    echo '<br/>';
    echo $date_issued;
    echo '<br/>';
    echo $number;
    echo '<br/>';
    echo $date_expired;
    echo '<br/>';
    echo $crew_cert_controller->update_crew_certificate($id, $cert_id, $crew_id, $date_issued, $number, $date_expired);
}

// if ($_POST['id']) {
//     $cert_id = $_POST['id'];
//     $cert_name = $_POST['name'];
//     $cert_controller->update_certificate($cert_id, $cert_name);
// }
