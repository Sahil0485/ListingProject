<?php include_once './includes/header.php'; ?>

<div class="dashBoard-section-1 nmbr-statistic-area">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="box-widget">
                <div class="nmbr-statistic-block user-statistic">
                    <div class="nmbr-statistic-info">
                        <span class="number">
                            <?php
                            $listinglist = mysqli_query($conn, "SELECT * FROM `listings`");
                            echo $listingcount = mysqli_num_rows($listinglist);
                            ?>
                        </span>
                        <span class="a-meta-title">Listings<span class="highlight-text">+12%</span></span>
                    </div>
                    <span class="nmbr-statistic-icon">L</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="box-widget">
                <div class="nmbr-statistic-block visitors-statistic">
                    <div class="nmbr-statistic-info">
                        <span class="number">
                            <?php
                            $categorylist = mysqli_query($conn, "SELECT * FROM `addcategory`");
                            $categorycount = mysqli_num_rows($categorylist);
                            $subcategorylist = mysqli_query($conn, "SELECT * FROM `subcategory`");
                            $subcategorycount = mysqli_num_rows($subcategorylist);
                            echo $totalcategory = $categorycount + $subcategorycount;
                            ?>
                        </span>
                        <span class="a-meta-title">Categories<span class="highlight-text">+19%</span></span>
                    </div>
                    <span class="nmbr-statistic-icon">C</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="box-widget">
                <div class="nmbr-statistic-block sales-statistic">
                    <div class="nmbr-statistic-info">
                        <span class="number">
                            <?php
                            $statelist = mysqli_query($conn, "SELECT * FROM `state`");
                            echo $statecount = mysqli_num_rows($statelist);
                            ?>
                        </span>
                        <span class="a-meta-title">Location<span class="highlight-text">+60%</span></span>
                    </div>
                    <span class="nmbr-statistic-icon">L</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="box-widget">
                <div class="nmbr-statistic-block Subscribers-statistic">
                    <div class="nmbr-statistic-info">
                        <span class="number">
                            <?php
                            $userslist = mysqli_query($conn, "SELECT * FROM `users`");
                            echo $userscount = mysqli_num_rows($userslist);
                            ?>
                        </span>
                        <span class="a-meta-title">User Registrations<span class="highlight-text">+29%</span></span>
                    </div>
                    <span class="nmbr-statistic-icon">UR</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashBoard-section-4">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="box-widget">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Recent Registrations</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="responsive-table-block editable-datatable-block">
                            <table id="editable-datatable"
                                class="editable-datatable display table table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = "SELECT * FROM `users` order by userid desc limit 10";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="action-user.php?edit=<?php echo $row['id']; ?>">
                                                    <?php custom_echo($row['fullname'], 5); ?>
                                                </a>
                                            </td>
                                            <td><?php custom_echo($row['email'], 5); ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                        </tr>
                                        <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="box-widget">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Recent Listing</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="responsive-table-block editable-datatable-block">
                            <table id="editable-datatable"
                                class="editable-datatable display table table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>List ID</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = "select distinct listno from listings order by id desc limit 10";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="action-listing.php?listno=<?php echo $row['listno']; ?>">
                                                    <?php echo $row['listno']; ?>
                                                </a>
                                            </td>
                                            <?php
                                            $presults = mysqli_query($conn, "SELECT *FROM listings where listno='" . $row['listno'] . "'");
                                            $drows = mysqli_fetch_array($presults); ?>
                                            <td><?php custom_echo($drows['fname'], 5); ?></td>
                                            <td>
                                                <?php
                                                $psql = "select * from listings where listno='" . $row['listno'] . "' order by id desc";
                                                $pquery = mysqli_query($conn, $psql);
                                                while ($prow = mysqli_fetch_array($pquery)) {
                                                    ?>

                                                    <?php custom_echo($prow['name'], 5); ?> <br>

                                                <?php } ?>
                                            </td>
                                            <td><?php echo $drows['listtype']; ?></td>
                                            <td><?php echo $drows['status']; ?></td>
                                        </tr>
                                        <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashBoard-section-4">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="box-widget">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Recent Orders</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="responsive-table-block editable-datatable-block">
                            <table id="editable-datatable"
                                class="editable-datatable display table table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Full Name</th>
                                        <th>Amount</th>
                                        <th>List No</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $sql = "SELECT * from `invoicedetails` order by id desc limit 5";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="payment-report-detail.php?id=<?php echo $row['id']; ?>">
                                                    <?php echo $row['orderid']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['listno']; ?></td>
                                            <td><?php echo $row['paymenttime']; ?></td>
                                        </tr>
                                        <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                            <div class="btn btn-link btn-raised btn-rounded waves-effect">
                                <a href="payment-reports.php">View All <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="box-widget">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Statics</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="responsive-table-block editable-datatable-block">
                            <table id="editable-datatable"
                                class="editable-datatable display table table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>Page Title</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>User's Profile</td>
                                        <td>
                                            <a href="verified-user.php"> <?php
                                            $userslist = mysqli_query($conn, "SELECT *FROM users");
                                            echo $userscount = mysqli_num_rows($userslist);
                                            ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Category</td>
                                        <td>
                                            <a href="view-category.php">
                                                <?php
                                                $categorylist = mysqli_query($conn, "SELECT *FROM addcategory");
                                                $categorycount = mysqli_num_rows($categorylist);
                                                $subcategorylist = mysqli_query($conn, "SELECT *FROM subcategory");
                                                $subcategorycount = mysqli_num_rows($subcategorylist);
                                                echo $totalcategory = $categorycount + $subcategorycount; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Location </td>
                                        <td>
                                            <a href="view-suburb.php">
                                                <?php
                                                $statelist = mysqli_query($conn, "SELECT *FROM state");
                                                echo $statecount = mysqli_num_rows($statelist);
                                                ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Listing</td>
                                        <td>
                                            <a href="view-listing.php">
                                                <?php
                                                $listinglist = mysqli_query($conn, "SELECT *FROM listings");
                                                echo $listingcount = mysqli_num_rows($listinglist);
                                                ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Advertisement </td>
                                        <td>
                                            <a href="view-right-banner.php">
                                                <?php
                                                $bannerlist = mysqli_query($conn, "SELECT *FROM bannerrightpage");
                                                echo $bannercount = mysqli_num_rows($bannerlist);
                                                ?>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn btn-link btn-raised btn-rounded waves-effect">
                                <a href="statics.php">View All <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once './includes/footer.php'; ?>