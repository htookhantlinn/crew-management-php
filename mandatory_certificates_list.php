<?php
include_once('./controller/CrewCertificateController.php');
include_once('./controller/CertificateController.php');
include_once('./controller/CrewController.php');
$crew_cert_controller = new CrewCertificateController();
$certificate_controller = new CertificateController();
$crew_controller = new CrewController();
$result  = $crew_cert_controller->select_all_crew_cert();
$certificate_list  = $certificate_controller->show_all_certificate();
$crew_list  = $crew_controller->show_all_crew_join_table();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['search_btn_mandatory_list'])) {
    $crew_id = $_POST['hidden_input'];
    $certificate_id = $_POST['hidden_certificate_id'];
    // $sb_perinfo = $_POST['sb_perinfo'];

    $filterResult = $crew_cert_controller->get_crew_cert_by_certID_and_crewID($crew_id, $certificate_id);

    $cert_name = $certificate_controller->get_certificate_by_id($certificate_id)['name'];

    $crew_alone = $crew_controller->get_crew_by_id($crew_id);
    $crew_name = $crew_alone['firstname'] . ' ' . $crew_alone['middlename'] . ' ' . $crew_alone['lastname'];

    $_SESSION['sb_perinfo'] = $crew_alone['sbookno'];
    $_SESSION['crew_id_mandList'] = $crew_id;
    $_SESSION['certificate_id_mandList'] = $certificate_id;
    $_SESSION['crew_name_mandList'] = $crew_name;
    $_SESSION['cert_name_mandList'] = $cert_name;
    $_SESSION['filterResult'] = $filterResult;
    // print_r($filterResult);
    // $_SESSION['crew_id'] = $crew_id;
    // $_SESSION['certificate_id'] = $certificate_id;

    // echo 'certificate id :::' . $certificate_id;
    // echo 'crew id :::' . $crew_id;
}
?>
<?php
include_once('./master_layouts/header.php');
?>

<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
        <a class="btn btn-outline-secondary float-end me-2 mb-3 " href="mandatory_certificates.php"> <i class="fas fa-certificate"></i> Add Certificate</a>
    </div>
</div>
<form method="POST" autocomplete="off">
    <div class="container p-5  m-3" style="border-top: 3px solid rgb(84, 184, 171);">

        <div class="row mb-3">

            <div class="col-md-4">
                <?php
                if (isset($_SESSION['cert_name_mandList'])) { ?>
                    <input list="certificate_list" class="form-control" name="certificate" id="certificate" placeholder="Choose Certificate Name" value="<?php echo $_SESSION['cert_name_mandList']; ?>" required>
                <?php
                    unset($_SESSION['cert_name_mandList']);
                } else { ?>
                    <input list="certificate_list" class="form-control" name="certificate" id="certificate" placeholder="Choose Certificate Name" required>
                <?php
                }
                ?>


                <?php
                if (isset($_SESSION['certificate_id_mandList'])) { ?>
                    <input type="hidden" id="hidden_certificate_id" name="hidden_certificate_id" value="<?php echo $_SESSION['certificate_id_mandList'] ?>" />
                <?php
                    unset($_SESSION['certificate_id_mandList']);
                } else { ?>
                    <input type="hidden" id="hidden_certificate_id" name="hidden_certificate_id" />

                <?php
                }
                ?>



                <datalist id="certificate_list">
                    <?php
                    foreach ($certificate_list as $x) {
                        echo "<option data-id='" . $x['id'] . "' value='" . $x['name'] . "'
                        
                        />";
                    }
                    ?>

                </datalist>
            </div>

            <div class="col-md-3">
                <?php

                if (isset($_SESSION['crew_name_mandList'])) { ?>
                    <input list="crew_list_personal_info" class="form-control" name="crew_input" id="crew_input" placeholder="Choose Person Name" value="<?php echo $_SESSION['crew_name_mandList']; ?>" required>
                <?php
                    unset($_SESSION['crew_name_mandList']);
                } else { ?>
                    <input list="crew_list_personal_info" class="form-control" name="crew_input" id="crew_input" placeholder="Choose Person Name" required>
                <?php
                }
                ?>



                <datalist id="crew_list_personal_info">
                    <?php
                    foreach ($crew_list as $x) {
                        echo "<option 
                        data-id = '" . $x['id'] . "' 
                        data-sbook = '" . $x['sbookno'] . "'  value='" .   $x['firstname'] . ' ' . $x['middlename'] . ' ' . $x['lastname'] . "'>";
                    }
                    ?>

                </datalist>
            </div>


            <div class="col-md-3">
                <?php
                if (isset($_SESSION['crew_id_mandList'])) { ?>
                    <input type="hidden" id="hidden_input" name="hidden_input" value="<?php echo $_SESSION['crew_id_mandList']; ?>" />
                <?php
                    unset($_SESSION['crew_id_mandList']);
                } else { ?>

                    <input type="hidden" id="hidden_input" name="hidden_input" />

                <?php
                }

                ?>
                <?php
                if (isset($_SESSION['sb_perinfo'])) { ?>
                    <input type="text" class="form-control" placeholder="SBook Number" name="sb_perinfo" id="sb_perinfo" value="<?php echo $_SESSION['sb_perinfo']; ?>" disabled  />
                <?php
                unset($_SESSION['sb_perinfo']);
                } else { ?>
                    <input type="text" class="form-control" placeholder="SBook Number" name="sb_perinfo" id="sb_perinfo" disabled />
                <?php
                }
                ?>


            </div>


            <div class="col-md-2">
                <input type="submit" name="search_btn_mandatory_list" class=" float-end me-2 search_btn_mandatory_list btn btn-outline-success " value="Search" />
            </div>
        </div>
        <?php

        if (isset($_SESSION['filterResult']))
            if (count($filterResult) > 0) {
        ?>
            <table class="table  personal_info_table ">
                <thead>
                    <tr>
                        <th scope="col">Certificate </th>
                        <th scope="col">Date Issue </th>
                        <th scope="col">Number </th>
                        <th scope="col">Date Expired </th>
                        <th scope="col">Person Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($filterResult as  $x) {
                        echo "<tr>";
                        echo "<td>" . $x['name'] . "</td>";
                        echo "<td>" . $x['date_issued'] . "</td>";
                        echo "<td>" . $x['number'] . "</td>";
                        echo "<td>" . $x['date_expired'] . "</td>";
                        echo "<td>" . $x['firstname'] . ' ' . $x['middlename'] . ' ' . $x['lastname'] . "</td>";
                        echo "<td><a  href='#' class=' m-1 btn btn-outline-info '>
            VIEW</a><a  href='#'class=' m-1 btn btn-outline-warning'>EDIT</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php
            } else {
        ?>
            <h3>There is no result</h3>
        <?php
            }
        unset($_SESSION['filterResult']);
        ?>


    </div>
</form>

<?php
include_once('./master_layouts/footer.php');
?>