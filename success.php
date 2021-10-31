<?php
echo "This is Success <br/>";
echo $_GET['filename'] . '<br/>';
session_start();

echo $_SESSION['fileExt'];
$fileExt  = $_SESSION['fileExt'];
echo '<br/>';
echo strtolower(end($fileExt));
echo '<br/>';
echo '***';
print_r(end($_SESSION['fileExt']));
echo '<br/>';
foreach ($_SESSION['fileExt'] as $key => $value) {
    # code...
    echo $key . '::' . $value . '<br/>';
}
