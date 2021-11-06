<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./node_modules/bootstrap5/src/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/style.css">

    <script src="https://kit.fontawesome.com/ba7f482478.js" crossorigin="anonymous"></script>




    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css'>




    <title>Certificate Form</title>
</head>

<body>
 -->
<?php
include_once('./master_layouts/header.php');
?>




<div class="repeater">
    <button data-repeater-create class=" float-end btn btn-outline-dark m-2">Add New</button>
    <table class="table ">
        <thead>
            <tr>
                <th class=" text-uppercase" scope="col">Certificate</th>
                <th class=" text-uppercase" scope="col">Date Issue</th>
                <th class=" text-uppercase" scope="col">Number</th>
                <th class=" text-uppercase" scope="col">Date Expired</th>
                <th class=" text-uppercase" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody data-repeater-list="data">
            <tr data-repeater-item>


                <td><input type="text" class="form-control" placeholder="Certificate Name" disabled></td>
                <td>
                    <input type="date" class=" form-control">
                </td>
                <td><input type="number" class="form-control" placeholder="Enter Number" /></td>
                <td>
                    <!-- <div class='input-group date'>
                            <input type='text' class="form-control " placeholder="Enter Date" name="endDate" />
                            <span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span>
                            </span>
                        </div> -->
                    <input type="date" class=" form-control">



                </td>
                <td><button data-repeater-delete class=" btn btn-outline-danger"> <i class="fa fa-trash"></i>
                    </button></td>
            </tr>
        </tbody>
    </table>
    <br>

</div>
<?php
include_once('./master_layouts/footer.php');
?>



<!-- 


    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="./node_modules/mdbootstrap/js/popper.min.js"></script>

    <script src="./node_modules/jquery.repeater/jquery.repeater.min.js"></script>

    <script src="./node_modules/bootstrap5/src/js/bootstrap.bundle.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>


    <script src="./js/script.js"></script>


</body>

</html> -->