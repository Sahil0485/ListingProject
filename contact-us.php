<?php include_once './includes/header.php' ?>
<div class="subheader">
    <h2>Contact Us</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Contact Us</li>
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
                <div class="col-lg-10 offset-lg-1 col-md-10">
                    <h3 style="margin-bottom:20px;">Contact us</h3>
                    <div class="contactform-block">
                        <form id="contactForm" class="form-common" action="">
                            <div class="form-group">
                                <input id="name" type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input id="subject" type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group textarea-form-group">
                                <textarea id="message" name="message" rows="5" cols="5" class="form-control"
                                    placeholder="Message"></textarea>
                            </div>
                            <div style="margin-bottom:5px;">
                                <img src="images/captcha.jpg">
                            </div>
                            <div class="form-group" style="width:50%;">
                                <input id="captcha" type="text" class="form-control" placeholder="Enter the code above">
                            </div>
                            <button type="submit" class="form-btn" style="width:30%; margin:10px 0;">Submit</button>
                            <p class="input-success">Your message has sent. Thanks for contacting.</p>
                            <p class="input-error">Sorry, message couldn't sent for some error</p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1 col-md-10">
                    <div class="contactinfo-block">
                        <h4>Contact Info</h4>
                        <div class="">
                            <p class="address">
                                <i class="fa fa-map-marker" aria-hidden="true" style="color:#FD880A;"></i>
                                <?php echo $generalContactRow['address'] ?>
                            </p>
                            <p>
                                <a href="tel:<?php echo $generalContactRow['phone'] ?>">
                                    <i class="fa fa-phone" aria-hidden="true" style="color:#FD880A;"></i>
                                    <?php echo $generalContactRow['phone'] ?>
                                </a>
                            </p>
                            <p class="last-type">
                                <a href="mailto:<?php echo $generalContactRow['email'] ?>">
                                    <i class="fa fa-envelope-o" aria-hidden="true" style="color:#FD880A;"></i>
                                    <?php echo $generalContactRow['email'] ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once './includes/sidebar.php' ?>
        </div>
    </div>
</div>

<?php include_once './includes/footer.php' ?>