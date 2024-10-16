<?php include_once './includes/header.php'; ?>
<?php
$pageName = "Manage Listing Plan";
$tableName = "listingplan";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="view-listing-plan.php">View Listing Plans</a></li>
            <li class="breadcrumb-item Yes"><?= $pageName ?></li>
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
                            <h4>Edit Listing Plan</h4>
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
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="listingplan">Type Of Plan</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="listingplan" name="listingplan" required>
                                            <option value="" disabled>-- Select Plan --</option>
                                            <option value="Free Plan" <?php if ($editRow['listingplan'] == 'Free Plan')
                                                echo "selected" ?>>Free Plan</option>
                                                <option value="Featured Plan" <?php if ($editRow['listingplan'] == 'Featured Plan')
                                                echo "selected" ?>> Featured Plan</option>
                                                <option value="Premium Plan" <?php if ($editRow['listingplan'] == 'Premium Plan')
                                                echo "selected" ?>>Premium Plan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="planbrief">Plan Description</label>
                                        <input type="text" class="form-control" id="planbrief" name="planbrief"
                                            value="<?php echo $editRow['planbrief'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Plan Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="<?php echo $editRow['price'] ?>" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="periodtype">Time Period</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="periodtype" name="periodtype" required
                                            onchange="showAmountInp()">
                                            <?php
                                            if ($editRow['periodtype'] == 'Unlimited') {
                                                ?>
                                                <option value="Unlimited" selected>Unlimited</option>
                                                <option value="No of days">No of days</option>
                                            <?php } else { ?>
                                                <option value="Unlimited">Unlimited</option>
                                                <option value="No of days" selected>No of days</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="Unlimitedcontainer"
                                    style="display: <?php echo ($editRow['periodtype'] == 'Unlimited' ? "block" : "none"); ?>;">
                                    <label for="unlimited">Unlimited</label>
                                    <input type="number" class="form-control" id="unlimited" name="unlimited"
                                        placeholder="Unlimited" value="<?php echo $editRow['unlimited'] ?>" required
                                        readonly>
                                </div>
                                <div class="form-group" id="nodayscontainer"
                                    style="display: <?php echo ($editRow['periodtype'] == 'No of days' ? "block" : "none"); ?>;">
                                    <label for="nodays">No of days</label>
                                    <input type="number" class="form-control" id="nodays" name="nodays"
                                        value="<?php echo $editRow['nodays'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="numberlisting">Number of Listing</label>
                                    <input type="number" class="form-control" id="numberlisting" name="numberlisting"
                                        value="<?php echo $editRow['numberlisting'] ?>">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label left-align">Listing Type</label>
                                    <div class="col-md-8">
                                        <div class="form-check form-check-inline">
                                            <label class="custom-control custom-radio fill-colord has-success">
                                                <input id="radioStacked_14" name="typelisting" type="radio"
                                                    class="custom-control-input" value="Free" <?php if ($editRow['typelisting'] == "Free")
                                                        echo "checked" ?> required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Free</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_14" name="typelisting" type="radio"
                                                        class="custom-control-input" value="Featured" <?php if ($editRow['typelisting'] == "Featured")
                                                        echo "checked" ?> required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Featured</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_13" name="typelisting" type="radio"
                                                        class="custom-control-input" value="Premium" <?php if ($editRow['typelisting'] == "Premium")
                                                        echo "checked" ?> required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Premium</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: flex;">
                                        <label class="col-md-3 col-form-label left-align" for="website">Show Website</label>
                                        <div class="form-check">
                                            <select class="custom-select" id="website" name="website" required>
                                                <?php
                                                    if ($editRow['website'] == 'Yes') {
                                                        ?>
                                                <option value="Yes" selected>Yes</option>
                                                <option value="No">No</option>
                                            <?php } else { ?>
                                                <option value="Yes">Yes</option>
                                                <option value="No" selected>No</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-btn-block">
                            <button type="submit" name="submit" class="btn btn-raised btn-primary waves-effect waves-light">
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
                        <h4>Add Listing Plan</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-block">
                        <form class="form-common" enctype="multipart/form-data" method="post" action="">
                            <div class="form-group" style="display: flex;">
                                <label class="col-md-3 col-form-label left-align" for="listingplan">Type Of Plan</label>
                                <div class="form-check">
                                    <select class="custom-select" id="listingplan" name="listingplan" required>
                                        <option value="" selected disabled>-- Select Plan --</option>
                                        <option value="Free Plan">Free Plan</option>
                                        <option value="Featured Plan"> Featured Plan</option>
                                        <option value="Premium Plan">Premium Plan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="planbrief">Plan Description</label>
                                <input type="text" class="form-control" id="planbrief" name="planbrief"
                                    placeholder="Enter Plan Description" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Plan Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Listing Plan Price" required>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="col-md-3 col-form-label left-align" for="periodtype">Time Period</label>
                                <div class="form-check">
                                    <select class="custom-select" id="periodtype" name="periodtype" required
                                        onchange="showAmountInp()">
                                        <option value="" disabled selected>Select Time Period</option>
                                        <option value="Unlimited">Unlimited</option>
                                        <option value="No of days">No of days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="Unlimitedcontainer" style="display: none;">
                                <label for="unlimited">Unlimited</label>
                                <input type="number" class="form-control" id="unlimited" name="unlimited"
                                    placeholder="Unlimited" readonly>
                            </div>
                            <div class="form-group" id="nodayscontainer" style="display: none;">
                                <label for="nodays">No of days</label>
                                <input type="number" class="form-control" id="nodays" name="nodays"
                                    placeholder="Enter Amount">
                            </div>
                            <div class="form-group">
                                <label for="numberlisting">Number of Listing</label>
                                <input type="number" class="form-control" id="numberlisting" name="numberlisting"
                                    placeholder="e.g., 1" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label left-align">Listing Type</label>
                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <label class="custom-control custom-radio fill-colord has-success">
                                            <input id="radioStacked_14" name="typelisting" type="radio"
                                                class="custom-control-input" value="Free" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Free</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="custom-control custom-radio fill-colord has-success">
                                            <input id="radioStacked_14" name="typelisting" type="radio"
                                                class="custom-control-input" value="Featured" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Featured</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="custom-control custom-radio fill-colord has-success">
                                            <input id="radioStacked_13" name="typelisting" type="radio"
                                                class="custom-control-input" value="Premium" required>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Premium</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="col-md-3 col-form-label left-align" for="website">Show Website</label>
                                <div class="form-check">
                                    <select class="custom-select" id="website" name="website" required>
                                        <option value="" disabled selected>Select Show Website</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="form-btn-block">
                        <button type="submit" name="submit" class="btn btn-raised btn-primary waves-effect waves-light">
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
        let periodtype = document.getElementById("periodtype");
        if (periodtype.value == "Unlimited") {
            document.getElementById("Unlimitedcontainer").style.display = "block";
            document.getElementById("nodayscontainer").style.display = "none";
        } else if (periodtype.value == "No of days") {
            document.getElementById("nodayscontainer").style.display = "block";
            document.getElementById("Unlimitedcontainer").style.display = "none";
        } else {
            document.getElementById("Unlimitedcontainer").style.display = "none";
            document.getElementById("nodayscontainer").style.display = "none";
        }
    }
</script>
<?php

if (isset($_POST['submit'])) {
    $planbrief = trim($_POST['planbrief']);
    $numberlisting = trim($_POST['numberlisting']);
    $listingplan = $_POST['listingplan'];
    $price = $_POST['price'];
    $periodtype = trim($_POST['periodtype']);
    $unlimited = $_POST['unlimited'];
    $nodays = $_POST['nodays'];
    $typelisting = $_POST['typelisting'];
    $website = trim($_POST['website']);

    if ($_GET['edit']) {
        $Query = $conn->query("UPDATE `$tableName` SET `planbrief` = '$planbrief', `typelisting` = '$typelisting', `listingplan` = '$listingplan', `price` = '$price', `periodtype` = '$periodtype', `unlimited` = '$unlimited', `nodays` = '$nodays', `numberlisting` = '$numberlisting', `website` = '$website', `date` = NOW() WHERE id='$id'");
    } else {
        $Query = $conn->query("INSERT INTO `$tableName` (`planbrief`, `numberlisting`, `listingplan`, `price`, `periodtype`, `unlimited`, `nodays`, `typelisting`, `website`) VALUES ('$planbrief', '$numberlisting', '$listingplan', '$price', '$periodtype', '$unlimited', '$nodays', '$typelisting', '$website')");
    }
    if (!$Query) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }
    toastMsg("Updated successfully", 'success');
    header('location: ./view-listing-plan.php');
    exit();

}
?>
<?php include_once './includes/footer.php'; ?>