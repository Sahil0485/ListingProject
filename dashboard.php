<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/auth.php" ?>

<a href="#" id="slide-nav-trigger" class="slide-nav-trigger">
    <i class="fa fa-bars" aria-hidden="true"></i>
    Dashboard Navigation
</a>
<?php include_once "./includes/user-sidebar.php" ?>
<div class="page-container-wrap">
    <div class="container-fluid">
        <div class="dashBoard-section-1 nmbr-statistic-area">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="breadcrumb-call-to-action">
                            <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $user_mobileno ?></p>
                            <a href="javascript:void(0)" class="listing-btn-large">
                                Save &amp; Preview
                            </a>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-widget">
                        <div class="nmbr-statistic-block user-statistic">
                            <div class="nmbr-statistic-info">
                                <?php
                                $totalListingCountQuery = $conn->query("SELECT COUNT(listno) AS num FROM `listings` WHERE `email` = '$user_email'");
                                $totalListingCountRow = $totalListingCountQuery->fetch_assoc();
                                ?>
                                <span class="number"><?php echo $totalListingCountRow['num'] ?></span>
                                <span class="a-meta-title">TOTAL LISTINGS<span class="highlight-text">+12%</span>
                                </span>
                            </div>
                            <span class="nmbr-statistic-icon">TL</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-widget">
                        <div class="nmbr-statistic-block visitors-statistic">
                            <div class="nmbr-statistic-info">
                                <?php
                                $totalListingCountQuery = $conn->query("SELECT COUNT(listno) AS num FROM `listings` WHERE `email` = '$user_email' AND `status` = 'Active'");
                                $totalListingCountRow = $totalListingCountQuery->fetch_assoc();
                                ?>
                                <span class="number"><?php echo $totalListingCountRow['num'] ?></span>
                                <span class="a-meta-title">Active Listings<span class="highlight-text">+19%</span>
                                </span>
                            </div>
                            <span class="nmbr-statistic-icon">AL</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="box-widget">
                        <div class="nmbr-statistic-block sales-statistic">
                            <div class="nmbr-statistic-info">
                                <?php
                                $totalListingCountQuery = $conn->query("SELECT COUNT(listno) AS num FROM `listings` WHERE `email` = '$user_email' AND `status` = 'waiting'");
                                $totalListingCountRow = $totalListingCountQuery->fetch_assoc();
                                ?>
                                <span class="number"><?php echo $totalListingCountRow['num'] ?></span>
                                <span class="a-meta-title">Pending Listings<span class="highlight-text">+60%</span>
                                </span>
                            </div>
                            <span class="nmbr-statistic-icon">PL</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="box-widget eql-height">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Activity</h4>
                                </div>
                            </div>
                            <div class="panel-body activity-panel-body">
                                <div class="activity-block-area">
                                    <ul class="activity-list">
                                        <li class="primary">
                                            <div class="activity-content">
                                                <span>10 min ago</span>
                                                <p>The point of using Lorem Ipsum</p>
                                            </div>
                                        </li>
                                        <li class="warning">
                                            <div class="activity-content">
                                                <span>10 min ago</span>
                                                <p>The point of using Lorem Ipsum</p>
                                            </div>
                                        </li>
                                        <li class="success">
                                            <div class="activity-content">
                                                <span>10 min ago</span>
                                                <p>The point of using Lorem Ipsum</p>
                                            </div>
                                        </li>
                                        <li class="warning-two">
                                            <div class="activity-content">
                                                <span>10 min ago</span>
                                                <p>The point of using Lorem Ipsum</p>
                                            </div>
                                        </li>
                                        <li class="warning">
                                            <div class="activity-content">
                                                <span>10 min ago</span>
                                                <p>The point of using Lorem Ipsum</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="box-widget">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Review</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="comments listing-reviews">
                                    <ul>
                                        <li>
                                            <div class="avatar-block">
                                                <img src="images/post/author/5.jpg" alt="img" class="img-responsive">
                                                <div class="comment-by">
                                                    <h4><a href="javascript:void(0)">Oliver liam</a></h4>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <h4>It was an awesome experience</h4>
                                                <div class="meta">
                                                    <span class="date">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        25 December 2018
                                                    </span>
                                                    <span class="time">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        10:35pm
                                                    </span>
                                                </div>
                                                <div class="review-entry">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                        nostrud exercitation.
                                                    </p>
                                                </div>
                                                <a href="javascript:void(0)" class="replay-btn">
                                                    <i class="fa fa-reply" aria-hidden="true"></i> Replay
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="avatar-block">
                                                <img src="images/post/author/6.jpg" alt="img" class="img-responsive">
                                                <div class="comment-by">
                                                    <h4><a href="javascript:void(0)">Oliver liam</a></h4>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <h4>It was an awesome experience</h4>
                                                <div class="meta">
                                                    <span class="date">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        25 December 2018
                                                    </span>
                                                    <span class="time">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        10:35pm
                                                    </span>
                                                </div>
                                                <div class="review-entry">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                        nostrud exercitation.
                                                    </p>
                                                </div>
                                                <a href="javascript:void(0)" class="replay-btn">
                                                    <i class="fa fa-reply" aria-hidden="true"></i> Replay
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="box-widget">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Payment & analytics</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="basic-table-block">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Listing Name</th>
                                                <th>Views(week)</th>
                                                <th>Payment</th>
                                                <th>Listing Type</th>
                                                <th>Make Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Red Blue Restaurant</td>
                                                <td>5245</td>
                                                <td><span class="done">Done</span></td>
                                                <td><span class="premium">Premium</span></td>
                                                <td><span class="payment">Payment</span></td>
                                            </tr>
                                            <tr>
                                                <td>Red Blue Restaurant</td>
                                                <td>5245</td>
                                                <td><span class="done">Done</span></td>
                                                <td><span class="premium">Premium</span></td>
                                                <td><span class="payment">Payment</span></td>
                                            </tr>
                                            <tr>
                                                <td>Red Blue Restaurant</td>
                                                <td>5245</td>
                                                <td><span class="no">No</span></td>
                                                <td><span class="free">Free</span></td>
                                                <td><span class="payment">Payment</span></td>
                                            </tr>
                                            <tr>
                                                <td>Red Blue Restaurant</td>
                                                <td>5245</td>
                                                <td><span class="done">Done</span></td>
                                                <td><span class="premium">Premium</span></td>
                                                <td><span class="payment">Payment</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php include_once "./includes/footer.php" ?>
                </div>
            </div>
        </div>
    </div>
</div>