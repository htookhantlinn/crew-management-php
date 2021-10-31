<?php
session_start();

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $file = $_FILES['file'];

    $filename = $file['name'];
    $fileExt = explode('.', $filename);

    $_SESSION['fileExt'] = $fileExt;

    $file_actual_extension = strtolower(end($fileExt));

    $allowed = array('jpeg', 'jpg', 'png', 'pdf');

    if (in_array($file_actual_extension, $allowed)) {
        if ($file['error'] == 0) {
            if ($file['size'] < 500000) {
                $file_new_name = uniqid("registration", true) . "." . $file_actual_extension;
                print_r($file_new_name);
                $filedestination = "/Applications/XAMPP/xamppfiles/htdocs/sb-admin-pages/uploads/" . $file_new_name;
                move_uploaded_file($file['tmp_name'], $filedestination);
                header("location:success.php?filename=$filedestination");
            } else {
            }
        }
    }


    // echo $filename . '<br/>';
    // echo $fileExt . '<br/>';
    // echo $file_actual_extension . '<br/>';


    echo '<br/>';
    foreach ($file as $key => $value) {
        echo $key . ':::' . $value . '<br/>';
    }


    // $error;
    // if (empty($username) || empty($email) || empty($phone) || empty($address)) {
    //     if (empty($username)) {
    //         $error += $username;
    //     }
    //     if (empty($email)) {
    //         $error += $email;
    //     }
    //     if (empty($phone)) {
    //         $error += $phone;
    //     }
    //     if (empty($address)) {
    //         $error += $address;
    //     }
    //     $error += 'empty';
    // } else {
    //     //true 
    // }
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


        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-8 shadow p-5" style="border: 1px solid black;">

                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control">
                        <div class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control">
                        <div class="form-text">We'll never share your address with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <input name="file" type="file">
                    </div>

                    <input class=" btn btn-outline-success" type="submit" name="submit" value="SAVE">
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