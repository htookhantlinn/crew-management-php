<?php
include_once "./controller/CrewController.php";
include_once "./controller/VesselController.php";

$vesselcontroller = new VesselController();
$vessel_results = $vesselcontroller->show_all_vessel();
$crewController = new CrewController();
$crew_results = $crewController->show_all_crew_join_table();
if (isset($_POST['submit'])) {
}
?>
<?php
include_once('./master_layouts/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="container">
    <span id="success_result"></span>
    <form method="post" id="repeater_form" autocomplete="off">

      <div class="form-group">
        <label>Crew Name</label>
        <select data-skip-name="true" name="crew" class="form-control">
          <?php
          foreach ($crew_results as $result) {
            echo "<option value='" . $result['id'] . "'>" . $result["firstname"] . "[" . $result['sbookno'] . "]</option>";
          }
          ?>
        </select>
      </div>
      <div id="repeater">
        <div class="repeater-heading float-end">
          <button type="button" class="btn btn-primary repeater-add-btn">Add More Service</button>
        </div>
        <div class="clearfix"></div>
        <div class="items" data-group="programming_languages">
          <div class="item-content">
            <div class="form-group">
              <div class="row d-flex justify-content-center align-items-center ">

                <div class="col-md-2">
                  <label class="form-label">Company Name</label>
                  <input type="text" data-skip-name="true" name='company[]' class="form-control">
                </div>

                <div class="col-md-2">
                  <label class="form-label">Ship Name</label>
                  <input type="text" data-skip-name="true" name='ship[]' class="form-control">
                </div>

                <!-- <div class="col-md-2">
                  <label class="form-label">Rank</label>
                  <input type="text" data-skip-name="true" name='rank[]' class="form-control">
                </div> -->

                <div class="col-md-2">
                  <label>Vessel Type</label>
                  <select data-skip-name="true" name="vtype[]" class="form-select">
                    <?php
                    foreach ($vessel_results as $x) {
                      echo "<option value='" . $x['id'] . "'>" . $x['name'] . "</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="col-md-2">
                  <label>From </label>
                  <div class='input-group date'>
                    <input type='text' data-skip-name="true" name="fromDate[]" class='datepicker form-control'>
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
                    <input type='text' data-skip-name="true" name="toDate[]" class='datepicker form-control'>
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