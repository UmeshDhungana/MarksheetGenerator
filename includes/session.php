
<?php
include('../db/connect.php');
if(!isset($_SESSION["user_id"]) && empty($_SESSION["user_id"])) {
    header("Location:/Marksheet/user/login.php");
}
?>
