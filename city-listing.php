<?php include_once "./includes/header.php" ?>

<?php
$citylink = $_GET['citylink'];
$pageQuery = $conn->query("SELECT * FROM `listings` WHERE `citylink` = '$citylink'");
$pageRow = $pageQuery->fetch_assoc();
?>
<div class="subheader">
    <h2><?php echo $pageRow['city'] ?></h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a
                    href="state-listing.php?statelink=<?php echo $pageRow['statelink'] ?>"><?php echo $pageRow['state'] ?>
                </a></li>
            <li class="breadcrumb-item active"><?php echo $pageRow['city'] ?></li>
        </ol>
    </div>
</div>
</div>
<div class="popular-listing-section">
    <div class="container">
        <div class="row">
            <?php
            $listingQuery = $conn->query("SELECT * FROM `listings` WHERE `status` = 'Active' AND `citylink` = '$citylink'");
            if ($listingQuery->num_rows == 0) {
                echo "<script>";
                echo "alert('This page is empty');";
                echo "window.location.href='state-listing.php?statelink=" . $pageRow['statelink'] . "';";
                echo "</script>";
                exit();
            }
            while ($listingRow = $listingQuery->fetch_assoc()) {
                ?>
                <div class="col-lg-4 col-md-6">
                    <article class="popular-listing-post">
                        <div class="post-thumb">
                            <img src="admin/uploads/listings/<?php echo $listingRow['photo'] ? $listingRow['photo'] : 'nophoto.jpg' ?>"
                                alt="img" class="img-responsive" width="400px" style="min-height: 200px; max-height: 300px;"
                                height="200px">
                            <div class="listing-info">
                                <h4><a href="listing-detail.php?businesslink=<?php echo $listingRow['businesslink'] ?>">
                                        <?php echo $listingRow['businessname'] ?>
                                    </a>
                                </h4>
                                <p><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $listingRow['name'] ?>
                                </p>
                            </div>
                            <div class="rating-area">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <span>
                                    (5.0/4)
                                </span>
                            </div>
                            <div class="option-block">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="bookmark">

                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-toggle="modal"
                                            data-target="#<?php echo $listingRow['listno'] ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="overlay" style="background: rgba(1,1,1,0.3);"></div>
                        </div>
                        <div class="post-details">
                            <div class="post-meta">
                                <div class="location">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h5>
                                        <a href="suburb-listing.php?suburblink=<?php echo $listingRow['suburblink'] ?>">
                                            <?php echo $listingRow['suburb'] ?>
                                        </a>
                                    </h5>
                                </div>
                                <div class="tag">
                                    <span>Ad</span>
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="post-entry-block">
                                <p class="post-entry">
                                    <?php custom_echo($listingRow['brief'], 95) ?>
                                </p>
                            </div>
                            <div class="post-footer">
                                <div class="contact-no">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <h5><?php echo $listingRow['mobile'] ?></h5>
                                </div>
                                <div class="schedule-info open">
                                    <h5><?php echo $listingRow['status'] ?></h5>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="listing-modal-content-section">
    <div class="container">
        <?php
        $listingQueryModal = $conn->query("SELECT * FROM `listings` WHERE `citylink` = '$citylink' AND `status` = 'Active' ORDER BY `listtype` DESC");
        while ($listingRow = $listingQueryModal->fetch_assoc()) {
            ?>
            <div class="modal fade listing-modal" id="<?php echo $listingRow['listno'] ?>" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog post-model">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <article class="popular-listing-post" style="width:100%;">
                                        <div class="post-thumb">
                                            <?php if ($listingRow['photo']) { ?>
                                                <img src="admin/uploads/listings/<?php echo $listingRow['photo'] ? $listingRow['photo'] : 'nophoto.jpg' ?>"
                                                    alt="img" class="img-responsive"
                                                    style="width: 100%;min-height: 200px; max-height: 600px;">
                                            <?php } else {
                                                echo '<br><br><br><br>';
                                            } ?>
                                            <div class="listing-info">
                                                <h4><a
                                                        href="listing-detail.php?businesslink=<?php echo $listingRow['businesslink'] ?>">
                                                        <?php echo $listingRow['businessname'] ?>
                                                    </a>
                                                </h4>
                                                <p><i class="fa fa-bed" aria-hidden="true"></i>
                                                    <?php echo $listingRow['name'] ?></p>
                                            </div>
                                            <div class="rating-area">
                                                <ul>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                </ul>
                                                <span>
                                                    (5.0/4)
                                                </span>
                                            </div>
                                            <div class="option-block">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)" class="bookmark">

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="overlay" style="background: rgba(1,1,1,0.3);"></div>
                                        </div>
                                        <div class="post-details">
                                            <div class="post-meta">
                                                <div class="location">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <h5>
                                                        <a
                                                            href="suburb-listing.php?suburblink=<?php echo $listingRow['suburblink'] ?>">
                                                            <?php echo $listingRow['suburb'] ?>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="tag">
                                                    <span>Ad</span>
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="post-entry-block">
                                                <p class="post-entry">
                                                    <?php echo $listingRow['brief'] ?>
                                                </p>
                                            </div>
                                            <div class="post-footer">
                                                <div class="contact-no">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <h5> <?php echo $listingRow['mobile'] ?></h5>
                                                </div>
                                                <div class="schedule-info open">
                                                    <h5><?php echo $listingRow['status'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include_once "./includes/footer.php" ?>