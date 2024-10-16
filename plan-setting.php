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
            $planPageQuery = $conn->query("SELECT * FROM `listingplan` ORDER BY `id`");
            while ($planPageRow = $planPageQuery->fetch_assoc()) {
                ?>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="pricing-block <?php echo $user_listtype == $planPageRow['typelisting'] ? 'standard' : '' ?>">
                        <p class="pricing-heading"><?php echo $planPageRow['planbrief'] ?></p>
                        <div class="price-block">
                            <h4><?php echo $planPageRow['price'] ?> / Month</h4>
                        </div>
                        <div class="packages">
                            <p><strong>No of Lisitings</strong>&nbsp;&nbsp; <?php echo $planPageRow['numberlisting'] ?></p>
                            <p><strong>Availability</strong>&nbsp;&nbsp;
                                <?php
                                if ($planPageRow['periodtype'] == 'Unlimited') {
                                    echo 'Unlimited';
                                } else {
                                    echo $planPageRow['nodays'] . ' Days';
                                } ?>
                            </p>
                            <p><strong>No of Images</strong>&nbsp;&nbsp;
                                <?php
                                if ($planPageRow['typelisting'] == 'Premium') {
                                    echo '20';
                                } elseif ($planPageRow['typelisting'] == 'Featured') {
                                    echo '10';
                                } else {
                                    echo '4';
                                }
                                ?>
                            </p>
                            <p><strong>Listing Type</strong>&nbsp;&nbsp; <?php echo $planPageRow['listingplan'] ?></p>
                        </div>
                        <a href="javascript:void(0)" class="pricing-btn">
                            <?php echo $user_listtype == $planPageRow['typelisting'] ? 'You already have subscribed' : 'Another plan exists' ?>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div><br>
    <div class="col-md-12">
        <?php include_once "./includes/footer.php" ?>
    </div>
</div>