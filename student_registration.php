<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit'])) {
    $name = $_POST['student_name'];
    $email = $_POST['student-email'];
    $phone = $_POST['student_phone'];
    $address = $_POST['student_address'];

    //file
    $file = $_FILES['student_photo'];
    $file_name = $file['name'];
    $file_name_explode = explode('.', $file_name);
    $file_extensioin = strtolower(end($file_name_explode));
    $allowed_file_extension = array('jpg', 'jpeg', 'png', 'pdf');

    $error_string ='';


    if (in_array($file_extensioin, $allowed_file_extension)) {
        if ($file['error'] == 0) {
            if ($file['size'] < 500000) {
                $file_new_name = uniqid('student_reg_photo', false) . '.' . $file_extensioin;
                $file_destination = '/Applications/XAMPP/xamppfiles/htdocs/sb-admin-pages/uploads/' . $file_new_name;
                move_uploaded_file($file['tmp_name'], $file_destination);
                header('location:success.php');
            }
        }
    }


    echo $file_extensioin . '<br/>';
    foreach ($file as $key => $value) {
        echo $key . ':::' . $value . '<br/>';
    }
}

?>

<?php
include_once("master_layouts/header.php")
?>

    <style>
        .form-control {
            box-shadow: none !important;
        }

        .btn {
            box-shadow: none !important;

        }
    </style>

    <div class="container-fluid">

        <h1 class=" text-center ">Student Registration Form</h1>

        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-8 shadow p-5" style="border: 1px solid black;">

                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="student_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="student_email" class="form-control">
                        <div class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="student_phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="student_address" class="form-control">
                        <div class="form-text">We'll never share your address with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload your photo</label><br>
                        <input name="student_photo" type="file">
                    </div>

                    <input class=" btn btn-outline-success " type="submit" name="submit" value="SAVE">
                </form>
            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
<?php
?>
<?php
include_once("master_layouts/footer.php")
?>