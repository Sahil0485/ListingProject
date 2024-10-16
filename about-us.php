<?php include_once './includes/header.php' ?>

<div class="subheader">
    <h2>About Us</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">About Us</li>
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
<div class="single-post-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 push-lg-3">
                <!-- about-widget section -->
                <?php
                $aboutPageQuery = $conn->query("SELECT * FROM `aboutus` WHERE id='1'");
                if ($aboutPageRow = $aboutPageQuery->fetch_assoc()) {
                    ?>
                    <div class="about-info-section" style="padding: 40px 0px;">
                        <div class="container">
                            <div class="row">
                                <?php if ($aboutPageRow['imgstatus'] == 'Active') { ?>
                                    <div class="col-lg-12 push-lg-1 col-md-12">
                                        <div class="about-thumb">
                                            <img src="./admin/uploads/aboutus/<?php echo $aboutPageRow['photo'] ?>"
                                                style="max-width: 60vh;" alt="img" class="img-responsive">
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="about-info mt-sm-1">
                                        <h2><?php echo $aboutPageRow['aboutheading1'] ?></h2>
                                        <p>
                                            <?php echo $aboutPageRow['brief'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="about-info-section" style="padding: 40px 0px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="about-info mt-sm-1">
                                        Something went wrong please contact to your administrator
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php include_once './includes/sidebar.php' ?>
        </div>
    </div>
</div>

<?php include_once './includes/footer.php' ?>