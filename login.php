<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('./controller/UserController.php');

if (isset($_POST["submit"])) {


    //header("location:success.php");
    // var_dump($_POST['checkbox']);
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    // echo $email;
    // echo $password;
    $error = '';

    if (empty($email) || empty($password)) {
        if (empty($email) && empty($password)) {
            $error = "Email and Password are empty.";
        } else {
            if (empty($email)) {
                $error = "Email is  empty.";
            } else {
                $error = "Password is empty.";
            }
        }
    } else {

        $usercontroller = new UserController();
        $result = $usercontroller->checkUser($email, $password);
        if (count($result) > 0) {
            $_SESSION["email"] = $email;
            //header("location:index.php?name=$email+password=$password");
            header("location:index.php");
        } else {
            $error = "Email and Password are incorrect.";
        }
    }


    // var_dump($_POST["email"]);
    // var_dump($_POST["password"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Core -->
    <link rel="stylesheet" href="./node_modules/bootstrap5/src/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="./css/style.css">

    <!--  Font Awesone -->
    <script src="https://kit.fontawesome.com/ba7f482478.js" crossorigin="anonymous"></script>


    <title>Login</title>
</head>

<body id="login">


<div class="container login-form-container  bg-white  mt-5 shadow ">
    <p class=" text-center fs-5 fw-bolder ">Sign in to start you session</p>
    <form method="post">
        <div class="email-container mb-3 d-flex justify-content-center align-items-center">
            <input type="email" class="form-control" id="email" name="email" placeholder=" email">
            <i class="far fa-envelope icon"></i>
        </div>

        <div class="password-container mb-3 d-flex justify-content-center align-items-center">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <i class="fa fa-lock icon"></i>
        </div>


        <div class="container mt-3">
            <input type="checkbox" id="rememberMe">&nbsp;&nbsp;Remember Me
            <input type="submit" style="border: 1px solid black !important;" name='submit'
                   class="btn btn-outline-success float-end">login</button>
        </div>

        <div class="container mt-3">
            <a href="#">I forgot my password</a>
        </div>
    </form>
</div>


<!-- jquery core -->
<script src="./node_modules/jquery/dist/jquery.min.js"></script>

<!-- jquery repeater -->
<script src="./node_modules/jquery.repeater/jquery.repeater.min.js"></script>

<!-- bootstrap core -->
<script src="./node_modules/bootstrap5/src/js/bootstrap.bundle.min.js"></script>

<!-- custom js -->
<script src="./js/script.js"></script>
</body>

</html>