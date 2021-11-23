<?php
include_once('./master_layouts/header.php');
if (isset($_POST['sea_service_submit_btn'])) {
    print_r($_POST);
}
?>
<h2 class=" text-center mt-2 text-black text-uppercase ">Previous Sea Services</h2>
<div class="repeater table_sea">
    <button data-repeater-create class=" float-end btn btn-outline-success m-2">Add Service</button>
    <form method="POST" id="sea_service_form">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ship Company</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Ship Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">H/P</th>
                    <th scope="col">Form</th>
                    <th scope="col">To</th>
                    <th scope="col">Total Month</th>
                    <th scope="col">Engine Type</th>
                    <th scope="col">SIGN OFF REASON</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody data-repeater-list="data">
                <tr data-repeater-item>

                    <td><input type="text" data-skip-name="true" data-name="ship_company" class="form-control"></td>
                    <td><input type="text" data-skip-name="true" data-name="rank[]" class="form-control"></td>
                    <td><input type="text" data-skip-name="true" data-name="ship_name[]" class="form-control"></tddata->
                    <td style="width: 100px;">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>type</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><button data-repeater-delete class=" btn btn-outline-danger"> <i class="fa fa-trash"></i> </button></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <input type="submit" name="sea_service_submit_btn" value="SAVE" style="width: 200px;" class="btn btn-outline-success" />
            </div>
        </div>
    </form>
    <br>

</div>

<?php
include_once('./master_layouts/footer.php');
?>