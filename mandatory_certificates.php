<?php
include_once('./controller/CrewController.php');
include_once('./controller/VesselController.php');
include_once('./controller/CertificateController.php');
include_once('./controller/CrewCertificateController.php');
$crew_controller = new CrewController();
$certificate_controller = new CertificateController();
$crew_cert_controller = new CrewCertificateController();

$crew_list = $crew_controller->show_all_crew_join_table();
$certificate_list = $certificate_controller->show_all_certificate();
echo 'outside';
if (isset($_POST['mandatory_cert_submit_btn'])) {
    $crew = $_POST['crew'];
    $temp = explode('(', $crew);
    $sb_raw = strtolower(end($temp));

    $temp = explode('_', $sb_raw);
    $sb_raw = strtolower(end($temp));

    $temp = explode(')', $sb_raw);
    $sbook_no = $temp[0];
    echo $sbook_no;

    $crew = $crew_controller->select_id_by_sbookNo($sbook_no);
    foreach ($certificate_list as  $x) {
        // echo count($certificate_list);
        echo '<br/>';

        $date_issued = $_POST['dateIssued_' . $x['id']];
        $number = $_POST['number_' . $x['id']];
        $date_expired = $_POST['dateExpired_' . $x['id']];
        // echo $date_issued . ':::' . strlen($date_issued) . ':::' . gettype(strlen($date_issued)) . ':::' . isset($date_issued);
        // echo '<br/>';
        // echo $number . ':::' . strlen($number) . ':::' . gettype(strlen($number)) . ':::' . isset($number);
        // echo '<br/>';
        // echo $date_expired . ':::' . strlen($date_expired) . ':::' . gettype(strlen($date_expired)) . ':::' . isset($date_expired);
        // echo '<br/>';
        // echo '<br/>';

        if (strlen($date_issued) > 0  ||  strlen($number) > 0  ||  strlen($date_expired)) {
            echo '<b>This is Greater than Zero</b>';
            if (strlen($date_issued) > 0  &&  strlen($number) > 0  &&  strlen($date_expired)) {
                echo "Three are greater than zero";
                $crew_cert_controller->add_crew_cert($crew['id'], $x['id'], $date_issued, $number, $date_expired, $sbook_no);
            } else {
                // echo '<br/> else cond arrived <br/>';
                // echo strlen('<br/>'.$date_issued) . '<br/>';
                // echo strlen($date_expired) . '<br/>';
                // echo strlen($number) . '<br/>';
                // echo gettype(strlen($number)) . '<br/>';
                if (strlen($date_issued) == 0) {
                    echo ' <br/> date iss eq 0 ';
                }
                if (strlen($date_expired) == 0) {
                    echo ' <br/> date expr eq 0 ';
                }
                if (strlen($number) == 0) {
                    echo ' <br/> number eq 0 ';
                }
            }
        } else {
            echo "Three are zero ";
        }
    }
}




?>
<?php
include_once('./master_layouts/header.php');
?>

<div class=" container-fluid ">

    <form method="POST" autocomplete="off">
        <div class=" container mb-5">
            <input class="form-control" list="crew-list" name="crew" id="crew" style="width: 400px;" required>

            <datalist id="crew-list">
                <?php
                foreach ($crew_list as $x) {
                    echo "<option value='" . $x['firstname'] . ' ' . $x['middlename'] . ' ' . $x['lastname'] . '(sb_' . $x['sbookno'] . ')' . "'>";
                }
                ?>

            </datalist>
        </div>
        <table class="table table-success certificate-table">
            <thead>
                <tr>
                    <td scope="col">#</td>
                    <td scope="col">Name</td>
                    <td scope="col">Date Issued</td>
                    <td scope="col">Number </td>
                    <td scope="col">Date Expired</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($certificate_list as  $x) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td>" . $x['name'] .  "</td>";

                    echo "<td>" . "<div class='input-group date'>
                <input type='text' id='dateIssued_" . $x['id'] . "' name='dateIssued_" . $x['id'] . "' class='datepicker form-control'>
                <span class='input-group-append'>
                    <span class='input-group-text  d-block'>
                        <i class='fa fa-calendar'></i>
                    </span>
                </span>
            </div>  " . "</td>";

                    echo "<td>" . "<input name='number_" . $x['id'] . "' class='form-control' placeholder='Enter Number' type='number' /> 
                    
                    " . "</td>";

                    echo "<td>" . "<div class='input-group date'>
                <input type='text' id='dateExpired_" . $x['id'] . "' name='dateExpired_" . $x['id'] . "' class='datepicker form-control'>
                <span class='input-group-append'>
                    <span class='input-group-text  d-block'>
                        <i class='fa fa-calendar'></i>
                    </span>
                </span>
            </div>
            
            " . "</td>";
                }
                ?>

            </tbody>



        </table>
        <input type="submit" value="Add " name="mandatory_cert_submit_btn" style="width: 120px;" class="btn btn-outline-success" />


    </form>

</div>
<!-- <label for="ice-cream-choice">Choose a flavor:</label>
<input list="ice-cream-flavors" id="ice-cream-choice" name="ice-cream-choice" /> -->

<!-- <datalist id="ice-cream-flavors">
    <option value="">Chocolate</option>
    <option value="Coconut">
    <option value="Mint">
    <option value="Strawberry">
    <option value="Vanilla">
</datalist> -->


<?php
include_once('./master_layouts/footer.php');
?>