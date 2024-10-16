<?php include './includes/header.php'; ?>

<div class="subheader">
    <h2>Forget Password</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Forget Password</li>
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
                        <h4>Forget Password</h4>
                    </div>
                    <div class="form-block">
                        <form class="form-common">
                            <div class="form-group">
                                <label for="userName">Email Address *</label>
                                <input type="text" class="form-control" id="userName" name="email"
                                    placeholder="Enter your Username">
                            </div>
                            <div class="form-group">
                                <div class="form-btn-block">
                                    <button type="submit" class="form-btn">Forget Password</button>
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

<?php include './includes/footer.php' ?>