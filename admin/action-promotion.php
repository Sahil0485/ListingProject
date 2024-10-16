<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Promotion";
$tableName = "promotion";
$folderName = "./uploads/promotion/";
$viewPage = "view-promotion.php";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= $viewPage ?>">View Promotions</a></li>
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
                            <h4>Edit Promotion</h4>
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
                                <div class="form-group">
                                    <label for="name">Promotion Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo $editRow['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="sdate" class="col-lg-2 col-form-label">Start Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="sdate" min="<?php echo date("Y-m-d") ?>"
                                            value="<?php echo date('Y-m-d', strtotime($editRow['sdate'])) ?>"
                                            class="form-control" id="sdate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edate" class="col-lg-2 col-form-label">End Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="edate" min="<?php echo date("Y-m-d") ?>"
                                            value="<?php echo date('Y-m-d', strtotime($editRow['edate'])) ?>"
                                            class="form-control" id="edate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand Name</label>
                                    <input type="text" class="form-control" id="brand" name="brand"
                                        value="<?php echo $editRow['brand'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="bemail">Brand Email</label>
                                    <input type="email" class="form-control" id="bemail" name="bemail"
                                        value="<?php echo $editRow['bemail'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="number">Brand Phone Number</label>
                                    <input type="number" class="form-control" id="number" name="number"
                                        value="<?php echo $editRow['number'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="links">Brand Link</label>
                                    <input type="text" class="form-control" id="links" name="links"
                                        value="<?php echo $editRow['links'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="ilink">Instagram Link</label>
                                    <input type="text" class="form-control" id="ilink" name="ilink"
                                        value="<?php echo $editRow['ilink'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="flink">Facebook Link</label>
                                    <input type="text" class="form-control" id="flink" name="flink"
                                        value="<?php echo $editRow['flink'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tlink">Twitter Link</label>
                                    <input type="text" class="form-control" id="tlink" name="tlink"
                                        value="<?php echo $editRow['tlink'] ?>" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Promotion Status</label>
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
                                        <label class="col-md-3 col-form-label left-align">Plan Status</label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_14" name="plan" type="radio"
                                                        class="custom-control-input" value="All" <?php if ($editRow['plan'] == "All")
                                                            echo "checked" ?>>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">All</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-radio fill-colord has-danger">
                                                        <input id="radioStacked_13" name="plan" type="radio"
                                                            class="custom-control-input" value="Free" <?php if ($editRow['plan'] == "Free")
                                                            echo "checked" ?>>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Free</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-radio fill-colord has-danger">
                                                        <input id="radioStacked_13" name="plan" type="radio"
                                                            class="custom-control-input" value="Featured" <?php if ($editRow['plan'] == "Featured")
                                                            echo "checked" ?>>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Featured</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-radio fill-colord has-danger">
                                                        <input id="radioStacked_13" name="plan" type="radio"
                                                            class="custom-control-input" value="Premium" <?php if ($editRow['plan'] == "Premium")
                                                            echo "checked" ?>>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Premium</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6 r-mrg-b-20">
                                            <label for="photo" class="col-md-5 col-form-label left-align">
                                                Category Photo
                                            </label>
                                            <div class="col-md-7 btn btn-outline-default waves-effect waves-light">
                                                <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> Browse file..</span>
                                                <input type="file" accept="image/*" name="photo" id="photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6 r-mrg-b-20">
                                            <label for="" class="col-md-5 col-form-label left-align">
                                                Photo
                                            </label>
                                            <?php
                                                        if ($editRow['photo'] != "") {
                                                            ?>
                                            <img src="<?php echo $folderName . $editRow['photo']; ?>" width="120px"
                                                height="120px" class="img" />
                                            <?php
                                                        } else {
                                                            ?>
                                            <img src="<?php echo $folderName ?>nophoto.jpg" width="120px" height="120px"
                                                class="img" />
                                        <?php } ?>
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
                            <h4>Add Promotion</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group">
                                    <label for="name">Promotion Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Promotion Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="sdate" class="col-lg-2 col-form-label">Start Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="sdate" min="<?php echo date("Y-m-d") ?>"
                                            class="form-control" id="sdate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edate" class="col-lg-2 col-form-label">End Date</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="edate" min="<?php echo date("Y-m-d") ?>"
                                            class="form-control" id="edate" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand Name</label>
                                    <input type="text" class="form-control" id="brand" name="brand" required>
                                </div>
                                <div class="form-group">
                                    <label for="bemail">Brand Email</label>
                                    <input type="email" class="form-control" id="bemail" name="bemail" required>
                                </div>
                                <div class="form-group">
                                    <label for="number">Brand Phone Number</label>
                                    <input type="number" class="form-control" id="number" name="number" required>
                                </div>
                                <div class="form-group">
                                    <label for="links">Brand Link</label>
                                    <input type="text" class="form-control" id="links" name="links" required>
                                </div>
                                <div class="form-group">
                                    <label for="ilink">Instagram Link</label>
                                    <input type="text" class="form-control" id="ilink" name="ilink" required>
                                </div>
                                <div class="form-group">
                                    <label for="flink">Facebook Link</label>
                                    <input type="text" class="form-control" id="flink" name="flink" required>
                                </div>
                                <div class="form-group">
                                    <label for="tlink">Twitter Link</label>
                                    <input type="text" class="form-control" id="tlink" name="tlink" required>
                                </div>
                                <div class="form-common">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label left-align">Display Status</label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_14" name="plan" type="radio"
                                                        class="custom-control-input" value="All" required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">All</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-danger">
                                                    <input id="radioStacked_13" name="plan" type="radio"
                                                        class="custom-control-input" value="Free" required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Free</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-danger">
                                                    <input id="radioStacked_13" name="plan" type="radio"
                                                        class="custom-control-input" value="Featured" required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Featured</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-danger">
                                                    <input id="radioStacked_13" name="plan" type="radio"
                                                        class="custom-control-input" value="Premium" required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Premium</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Promotion Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="status" name="status" required>
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="DeActive">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="photo" class="col-md-5 col-form-label left-align">
                                            Promotion Photo
                                        </label>
                                        <div class="col-md-7 btn btn-outline-default waves-effect waves-light">
                                            <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> Browse file..</span>
                                            <input type="file" accept="image/*" name="photo" id="photo">
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
    $name = trim($_POST['name']);
    $sdate = trim($_POST['sdate']);
    $edate = trim($_POST['edate']);
    $brand = trim($_POST['brand']);
    $bemail = trim($_POST['bemail']);
    $number = trim($_POST['number']);
    $links = trim($_POST['links']);
    $flink = trim($_POST['flink']);
    $ilink = trim($_POST['ilink']);
    $tlink = trim($_POST['tlink']);
    $status = trim($_POST['status']);
    $plan = trim($_POST['plan']);
    $photo = $_FILES['photo'];

    $pages = createSlug($name);

    if(strtotime($sdate) > strtotime($edate)){
        toastMsg("Start date must be earlier than end date", "error");
        return;
    }

    $file_size = $_FILES['photo']['size'];
    $max_allowed_file = 8388608;   //file bigger than 8mb is not allowed
    if ($file_size > $max_allowed_file) {
        toastMsg('Your file is greater than 8mb', 'error');
        return;
    }

    $path = $_FILES['photo']['name'];
    if ($_GET['edit']) {
        if ($path == null) {
            $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `sdate` = '$sdate', `edate` = '$edate', `brand` = '$brand', `bemail` = '$bemail', `number` = '$number', `links` = '$links', `flink` = '$flink', `ilink` = '$ilink', `tlink` = '$tlink', `status` = '$status', `plan` = '$plan', `date`=Now() WHERE id='$id'");
            if (!$Query) {
                toastMsg("Something went wrong! Please try again later.", 'error');
                return;
            }
            toastMsg("Updated successfully", 'success');
            header("location: $viewPage");
            exit();
        } else {
            $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `photo` = '$path', `sdate` = '$sdate', `edate` = '$edate', `brand` = '$brand', `bemail` = '$bemail', `number` = '$number', `links` = '$links', `flink` = '$flink', `ilink` = '$ilink', `tlink` = '$tlink', `status` = '$status', `plan` = '$plan', `date`=Now() WHERE id='$id'");
        }
    } else {
        if ($path == null) {
            $path = "nophoto.jpg";
        }
        $Query = $conn->query("INSERT INTO `$tableName` (`name`, `photo`, `sdate`, `edate`, `brand`, `bemail`, `number`, `links`, `flink`, `ilink`, `tlink`, `status`, `plan`) VALUES ('$name', '$path', '$sdate', '$edate', '$brand', '$bemail', '$number', '$links', '$flink', '$ilink', '$tlink', '$status', '$plan')");
    }

    $file_path = pathinfo($path);
    $file_extension = $file_path['extension'];
    $allowed_extensions = ['png', 'jpeg', 'jpg'];
    if (!in_array($file_extension, $allowed_extensions)) {
        toastMsg('Only png, jpeg and jpg files are allowed', 'error');
        return;
    }

    $upload_path = $folderName . $path;
    unlink($folderName . $aboutRow['photo']);
    $upload_status = move_uploaded_file($_FILES['photo']['tmp_name'], $upload_path);
    if (!$upload_status) {
        toastMsg("Something went wrong! Please try again later.", 'error');
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