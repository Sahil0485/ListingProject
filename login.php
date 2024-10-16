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
                        <h4>Sign in</h4>
                    </div>
                    <div class="form-block">
                        <form class="form-common" method="post" action="">
                            <div class="form-group">
                                <label for="userName">Email Address *</label>
                                <input type="text" class="form-control" id="userName" name="email"
                                    placeholder="Enter your Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" class="form-control" id="password" name="passcode"
                                    placeholder="Enter your Password">
                            </div>
                            <div class="form-group row form-check-row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="remember">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Remember Me</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="forgot-link-block">
                                            <a href="forget-password.php" class="forgot-link">Forget Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-btn-block">
                                    <button name="submit" type="submit" class="form-btn">Sign in</button>
                                </div>
                            </div>
                        </form>
                        <div class="signin-others-option-block">
                            <h5>Not a Member? <a href="register.php">Sign up</a></h5>
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

    if (isset($_SESSION['username'])) {
        toastMsg("You are already logged in.", "warning");
        header("Location: index.php");
        exit();
    }

    $email = htmlspecialchars(trim($_POST['email']));
    $passcode = htmlspecialchars(trim($_POST['passcode']));

    // Checking all the fields are not null
    if (!$email && !$passcode) {
        toastMsg("All Fields are required", "error");
        return;
    }

    // Login Monitoring
    $loginQuery = $conn->query("SELECT * FROM `users` WHERE `email` = '$email' AND `status` = 'Active'");
    $loginRow = $loginQuery->fetch_assoc();
    if (!$loginRow['id']) {
        toastMsg("Email address or password is incorrect.", "error");
        return;
    }

    if ($passcode != $loginRow['passcode']) {
        toastMsg("Email address or password is incorrect.", "error");
        return;
    }

    // If user want site to remember his/her
    if (isset($_POST['remember'])) {
        // Set a cookie that lasts for 30 days
        setcookie('username', $email, time() + (30 * 24 * 60 * 60), "/", "", true);
    }

    $_SESSION['username'] = $email;
    toastMsg("Login successful.", "success");
    header("Location: index.php");
    exit();
}
?>
<?php include './includes/footer.php' ?>