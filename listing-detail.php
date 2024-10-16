<?php include "./includes/header.php" ?>

<?php
$businesslink = $_GET['businesslink'];
$pageQuery = $conn->query("SELECT * FROM `listings` WHERE `businesslink` = '$businesslink'");
$pageRow = $pageQuery->fetch_assoc();
?>
<div class="subheader subheader-two">
    <div class="subheader-two-block">
    </div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">
                <a href="sub-category.php?pages=<?php echo $pageRow['link'] ?>">
                    <?php echo $pageRow['fname'] ?>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a
                    href="sub-category-listing.php?link=<?php echo $pageRow['link'] ?>&pages=<?php echo $pageRow['pages'] ?>">
                    <?php echo $pageRow['name'] ?>
                </a>
            </li>
            <li class="breadcrumb-item active"><?php echo $pageRow['businessname'] ?></li>
        </ol>
    </div>
</div>
<div class="single-post-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 push-lg-3">
                <div>
                    <img src="admin/uploads/listings/<?php echo $pageRow['photo'] ?>">
                </div>
                <div style="padding:20px 30px;">
                    <h3><?php echo $pageRow['businessname'] ?></li>
                    </h3>
                    <div style="margin-top:10px;">
                        <ul id="dt-fle">
                            <li>Published on: <b><?php echo $pageRow['date'] ?></b></li>
                            <li>Listed In: <b>
                                    <a href="sub-category.php?pages=<?php echo $pageRow['link'] ?>">
                                        <?php echo $pageRow['fname'] ?>
                                    </a>
                                </b>
                            </li>
                            <li>Location: <b>
                                    <a href="city-listing.php?citylink=<?php echo $pageRow['citylink'] ?>">
                                        <?php echo $pageRow['city'] ?>
                                    </a>,
                                    <a href="state-listing.php?statelink=<?php echo $pageRow['statelink'] ?>">
                                        <?php echo $pageRow['state'] ?>
                                    </a>
                                </b>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-around" style="padding:20px 30px;">
                    <div class="col-md-4 col-sm-4 col-xs-12"
                        style="text-align:center; margin-bottom:5px; padding:5px 10px;">
                        <a>
                            <i class="fa fa-share-alt-square" aria-hidden="true"
                                style="margin-right:5px;color:#C96E0B;">
                            </i>
                            <span>Share</span>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12"
                        style="text-align:center; margin-bottom:5px; padding:5px 10px;">
                        <a href="#"><i class="fa fa-star" aria-hidden="true"
                                style="margin-right:5px;color:#C96E0B;"></i><span>Add to
                                Favorite</span>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12"
                        style="text-align:center; margin-bottom:5px; padding:5px 10px;">
                        <a href="#"> <i class="fa fa-exclamation-triangle" aria-hidden="true"
                                style="margin-right:5px;color:#C96E0B;"></i>
                            <span>Report</span>
                        </a>
                    </div>
                </div>
                <div style="padding: 20px 30px;">
                    <div class="heading-panel">
                        <h3 class="main-title text-left">
                            Description
                        </h3>
                        <p>
                            <?php echo $pageRow['brief'] ?>
                        </p>
                    </div>
                </div>
                <div style="padding: 20px 30px;">
                    <h3>Buisness Address</h3>
                    <p><?php echo $pageRow['address'] ?></p>
                </div>
                <div class="write-review-section">
                    <div class="write-review-title">
                        <h4>Rate & Write a Review</h4>
                    </div>
                    <div class="write-review-inner">
                        <h4>Your review will be posted publicly on the web.</h4>
                        <form class="form-common">
                            <div class="form-group ratting-area">
                                <div class='rating-stars text-center'>
                                    <ul id='stars'>
                                        <li class='star' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="userName">Name</label>
                                <input type="text" class="form-control" id="userName"
                                    placeholder="Enter your name here">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group textarea-form-group">
                                <label for="review-input-entry">Review</label>
                                <textarea rows="8" cols="50" id="review-input-entry" class="form-control"
                                    placeholder="Write your review here"></textarea>
                            </div>
                            <button type="submit" class="listing-btn-large">Signup & Post Review</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pull-lg-9">
                <div class="sidebar">
                    <div class="widget businesshours-widget">
                        <div class="widget-title">
                            <h4 style="padding:10px 0;">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <?php echo $pageRow['mobile'] ?>
                            </h4>
                            <a href="not-created-yet">
                                <button type="submit" class="listing-btn-large">
                                    Contact Us
                                </button>
                            </a>
                        </div>
                        <div class="widget-body">
                            <b><?php echo $pageRow['businessname'] ?></li></b>
                            <span>Published on: <?php echo $pageRow['date'] ?></span>
                            <div class="" style="font-size:20px;margin-top:10px;">
                                <span>
                                    Folow us:
                                </span>
                                <ul class="social" style="color:black;">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-facebook" aria-hidden="true"
                                                style="color:rgb(0, 89, 253);"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-twitter" aria-hidden="true"
                                                style="color:rgb(0, 204, 255);"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-youtube-play" aria-hidden="true"
                                                style="color:rgb(252, 0, 0);"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget othersinfo-widget">
                        <div class="widget-title">
                            <h5>
                                Details
                            </h5>
                        </div>
                        <div class="widget-body" style="padding:25px 10px;">
                            <ul class="list-det">
                                <li>
                                    Listing Id:
                                    <span><?php echo $pageRow['listno'] ?></span>
                                </li>
                                <li>
                                    Categories:
                                    <span><?php echo $pageRow['fname'] ?></span>
                                </li>
                                <li>
                                    Visits:
                                    <?php
                                    $listno = $pageRow['listno'];
                                    $listingVisitQuery = $conn->query("SELECT COUNT(listno) AS visitCount FROM `listingvisit` WHERE `listno` = '$listno'");
                                    $visitCountRow = $listingVisitQuery->fetch_assoc();
                                    ?>
                                    <span><?php echo $visitCountRow['visitCount'] ?></span>
                                </li>
                                <li>
                                    Area:
                                    <span><?php echo $pageRow['suburb'] ?></span>
                                </li>
                                <li>
                                    City:
                                    <span><?php echo $pageRow['city'] ?></span>
                                </li>
                                <li>
                                    State:
                                    <span><?php echo $pageRow['state'] ?></span>
                                </li>
                                <li>
                                    Postcode:
                                    <span><?php echo $pageRow['postcode'] ?></span>
                                </li>
                                <li>
                                    Location:
                                    <span><?php echo $pageRow['state'] ?>, India</span>
                                </li>
                                <?php if ($pageRow['website']) { ?>
                                    <li>
                                        Website:
                                        <span><?php echo $pageRow['website'] ?></span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php if (trim($pageRow['maplocation'])) { //work here for adjusting map ?>
                        <div id="map_widget" class="widget map-widget">
                            <iframe src="<?php echo $pageRow['maplocation'] ?>" frameborder="0"></iframe>
                        </div><br>
                    <?php } ?>
                    <div class="widget businesshours-widget">
                        <div class="widget-title">
                            <h5>
                                <i class="fa fa-clock-o" aria-hidden="true"></i> Opening Hours
                            </h5>
                            <h5 class="current-schedule">Open</h5>
                        </div>
                        <div class="widget-body">
                            <div class="businesshours">
                                <div class="hrs-row">
                                    <span class="day">
                                        Monday
                                    </span>
                                    <span class="hours">
                                        <?php echo $pageRow['dayam1'] . " - " . $pageRow['daypm1'] ?>
                                    </span>
                                </div>
                                <div class="hrs-row">
                                    <span class="day">
                                        Tuesday
                                    </span>
                                    <span class="hours">
                                        <?php echo $pageRow['dayam2'] . " - " . $pageRow['daypm2'] ?>
                                    </span>
                                </div>
                                <div class="hrs-row">
                                    <span class="day">
                                        Wednesday
                                    </span>
                                    <span class="hours">
                                        <?php echo $pageRow['dayam3'] . " - " . $pageRow['daypm3'] ?>
                                    </span>
                                </div>
                                <div class="hrs-row">
                                    <span class="day">
                                        Thursday
                                    </span>
                                    <span class="hours">
                                        <?php echo $pageRow['dayam4'] . " - " . $pageRow['daypm4'] ?>
                                    </span>
                                </div>
                                <div class="hrs-row">
                                    <span class="day">
                                        Friday
                                    </span>
                                    <span class="hours">
                                        <?php echo $pageRow['dayam5'] . " - " . $pageRow['daypm5'] ?>
                                    </span>
                                </div>
                                <div class="hrs-row">
                                    <span class="day">
                                        Saturday
                                    </span>
                                    <span class="hours">
                                        <?php echo $pageRow['dayam6'] . " - " . $pageRow['daypm6'] ?>
                                    </span>
                                </div>
                                <div class="hrs-row">
                                    <span class="day">
                                        Sunday
                                    </span>
                                    <span class="hours">
                                        <?php echo $pageRow['dayam7'] . " - " . $pageRow['daypm7'] ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget contact-form-wdiget">
                        <div class="widget-title">
                            <h5>
                                Safety tips for deal
                            </h5>
                        </div>
                        <div class="widget-body">
                            <ol style="padding:0;">
                                <li>Use a safe location to meet seller</li>
                                <li>Avoid cash transactions</li>
                                <li>Beware of unrealistic offers</li>
                            </ol>
                        </div>
                    </div>
                    <div class="widget contact-form-wdiget">
                        <div class="widget-title">
                            <h5>
                                Advertisement
                            </h5>
                        </div>
                        <div class="widget-body">
                            <img src="images/banner.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./includes/footer.php" ?>