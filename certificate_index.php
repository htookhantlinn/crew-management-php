<?php
include_once('./master_layouts/header.php');
include_once('./controller/CertificateController.php');

$certificate_controller = new CertificateController();

if (!empty($_GET['cert_id'])) {
    $cert_id = $_GET['cert_id'];
    $certificate_controller->delete_certificate($cert_id);
}
$result = $certificate_controller->show_all_certificate();
?>
<div class=" container-fluid ">
    <a class="btn btn-outline-secondary float-end me-2 " href="certificate_create_form.php"> <i class="fa fa-certificate" aria-hidden="true"></i> Add Certificate</a>

    <table class="table table-striped  " id="dataTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($result as  $x) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . $x['name'] .  "</td>";
                echo "<td><a  href='certificate_detail_form.php?cert_id=" . $x['id'] . "' class=' m-1 btn btn-outline-info'>Read</a><a  href='certificate_edit_form.php?cert_id=" . $x['id'] . "'class=' m-1 btn btn-outline-warning'>Edit</a><a href='certificate_index.php?cert_id=" . $x['id'] . "' class=' m-1 btn btn-outline-danger' onclick=\"return confirm('Delete this record?')\" >Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>


    </table>

</div>

<?php
include_once('./master_layouts/footer.php');
?>