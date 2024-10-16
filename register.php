<?php include './includes/header.php'; ?>

<div class="subheader">
    <h2>Log in / Registration</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Log in / Registration</li>
        </ol>
        <div class="breadcrumb-call-to-action">
            <?php
            $generalContactQuery = $conn->query("SELECT * FROM `contactcategory` WHERE id = '1'");
            $generalContactRow = $generalContactQuery->fetch_assoc();
            ?>
            <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $generalContactRow['phone']; ?></p>
            <a href="javascript:void(0)" class="contact-btn">
                Contact Us
            </a>
        </div>
    </div>
</div>
<div class="user-form-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="registration-form-block">
                    <div class="registration-form-title">
                        <h4>Sign up</h4>
                    </div>
                    <div class="form-block">
                        <form class="form-common" action="" method="POST">
                            <div class="form-group">
                                <label for="firstname">First Name *</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required
                                    placeholder="Enter your First Name">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name *</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required
                                    placeholder="Enter your Last Name">
                            </div>
                            <div class="form-group">
                                <label for="userName">Email Address *</label>
                                <input type="email" class="form-control" id="userName" name="email" required
                                    placeholder="Enter your Username">
                            </div>
                            <div class="form-group">
                                <label for="mobileno">Mobile Number *</label>
                                <input type="number" class="form-control" id="mobileno" name="mobileno" required
                                    placeholder="Enter your Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="passcode">Password *</label>
                                <input type="password" class="form-control" id="passcode" name="passcode" required
                                    placeholder="Enter your Passwoed">
                            </div>
                            <div class="form-group">
                                <label for="passcode1">Confirm Password *</label>
                                <input type="password" class="form-control" id="passcode1" name="passcode1" required
                                    placeholder="Enter your Passwoed">
                            </div>
                            <div class="form-group row form-check-row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" required>
                                                <span class="custom-control-indicator"></span>
                                                <a href="terms.php">
                                                    <span class="custom-control-description">
                                                        I Agree To Terms of Services
                                                    </span>
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-btn-block">
                                    <button name="submit" type="submit" class="form-btn">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <div class="signin-others-option-block">
                            <h5>Already have an account? <a href="login.php">Sign in</a></h5>
                        </div>
                    </div>
                </div>
                <!-- panel -->
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobileno = htmlspecialchars(trim($_POST['mobileno']));
    $passcode = htmlspecialchars(trim($_POST['passcode']));
    $passcode1 = htmlspecialchars(trim($_POST['passcode1']));

    // Checking all the fields are not null
    if (!$firstname && !$lastname && !$email && !$mobileno && !$passcode && !$passcode1) {
        toastMsg("All Fields are required", "error");
        return;
    }

    if ($passcode !== $passcode1) {
        toastMsg("Password and Confirm password are not same", "warning");
        return;
    }

    // Checking for email is not registered before
    $emailCheckQuery = $conn->query("SELECT `status` FROM `users` WHERE `email` = '$email'");
    if ($emailCheck = $emailCheckQuery->fetch_assoc()) {
        if ($emailCheck['status'] == "DeActive") {
            toastMsg("This email is awaiting approval.", "warning");
            return;
        }
        toastMsg("This email has already been registered.", "error");
        return;
    }

    $fullname = $firstname . " " . $lastname;
    $pages = createSlug($fullname);
    $activation = md5($email . time());

    $useridQuery = $conn->query("SELECT MAX(userid) AS max_userid FROM `users`");
    $useridRow = $useridQuery->fetch_assoc();
    $userid = $useridRow['max_userid'] + 1;
    $userno = "UI-00" . $userid;

    $insertQuery = $conn->query("INSERT INTO `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `activation` = '$activation', `listtype` = 'Free', `fullname` = '$fullname', `pages` = '$pages', `mobileno` = '$mobileno', `passcode` = '$passcode', `passcode1` = '$passcode1', `userid` = '$userid', `status` = 'Deactive', `userno` = '$userno'");
    if (!$insertQuery) {
        toastMsg("Something went wrong! Please try again later.", "error");
        return;
    }

    toastMsg("User has been registered successfully and is awaiting admin approval.", "success");

}
?>

<?php include './includes/footer.php' ?>