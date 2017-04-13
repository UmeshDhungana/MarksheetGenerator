<?php
/**
 * Created by PhpStorm.
 * User: UMESH
 * Date: 11/30/2016
 * Time: 11:35 AM
 */

session_start();
session_destroy();

header("Location:login.php");
