<?php
if (!isset($_SESSION['username'])) {
    echo "<script>";
    echo "alert('You need to login first');";
    echo "window.location.href='login.php';";
    echo "</script>";
    exit();
}
try {
    $usermail = $_SESSION['username'];
    $userProfileQuery = $conn->query("SELECT * FROM `users` WHERE `email` = '$usermail'");
    $userProfileRow = $userProfileQuery->fetch_assoc();
    $user_fullname = $userProfileRow['fullname'];
    $user_firstname = $userProfileRow['firstname'];
    $user_lastname = $userProfileRow['lastname'];
    $user_email = $userProfileRow['email'];
    $user_listtype = $userProfileRow['listtype'];
    $user_pages = $userProfileRow['pages'];
    $user_mobileno = $userProfileRow['mobileno'];
    $user_state = $userProfileRow['state'];
    $user_city = $userProfileRow['city'];
    $user_suburb = $userProfileRow['suburb'];
    $user_address = $userProfileRow['address'];
    $user_postcode = $userProfileRow['postcode'];
    $user_userid = $userProfileRow['userid'];
    $user_userno = $userProfileRow['userno'];
    $user_photo = $userProfileRow['photo'];
} catch (Exception $e) {
    echo $e->getMessage();
}

?>