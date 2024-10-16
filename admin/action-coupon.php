<?php include_once './includes/header.php'; ?>
<?php
$pageName = "Manage Coupon";
$tableName = "couponpages";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="view-coupon.php">View Coupons</a></li>
            <li class="breadcrumb-item active"><?= $pageName ?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-widget">
            <?php
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Edit Coupon</h4>
                        </div>
                    </div>
                    <?php
                    $editQuery = $conn->query("SELECT * FROM `$tableName` WHERE id = '$id'");
                    if (!$editQuery) {
                        toastMsg("Something went wrong! try again later.", "error");
                        return;
                    }
                    $editRow = $editQuery->fetch_assoc();
                    ?>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group">
                                    <label for="couponname">Discount Coupon Name</label>
                                    <input type="text" class="form-control" id="couponname" name="couponname"
                                        value="<?php echo $editRow['couponname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="couponcode">Discount Coupon Code</label>
                                    <input type="text" class="form-control" id="couponcode" name="couponcode"
                                        value="<?php echo $editRow['couponcode'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="startdate" class="col-lg-2 col-form-label">Start Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="startdate" min="<?php echo date("Y-m-d") ?>"
                                            value="<?php echo date('Y-m-d', strtotime($editRow['startdate'])) ?>"
                                            class="form-control" id="startdate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="enddate" class="col-lg-2 col-form-label">End Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="enddate" min="<?php echo date("Y-m-d") ?>"
                                            value="<?php echo date('Y-m-d', strtotime($editRow['enddate'])) ?>"
                                            class="form-control" id="enddate" required>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="coupontype">Coupon Type</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="coupontype" name="coupontype" required onchange="showAmountInp()">
                                            <?php
                                            if ($editRow['coupontype'] == 'Fixed Amount') {
                                                ?>
                                                <option value="Fixed Amount" selected>Fixed Amount</option>
                                                <option value="Percent Amount">Percent Amount</option>
                                            <?php } else { ?>
                                                <option value="Fixed Amount">Fixed Amount</option>
                                                <option value="Percent Amount" selected>Percent Amount</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="fixedamountcontainer"
                                    style="display: <?php echo ($editRow['coupontype'] == 'Fixed Amount' ? "block" : "none"); ?>;">
                                    <label for="fixedamount">Fixed Amount</label>
                                    <input type="number" class="form-control" id="fixedamount" name="fixedamount"
                                        value="<?php echo $editRow['fixedamount'] ?>" required>
                                </div>
                                <div class="form-group" id="percentamountcontainer"
                                    style="display: <?php echo ($editRow['coupontype'] == 'Percent Amount' ? "block" : "none"); ?>;">
                                    <label for="percentamount">Percent Amount</label>
                                    <input type="number" class="form-control" id="percentamount" name="percentamount"
                                        value="<?php echo $editRow['percentamount'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="numbertimes">Number of Times Use</label>
                                    <input type="number" class="form-control" id="numbertimes" name="numbertimes"
                                        value="<?php echo $editRow['numbertimes'] ?>">
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="status" name="status" required>
                                            <?php
                                            if ($editRow['status'] == 'Active') {
                                                ?>
                                                <option value="Active" selected>Active</option>
                                                <option value="DeActive">Deactive</option>
                                            <?php } else { ?>
                                                <option value="Active">Active</option>
                                                <option value="DeActive" selected>Deactive</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-btn-block">
                                    <button type="submit" name="submit"
                                        class="btn btn-raised btn-primary waves-effect waves-light">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Add Coupon</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group">
                                    <label for="couponname">Discount Coupon Name</label>
                                    <input type="text" class="form-control" id="couponname" name="couponname"
                                        placeholder="Enter Coupon Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="couponcode">Discount Coupon Code</label>
                                    <input type="text" class="form-control" id="couponcode" name="couponcode"
                                        placeholder="Coupon Code" required>
                                </div>
                                <div class="form-group">
                                    <label for="startdate" class="col-lg-2 col-form-label">Start Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="startdate" min="<?php echo date("Y-m-d") ?>"
                                            class="form-control" id="startdate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="enddate" class="col-lg-2 col-form-label">End Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="enddate" min="<?php echo date("Y-m-d") ?>"
                                            class="form-control" id="enddate" required>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="coupontype">Coupon Type</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="coupontype" name="coupontype" required
                                            onchange="showAmountInp()">
                                            <option value="" disabled selected>Select Coupon Type</option>
                                            <option value="Fixed Amount">Fixed Amount</option>
                                            <option value="Percent Amount">Percent Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="fixedamountcontainer" style="display: none;">
                                    <label for="fixedamount">Fixed Amount</label>
                                    <input type="number" class="form-control" id="fixedamount" name="fixedamount"
                                        placeholder="Enter Amount">
                                </div>
                                <div class="form-group" id="percentamountcontainer" style="display: none;">
                                    <label for="percentamount">Percent Amount</label>
                                    <input type="number" class="form-control" id="percentamount" name="percentamount"
                                        placeholder="Enter Amount">
                                </div>
                                <div class="form-group">
                                    <label for="numbertimes">Number of Times Use</label>
                                    <input type="number" class="form-control" id="numbertimes" name="numbertimes"
                                        placeholder="e.g., 1" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="status" name="status" required>
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="DeActive">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-btn-block">
                                    <button type="submit" name="submit"
                                        class="btn btn-raised btn-primary waves-effect waves-light">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    function showAmountInp() {
        let coupontype = document.getElementById("coupontype");
        if (coupontype.value == "Fixed Amount") {
            document.getElementById("fixedamountcontainer").style.display = "block";
            document.getElementById("percentamountcontainer").style.display = "none";
        } else if (coupontype.value == "Percent Amount") {
            document.getElementById("percentamountcontainer").style.display = "block";
            document.getElementById("fixedamountcontainer").style.display = "none";
        } else {
            document.getElementById("fixedamountcontainer").style.display = "none";
            document.getElementById("percentamountcontainer").style.display = "none";
        }
    }
</script>
<?php

if (isset($_POST['submit'])) {
    $couponname = trim($_POST['couponname']);
    $couponcode = trim($_POST['couponcode']);
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $coupontype = trim($_POST['coupontype']);
    $fixedamount = $_POST['fixedamount'];
    $percentamount = $_POST['percentamount'];
    $numbertimes = $_POST['numbertimes'];
    $status = trim($_POST['status']);

    if(strtotime($startdate) > strtotime($enddate)){
        toastMsg("Start date must be earlier than end date", "error");
        return;
    }

    if ($_GET['edit']) {
        $Query = $conn->query("UPDATE `$tableName` SET `couponname` = '$couponname', `couponcode` = '$couponcode', `startdate` = '$startdate', `enddate` = '$enddate', `coupontype` = '$coupontype', `fixedamount` = '$fixedamount', `percentamount` = '$percentamount', `numbertimes` = '$numbertimes', `status` = '$status', `date` = NOW() WHERE id='$id'");
    } else {
        $Query = $conn->query("INSERT INTO `$tableName` (`couponname`, `couponcode`, `startdate`, `enddate`, `coupontype`, `fixedamount`, `percentamount`, `numbertimes`, `status`) VALUES ('$couponname', '$couponcode', '$startdate', '$enddate', '$coupontype', '$fixedamount', '$percentamount', '$numbertimes', '$status')");
    }
    if (!$Query) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }
    toastMsg("Updated successfully", 'success');
    header('location: ./view-coupon.php');
    exit();

}
?>
<?php include_once './includes/footer.php'; ?>