<?php
include_once "./controller/CrewController.php";
include_once "./controller/VesselController.php";

$vesselcontroller = new VesselController();
$vessel_results = $vesselcontroller->show_all_vessel();
$crewController = new CrewController();
$crew_results = $crewController->show_all_crew_join_table();
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $crew_alone = $crewController->show_crew_info($cid);
}

// var_dump($cid);

?>
<?php
include_once('./master_layouts/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container">
        <span id="success_result"></span>
        <form method="post" id="repeater_form" autocomplete="off">
            <div class="row mb-3 p-5">
                <div class="col-md-4">
                    <label>Crew Name</label>

                    <?php
                    if (isset($_GET['cid'])) {
                    ?>
                        <input type="hidden" id="hidden_crew_id" value="<?php echo $_GET['cid'];   ?>" name="hidden_crew_id" />
                    <?php
                    } else {
                    ?>
                        <input type="hidden" id="hidden_crew_id" value="" name="hidden_crew_id" />
                    <?php
                    }
                    ?>


                    <select data-skip-name="true" name="crew_service_list" id="crew_service_list" class="form-control">
                        <?php
                        foreach ($crew_results as $result) {
                            if (isset($_GET['cid'])) {
                                if ($_GET['cid'] == $result['id']) {
                                    echo "<option data-sbook='" . $result['sbookno'] . "' selected value='" . $result['id'] . "'>" . $result["firstname"] . " " .
                                        $result["middlename"] . " " .
                                        $result["lastname"] .  "</option>";
                                } else {
                                    echo "<option data-sbook='" . $result['sbookno'] . "'  value='" . $result['id'] . "'>" . $result["firstname"] . " " .
                                        $result["middlename"] . " " .
                                        $result["lastname"] .  "</option>";
                                }
                            } else {
                                echo "<option  data-sbook='" . $result['sbookno'] . "' value='" . $result['id'] . "'>" . $result["firstname"] . " " .
                                    $result["middlename"] . " " .
                                    $result["lastname"] .  "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Sbook No</label>
                    <?php
                    if (isset($_GET['cid'])) { ?>
                        <input id="sbookNo_service" type="text" disabled class="form-control" value="<?php echo $crew_alone['sbookno'] ?>" />
                    <?php
                    } else {
                    ?>
                        <input id="sbookNo_service" type="text" disabled class="form-control" value="" />
                    <?php
                    }
                    ?>

                </div>
            </div>


            <div id="repeater">
                <div class="repeater-heading float-end">
                    <button type="button" class="btn btn-primary repeater-add-btn">Add More Service</button>
                </div>
                <div class="clearfix"></div>
                <div class="items">
                    <div class="item-content">
                        <div class="form-group">
                            <div class="row d-flex justify-content-center align-items-center ">

                                <div class="col-md-2">
                                    <label class="form-label">Company Name</label>
                                    <input required type="text" data-skip-name="true" name='company[]' class="form-control">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Ship Name</label>
                                    <input required type="text" data-skip-name="true" name='ship[]' class="form-control">
                                </div>

                                <!-- <div class="col-md-2">
                  <label class="form-label">Rank</label>
                  <input type="text" data-skip-name="true" name='rank[]' class="form-control">
                </div> -->

                                <div class="col-md-2">
                                    <label>Vessel Type</label>
                                    <select data-skip-name="true" id="select_vessel_service" name="vtype[]" class="form-select">
                                        <?php
                                        foreach ($vessel_results as $x) {
                                            if ($crew_alone['vessel_type'] == $x['id']) {
                                                echo "<option selected value='" . $x['id'] . "'>" . $x['name'] . "</option>";
                                            } else {
                                                echo "<option value='" . $x['id'] . "'>" . $x['name'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>From </label>
                                    <div class='input-group date'>
                                        <input required type='text' data-skip-name="true" name="fromDate[]" class='datepicker form-control'>
                                        <span class='input-group-append'>
                                            <span class='input-group-text  d-block'>
                                                <i class='fa fa-calendar'></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <label>To </label>
                                    <div class='input-group date'>
                                        <input required type='text' data-skip-name="true" name="toDate[]" class='datepicker form-control'>
                                        <span class='input-group-append'>
                                            <span class='input-group-text  d-block'>
                                                <i class='fa fa-calendar'></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class=" col-md-1" style="margin-top:24px;">
                                    <button id="remove-btn" onclick="$(this).parents('.items').remove()" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group d-flex justify-content-center align-items-center  ">
                <br /><br />
                <input type="submit" name="insert" class="btn btn-success" value="Save" />
            </div>
        </form>
    </div>
    </form>




</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<?php
include_once('./master_layouts/footer.php');
?>