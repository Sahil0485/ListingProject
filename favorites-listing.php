<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/auth.php" ?>

<a href="#" id="slide-nav-trigger" class="slide-nav-trigger">
    <i class="fa fa-bars" aria-hidden="true"></i>
    Dashboard Navigation
</a>
<?php include_once "./includes/user-sidebar.php" ?>
<div class="page-container-wrap">
    <div class="container-fluid">
        <div class="row">
            <?php
            //savelistngs table is also not available in database
            $activeListingQuery = $conn->query("SELECT * FROM `savelistings` WHERE `email` = '$user_email' AND `status` = 'Active' ORDER BY `listtype` DESC");
            if ($activeListingQuery->num_rows == 0) {
                ?>
                <h2>No Favourite listings</h2>
                <?php
            } else {
                while ($activeListingRow = $activeListingQuery->fetch_assoc()) {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <article class="popular-listing-post">
                            <div class="post-thumb">
                                <img src="admin/uploads/listings/<?php echo $activeListingRow['photo'] ? $activeListingRow['photo'] : 'nophoto.jpg' ?>"
                                    alt="img" class="img-responsive" width="400px" height="200px">
                                <div class="listing-info">
                                    <h4><a
                                            href="listing-detail.php?businesslink=<?php echo $activeListingRow['businesslink'] ?>">
                                            <?php echo $activeListingRow['businessname'] ?>
                                        </a>
                                    </h4>
                                    <p><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $activeListingRow['name'] ?></p>
                                </div>
                                <div class="rating-area">
                                    <ul>
                                        <?php
                                        // $activeListno = $activeListingRow['listno'];
                                        // $ratingQuery = $conn->query("SELECT SUM(listrating) FROM `listrating` WHERE `listno` = '$activeListno' ORDER BY `id` DESC")
                                        ?>
                                        <!-- there is another missing table with name of listrating -->
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
                                                data-target="#<?php echo $activeListingRow['listno'] ?>">
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
                                            <a href="state-listing.php?statelink=<?php echo $activeListingRow['statelink'] ?>">
                                                <?php echo $activeListingRow['state'] ?>
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
                                        <?php custom_echo($activeListingRow['brief'], 95) ?>
                                    </p>
                                </div>
                                <div class="post-footer">
                                    <div class="contact-no">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <h5><?php echo $activeListingRow['mobile'] ?></h5>
                                    </div>
                                    <div class="schedule-info open">
                                        <h5><?php echo $activeListingRow['status'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    <div class="col-md-12">
        <?php include_once "./includes/footer.php" ?>
    </div>
</div>
<div class="listing-modal-content-section">
    <?php
    $activeListingQueryModal = $conn->query("SELECT * FROM `listings` WHERE `email` = '$user_email' AND `status` = 'Active' ORDER BY `listtype` DESC");
    while ($activeListingRow = $activeListingQueryModal->fetch_assoc()) {
        ?>
        <div class="modal fade listing-modal" id="<?php echo $activeListingRow['listno'] ?>" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog post-model">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <article class="popular-listing-post">
                                    <div class="post-thumb">
                                        <img src="admin/uploads/listings/<?php echo $activeListingRow['photo'] ? $activeListingRow['photo'] : 'nophoto.jpg' ?>"
                                            alt="img" class="img-responsive" style="min-height: 200px;">
                                        <div class="listing-info">
                                            <h4><a
                                                    href="listing-detail.php?businesslink=<?php echo $activeListingRow['businesslink'] ?>">
                                                    <?php echo $activeListingRow['businessname'] ?>
                                                </a>
                                            </h4>
                                            <p><i class="fa fa-bed" aria-hidden="true"></i>
                                                <?php echo $activeListingRow['name'] ?></p>
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
                                                        href="state-listing.php?statelink=<?php echo $activeListingRow['statelink'] ?>">
                                                        <?php echo $activeListingRow['state'] ?>
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
                                                <?php echo $activeListingRow['brief'] ?>
                                            </p>
                                        </div>
                                        <div class="post-footer">
                                            <div class="contact-no">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <h5> <?php echo $activeListingRow['mobile'] ?></h5>
                                            </div>
                                            <div class="schedule-info open">
                                                <h5><?php echo $activeListingRow['status'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="row">
                                <div id="listing_post_map_one" class="listing-post-map"></div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>