<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Area";
$tableName = "suburb";
$viewPage = "view-suburb.php";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo $viewPage ?>">View Area</a></li>
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
                            <h4>Edit City</h4>
                        </div>
                    </div>
                    <?php
                    $editQuery = $conn->query("SELECT * FROM `$tableName` WHERE id = '$id'");
                    $editRow = $editQuery->fetch_assoc();
                    if ($editRow == null) {
                        toastMsg("Something went wrong! try again later.", "error");
                        header("location: $viewPage");
                        exit();
                    }
                    ?>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="stateid">State</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="stateid" name="stateid" required
                                            onchange="loadCities()">
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `state` WHERE `status` = 'Active' ORDER BY `state`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['id'] ?>" <?php if ($editRow['stateid'] == $selectRow['id'])
                                                       echo "selected" ?>>
                                                    <?php echo $selectRow['state'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="cityid">city</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="cityid" name="cityid" required>
                                            <?php
                                            $stateid = $editRow['stateid'];
                                            $selectQuery = $conn->query("SELECT * FROM `city` WHERE `stateid` = $stateid AND `status` = 'Active' ORDER BY `city`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['id'] ?>" <?php if ($editRow['cityid'] == $selectRow['id'])
                                                       echo "selected" ?>>
                                                    <?php echo $selectRow['city'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="suburb">Area Name</label>
                                    <input type="text" class="form-control" id="suburb" name="suburb"
                                        value="<?php echo $editRow['suburb'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Post code</label>
                                    <input type="number" class="form-control" id="postcode" name="postcode"
                                        value="<?php echo $editRow['postcode'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pageorder">Page Order</label>
                                    <input type="number" class="form-control" id="pageorder" name="pageorder"
                                        value="<?php echo $editRow['pageorder'] ?>" required>
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
                            <h4>Add Area</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="stateid">State</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="stateid" name="stateid" required
                                            onchange="loadCities()">
                                            <option value="" disabled selected>Select State</option>
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `state` WHERE `status` = 'Active' ORDER BY `state`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['id'] ?>">
                                                    <?php echo $selectRow['state'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="cityid">city</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="cityid" name="cityid" required>
                                            <option value="" disabled selected>Select State First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="suburb">Area Name</label>
                                    <input type="text" class="form-control" id="suburb" name="suburb"
                                        placeholder="e.g. Patel Nagar" required>
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Post code</label>
                                    <input type="number" class="form-control" id="postcode" name="postcode"
                                        placeholder="e.g. 110008" required>
                                </div>
                                <div class="form-group">
                                    <label for="pageorder">Page Order</label>
                                    <input type="number" class="form-control" id="pageorder" name="pageorder"
                                        placeholder="e.g. 1" required>
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
    function loadCities() {
        const stateId = document.getElementById('stateid').value;
        const citySelect = document.getElementById('cityid');

        // Clear previous cities
        citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';

        if (stateId) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'getCities.php?stateid=' + stateId, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    const cities = JSON.parse(this.responseText);
                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.city;
                        citySelect.appendChild(option);
                    });
                }
            };
            xhr.send();
        }
    }
</script>
<?php
if (isset($_POST['submit'])) {
    $stateid = trim($_POST['stateid']);
    $cityid = trim($_POST['cityid']);
    $suburb = trim($_POST['suburb']);
    $postcode = trim($_POST['postcode']);
    $pageorder = trim($_POST['pageorder']);
    $status = trim($_POST['status']);

    $page = createSlug($suburb);

    if ($_GET['edit']) {
        $Query = $conn->query("UPDATE `$tableName` SET `suburb` = '$suburb', `pages` = '$page', `pageorder` = '$pageorder', `postcode` = '$postcode', `stateid` = '$stateid', `cityid` = '$cityid', `status` = '$status', `date` = NOW() WHERE id='$id'");
    } else {
        $Query = $conn->query("INSERT INTO `$tableName` (`suburb`, `pages`, `pageorder`, `postcode`, `stateid`, `cityid`, `status`) VALUES ('$suburb', '$page', '$pageorder', '$postcode', '$stateid', '$cityid', '$status')");
    }

    if (!$Query) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }
    toastMsg("Updated successfully", 'success');
    header("location: $viewPage");
    exit();
}
?>
<?php include_once './includes/footer.php'; ?>