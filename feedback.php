<?php include_once './includes/header.php' ?>
<div class="subheader">
    <h2>Feedback</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Feedback</li>
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
                    <h3 style="margin-bottom:20px;">Feedback</h3>
                    <div class="contactform-block">
                        <form id="contactForm" class="form-common">
                            <div class="form-group">
                                <input id="name" type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input id="phone" type="text" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group textarea-form-group">
                                <textarea id="message" rows="5" cols="5" class="form-control"
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
                                256 Christchurch Road, California, CA785853
                            </p>
                            <p>
                                <i class="fa fa-phone" aria-hidden="true" style="color:#FD880A;"></i>

                                +1-0000-000-000,
                                +1-0000-000-000

                            </p>
                            <p class="last-type">
                                <a href="#">
                                    <i class="fa fa-envelope-o" aria-hidden="true" style="color:#FD880A;"></i>
                                    info@example.com
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