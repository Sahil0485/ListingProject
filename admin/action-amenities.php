<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Amenities";
$tableName = "amenities";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="view-amenities.php">View Amenities</a></li>
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
                            <h4>Edit Amenities</h4>
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
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo $editRow['name'] ?>" required>
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
                            <h4>Add Amenities</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Title"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="pageorder">Page Order</label>
                                    <input type="number" class="form-control" id="pageorder" name="pageorder"
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
<?php

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $pageorder = trim($_POST['pageorder']);
    $status = trim($_POST['status']);

    $pages = createSlug($name);

    if (!$_GET['edit']) {
        $Query = $conn->query("INSERT INTO `$tableName` (`name`, `pages` , `pageorder`, `status`) VALUES ('$name','$pages', '$pageorder', '$status')");
    } else {
        $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `pages` = '$pages', `pageorder` = '$pageorder', `status` = '$status', `date` = NOW() WHERE id='$id'");
    }
    if (!$Query) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }
    toastMsg("Updated successfully", 'success');
    header('location: ./view-amenities.php');
    exit();

}
?>
<?php include_once './includes/footer.php'; ?>