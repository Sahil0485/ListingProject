<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Staff";
$tableName = "staffpages";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="view-staff.php">View Staff</a></li>
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
                            <h4>Edit Staff</h4>
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
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="<?php echo $editRow['username'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="passcode">Password</label>
                                    <input type="password" class="form-control" id="passcode" name="passcode"
                                        value="<?php echo $editRow['passcode'] ?>" required>
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
                                <div class="form-common">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label left-align">Listings Permission</label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perlistadd" value="1" <?php if ($editRow['perlistadd'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Add</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="perlistview" value="1" <?php if ($editRow['perlistview'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">View</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="perlistedit" value="1" <?php if ($editRow['perlistedit'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Edit</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="perlistdelete" value="1" <?php if ($editRow['perlistdelete'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Delete</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-common">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label left-align">Users Permission</label>
                                            <div class="col-md-8">
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="perusersadd" value="1" <?php if ($editRow['perusersadd'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Add</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="perusersedit" value="1" <?php if ($editRow['perusersedit'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">View</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="perusersview" value="1" <?php if ($editRow['perusersview'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Edit</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="perusersdelete" value="1" <?php if ($editRow['perusersdelete'] == '1')
                                                        echo "checked" ?>
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Delete</span>
                                                    </label>
                                                </div>
                                            </div>
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
                            <h4>Add Staff</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="passcode">Password</label>
                                    <input type="password" class="form-control" id="passcode" name="passcode"
                                        placeholder="Enter Password" required>
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
                                <div class="form-common">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label left-align">Listings Permission</label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perlistadd" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Add</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perlistview" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">View</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perlistedit" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Edit</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perlistdelete" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Delete</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-common">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label left-align">Users Permission</label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perusersadd" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Add</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perusersedit" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">View</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perusersview" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Edit</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="perusersdelete" value="1"
                                                        class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Delete</span>
                                                </label>
                                            </div>
                                        </div>
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
    $username = trim($_POST['username']);
    $passcode = trim($_POST['passcode']);
    $perlistadd = trim($_POST['perlistadd']);
    $perlistview = trim($_POST['perlistview']);
    $perlistedit = trim($_POST['perlistedit']);
    $perlistdelete = trim($_POST['perlistdelete']);
    $perusersadd = trim($_POST['perusersadd']);
    $perusersedit = trim($_POST['perusersedit']);
    $perusersview = trim($_POST['perusersview']);
    $perusersdelete = trim($_POST['perusersdelete']);
    $status = trim($_POST['status']);

    $passcode1 = $passcode;

    if ($_GET['edit']) {
        $Query = $conn->query("UPDATE `$tableName` SET `username` = '$username', `passcode` = '$passcode', `passcode1` = '$passcode1', `perlistadd` = '$perlistadd', `perlistview` = '$perlistview', `perlistdelete` = '$perlistdelete', `perlistedit` = '$perlistedit', `perusersadd` = '$perusersadd', `perusersedit` = '$perusersedit', `perusersview` = '$perusersview', `perusersdelete` = '$perusersdelete', `status` = '$status', `date` = NOW() WHERE id='$id'");
    } else {
        $Query = $conn->query("INSERT INTO `$tableName` (`username`, `passcode`, `passcode1`, `perlistadd`, `perlistview`, `perlistedit`, `perlistdelete`, `perusersadd`, `perusersedit`, `perusersview`, `perusersdelete`, `status`) VALUES ('$username', '$passcode', '$passcode1', '$perlistadd', '$perlistview', '$perlistedit', '$perlistdelete', '$perusersadd', '$perusersedit', '$perusersview', '$perusersdelete', '$status')");
    }
    if (!$Query) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }
    toastMsg("Updated successfully", 'success');
    header('location: ./view-staff.php');
    exit();

}
?>
<?php include_once './includes/footer.php'; ?>