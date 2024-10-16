<?php
session_start();

session_unset();
session_destroy();
setcookie("authUser", "", time() - 3600, "/");
header('Location: ./login.php', true, 303);
exit();
?>