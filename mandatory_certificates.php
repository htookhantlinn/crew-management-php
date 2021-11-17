<?php
include_once('./controller/CrewController.php');
include_once('./controller/VesselController.php');
include_once('./controller/CertificateController.php');
include_once('./controller/CrewCertificateController.php');
$crew_controller = new CrewController();
$certificate_controller = new CertificateController();
$crew_cert_controller = new CrewCertificateController();


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$crew_list = $crew_controller->show_all_crew_join_table();
$certificate_list = $certificate_controller->show_all_certificate();

if (isset($_POST['mandatory_cert_submit_btn'])) {
    $crew = $_POST['crew'];
    $temp = explode('(', $crew);
    $sb_raw = strtolower(end($temp));

    $temp = explode('_', $sb_raw);
    $sb_raw = strtolower(end($temp));

    $temp = explode(')', $sb_raw);
    $sbook_no = $temp[0];
    $_SESSION['selectedCrew'] = $crew;
    $flag = true;
    foreach ($certificate_list as  $x) {

        $date_issued = $_POST['dateIssued_' . $x['id']];
        $number = $_POST['number_' . $x['id']];
        $date_expired = $_POST['dateExpired_' . $x['id']];
        if (strlen($date_issued) > 0  ||  strlen($number) > 0  ||  strlen($date_expired) > 0) {

            if (strlen($date_issued) == 0  ||  strlen($number) == 0  ||  strlen($date_expired) == 0) {
                $flag = false;
            }
        }
    }


    $crew = $crew_controller->select_id_by_sbookNo($sbook_no);
    foreach ($certificate_list as  $x) {

        $date_issued = $_POST['dateIssued_' . $x['id']];
        $number = $_POST['number_' . $x['id']];
        $date_expired = $_POST['dateExpired_' . $x['id']];

        if (strlen($date_issued) > 0  ||  strlen($number) > 0  ||  strlen($date_expired) > 0) {
            //   row ထဲ က column  တခုခုပါလာတာ 
            if (strlen($date_issued) > 0  &&  strlen($number) > 0  &&  strlen($date_expired) > 0) {
                //သုံးခုလုံးကို user က ထည့်လိုက်ပီ

                if ($flag) {
                    $crew_cert_controller->add_crew_cert($crew['id'], $x['id'], $date_issued, $number, $date_expired, $sbook_no);
                } else {
                    $_SESSION['date_issued_' . $x['id']] = $date_issued;
                    $_SESSION['date_expired_' . $x['id']] = $date_expired;
                    $_SESSION['number_' . $x['id']] = $number;
                }
            } else {

                // column တ ခု ခု လို နေ 
                if (strlen($date_issued) == 0) {
                    $_SESSION["date_issued_error_" . $x['id']] = 'This field is required!!!';
                } else {
                    $_SESSION['date_issued_' . $x['id']] = $date_issued;
                }

                if (strlen($date_expired) == 0) {
                    $_SESSION["date_expired_error_" . $x['id']] = 'This field is required!!!';
                } else {
                    $_SESSION['date_expired_' . $x['id']] = $date_expired;
                }

                if (strlen($number) == 0) {
                    $_SESSION["number_error_" . $x['id']] = 'This field is required!!!';
                } else {
                    $_SESSION['number_' . $x['id']] = $number;
                }
            }
        } else {

            //row  တခု လုံး  မထည့်ထားတော့ ထည့် စဥ်းစားစရာမလို 
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
            <?php
            if (isset($_SESSION['selectedCrew'])) {
            ?>
                <input class="form-control" list="crew-list" name="crew" id="crew" style="width: 400px;" value="<?php echo $_SESSION['selectedCrew'] ?>" required>
            <?php
            } else {
            ?>
                <input class="form-control" list="crew-list" name="crew" id="crew" style="width: 400px;" required>
            <?php
            }

            unset($_SESSION['selectedCrew']);
            ?>

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

                    if (isset($_SESSION['date_issued_error_' . $x['id']])) {
                        echo
                        "<td>" .
                            "<div class='input-group date'>
                                <input type='text' id='dateIssued_" . $x['id'] . "' name='dateIssued_" . $x['id'] . "' class='datepicker form-control'>
                                <span class='input-group-append'>
                                    <span class='input-group-text  d-block'>
                                        <i class='fa fa-calendar'></i>
                                    </span> 
                                </span>
                            </div>  
                                <span class='error_text text-uppercase'> " . 'This field is required!!!' . "</span>
                        </td>  ";
                        unset($_SESSION['date_issued_error_' . $x['id']]);
                    } else {
                        if (isset($_SESSION['date_issued_' . $x['id']])) {
                            echo
                            "<td>" .
                                "<div class='input-group date'>
                                    <input type='text' id='dateIssued_" . $x['id'] . "' name='dateIssued_" . $x['id'] . "' class='datepicker form-control' value='" . $_SESSION['date_issued_' . $x['id']] . "'>
                                    <span class='input-group-append'>
                                        <span class='input-group-text  d-block'>
                                            <i class='fa fa-calendar'></i>
                                        </span> 
                                    </span>
                                </div>  
                        </td>  ";
                            unset($_SESSION['date_issued_' . $x['id']]);
                        } else {
                            echo
                            "<td>" .
                                "<div class='input-group date'>
                                <input type='text' id='dateIssued_" . $x['id'] . "' name='dateIssued_" . $x['id'] . "' class='datepicker form-control' >
                                <span class='input-group-append'>
                                    <span class='input-group-text  d-block'>
                                        <i class='fa fa-calendar'></i>
                                    </span> 
                                </span>
                            </div>  
                        </td>  ";
                        }
                    }

                    if (isset($_SESSION['number_error_' . $x['id']])) {
                        echo
                        "<td>" .
                            "<input name='number_" . $x['id'] . "' class='form-control' placeholder='Enter Number' type='number' /> 
                            <span class='error_text text-uppercase'> " . 'This Field is Required!!!' . "</span>
                        </td>";
                        unset($_SESSION['number_error_' . $x['id']]);
                    } else {
                        if (isset($_SESSION['number_' . $x['id']])) {
                            echo
                            "<td>" .
                                "<input name='number_" . $x['id'] . "' class='form-control' placeholder='Enter Number'     type='number' value='" . $_SESSION['number_' . $x['id']] . "' /> 
                            </td>";
                            unset($_SESSION['number_' . $x['id']]);
                        } else {
                            echo
                            "<td>" .
                                "<input name='number_" . $x['id'] . "' class='form-control' placeholder='Enter Number'     type='number' /> 
                            </td>";
                        }
                    }

                    if (isset($_SESSION['date_expired_error_' . $x['id']])) {
                        echo
                        "<td>" .
                            "<div class='input-group date'>
                                <input type='text' id='dateExpired_" . $x['id'] . "' name='dateExpired_" . $x['id'] . "' class='datepicker form-control'>
                                <span class='input-group-append'>
                                    <span class='input-group-text  d-block'>
                                        <i class='fa fa-calendar'></i>
                                    </span>
                                </span>
                                </div>
                                <span class='error_text text-uppercase'> " . 'This field is required.' . "</span>
                        </td>";
                        unset($_SESSION['date_expired_error_' . $x['id']]);
                    } else {
                        if (isset($_SESSION['date_expired_' . $x['id']])) {
                            echo
                            "<td>" .
                                "<div class='input-group date'>
                                <input type='text' id='dateExpired_" . $x['id'] . "' name='dateExpired_" . $x['id'] . "' class='datepicker form-control' value='" . $_SESSION['date_expired_' . $x['id']] . "'>
                                <span class='input-group-append'>
                                <span class='input-group-text  d-block'>
                                    <i class='fa fa-calendar'></i>
                                </span>
                                 </span>
                                 </div>
                         </td>";
                            unset($_SESSION['date_expired_' . $x['id']]);
                        } else {
                            echo
                            "<td>" .
                                "<div class='input-group date'>
                                    <input type='text' id='dateExpired_" . $x['id'] . "' name='dateExpired_" . $x['id'] . "' class='datepicker form-control'>
                                    <span class='input-group-append'>
                                    <span class='input-group-text  d-block'>
                                        <i class='fa fa-calendar'></i>
                                    </span>
                                     </span>
                                     </div>
                             </td>";
                        }
                    }
                }
                ?>

            </tbody>



        </table>
        <input type="submit" value="Add " name="mandatory_cert_submit_btn" style="width: 120px;" class="btn btn-outline-success" />


    </form>

</div>


<?php
include_once('./master_layouts/footer.php');
?>