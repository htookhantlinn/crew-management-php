<?php
include_once('./controller/CrewController.php');
include_once('./controller/VesselController.php');
$crew_controller = new CrewController();


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['search_btn'])) {

    $hidden_input = $_POST['hidden_input'];
    // $crewInput = $_POST['crew_input'];
    // $raw = explode('_', $crewInput);
    $crew_id = $_POST['hidden_input'];
    $crew_alone = $crew_controller->show_crew_info($crew_id);
    $sb_book = $crew_alone['sbookno'];
    // echo $sb_book;
    $_SESSION['selectedCrew'] = $crew_alone['firstname'] . ' ' . $crew_alone['middlename'] . ' ' . $crew_alone['lastname'];
    $_SESSION['crew_id'] = $crew_id;
    $_SESSION['sbookno'] = $sb_book;
    $_SESSION['crew_alone'] = $crew_alone;
}




$result =  $crew_controller->show_all_crew_join_table();
$crew_list = $crew_controller->show_all_crew_join_table();


?>
<?php
include_once('./master_layouts/header.php');
?>

<form method="POST" autocomplete="off">
    <div class="container  personal_info_container m-4 shadow p-3">
        <div class=" row  p-3  ">
            <div class="col-md-4">



                <?php
                if (isset($_SESSION['selectedCrew'])) {
                ?>
                    <input class="form-control mb-3 " list="crew_list_personal_info" name="crew_input" id="crew_input" value="<?php echo $_SESSION['selectedCrew'] ?>" required>

                <?php
                } else {
                ?>
                    <input class="form-control mb-3 " list="crew_list_personal_info" name="crew_input" id="crew_input" required>
                <?php
                }

                unset($_SESSION['selectedCrew']);
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
            <div class="col-md-4">

                <?php
                if (isset($_SESSION['crew_id'])) {
                ?>
                    <input type="hidden" id="hidden_input" name="hidden_input" value="<?php echo $_SESSION['crew_id']; ?>" />

                <?php
                    unset($_SESSION['crew_id']);
                } else { ?>
                    <input type="hidden" id="hidden_input" name="hidden_input" />

                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['sbookno'])) {
                ?>
                    <input type="text" class="form-control" placeholder="SBook Number" name="sb_perinfo" value="<?Php echo $_SESSION['sbookno'];  ?>" id="sb_perinfo" disabled />
                <?php
                } else {
                ?>
                    <input type="text" class="form-control" placeholder="SBook Number" name="sb_perinfo" id="sb_perinfo" disabled />
                <?php
                }
                unset($_SESSION['sbookno']);
                ?>



            </div>

            <div class="col-md-4   ">
                <input type="submit" name="search_btn" class=" float-end me-2 search_btn btn btn-outline-success " value="Search" />
            </div>
        </div>

        <?php
        if (isset($_SESSION['crew_alone'])) {
        ?>
            <table class="table personal_info_table  ">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Person Name</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Proposed VSL</th>
                        <th scope="col">Passsport Number</th>
                        <th scope="col">Sbook Number</th>
                        <th scope="col">License Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $crew_alone_session = $_SESSION['crew_alone'];
                    echo "<tr>";
                    echo "<td>" . ' <img style="width: 100px; height:100px;" src="data:image/jpeg;base64,' . base64_encode($crew_alone_session['image']) . '" />' . "</td>";
                    echo "<td>" . $crew_alone_session['firstname'] . ' ' . $crew_alone_session['middlename'] . ' ' . $crew_alone_session['lastname'] . "</td>";

                    echo "<td>" . $crew_alone_session['rank'] . "</td>";
                    // Vessel Controller သုံးရင် ဒါကိုကူး 
                    //$vessel_controller->get_vessel_by_id($crew_alone_session['vessel_type'])['name']
                    echo "<td>" . $crew_alone_session['name'] . "</td>";
                    echo "<td>" . $crew_alone_session['passportno'] . "</td>";
                    echo "<td>" . $crew_alone_session['sbookno'] . "</td>";
                    echo "<td>" . $crew_alone_session['lincece'] . "</td>";
                    echo "<td><a  href='crew_detail.php?cid=" . $crew_alone_session['id'] . "' class=' m-1 btn btn-outline-info'><i class=\"fas fa-eye\"></i></a><a  href='crew_edit_form.php?cid=" . $crew_alone_session['id'] . "'class=' m-1 btn btn-outline-warning'><i class=\"fas fa-edit\"></i></a><a href='crew_index.php?cid=" . $crew_alone_session['id'] . "' class=' m-1 btn btn-outline-danger' onclick=\"return confirm('Delete this record?')\" > <i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td>";
                    echo "</tr>";

                    ?>
                </tbody>
            </table>
        <?php
            unset($_SESSION['crew_alone']);
        }
        ?>

    </div>
</form>
<?php
include_once('./master_layouts/footer.php');
?>