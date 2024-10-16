<?php
session_start();
if (!$_SESSION["authUser"]) {
    // header('Location: http://' . $_SERVER['HTTP_HOST'] . '/adminpanel/autherization/login.php', true, 303);
    header('Location: ./autherization/login.php');

}
?>