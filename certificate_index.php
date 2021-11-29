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
                <th scope="col"><label>Name</label></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($result as  $x) {
                echo "<tr class='rowitem'>";
                echo "<td>" . $count++ . "</td>";
                echo "<td class='certificateName_td'
                data-id='" . $x['id'] . "'
                ><label class='certificateName_label'>" . $x['name'] . "</label><input type='text' class='certificate_text text-uppercase form-control'>";

                echo "<td><a  href='certificate_detail_form.php?cert_id=" . $x['id'] . "' class=' m-1 btn btn-outline-info'><i class=\"fas fa-eye\"></i></a><a  href='certificate_edit_form.php?cert_id=" . $x['id'] . "'class=' m-1 btn btn-outline-warning'><i class=\"fas fa-edit\"></i></a><a href='certificate_index.php?cert_id=" . $x['id'] . "' class=' m-1 btn btn-outline-danger' onclick=\"return confirm('Delete this record?')\" ><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
                <a  href='#' class=' m-1 btn btn-outline-info edit_button_test'>Test</a>
                
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>


    </table>

</div>

<?php
include_once('./master_layouts/footer.php');
?>