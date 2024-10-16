<?php
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
// $uri .= $_SERVER['HTTP_HOST'] . '/localyellowpages/admin/dashboard.php';
// header('Location: ' . $uri);
header('Location: ./dashboard.php');
exit;
?>