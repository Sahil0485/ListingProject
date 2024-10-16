<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Slide";
$tableName = "homeslide";
$folderName = "./uploads/slide/";
$viewPage = "view-slide.php";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= $viewPage ?>">View Slides</a></li>
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
                            <h4>Edit Slide</h4>
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
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo $editRow['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cbrief">Cbrief</label>
                                    <textarea name="cbrief" id="cbrief"><?php echo $editRow['cbrief'] ?></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('cbrief');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="pageorder">Page Order</label>
                                    <input type="number" class="form-control" id="pageorder" name="pageorder"
                                        value="<?php echo $editRow['pageorder'] ?>" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="cname">Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="cname" name="cname" required>
                                            <?php
                                            if ($editRow['cname'] == 'Active') {
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
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="photo" class="col-md-5 col-form-label left-align">
                                            Slide
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
                            <h4>Add Slide</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="cbrief">Cbrief</label>
                                    <textarea name="cbrief" id="cbrief"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('cbrief');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="pageorder">Page Order</label>
                                    <input type="number" class="form-control" id="pageorder" name="pageorder"
                                        placeholder="e.g. 1" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="cname">Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="cname" name="cname" required>
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="DeActive">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="photo" class="col-md-5 col-form-label left-align">
                                            Slide
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
    $pageorder = trim($_POST['pageorder']);
    $cname = trim($_POST['cname']);
    $cbrief = trim($_POST['cbrief']);
    $photo = $_FILES['photo'];

    $pages = createSlug($name);

    $file_size = $_FILES['photo']['size'];
    $max_allowed_file = 8388608;   //file bigger than 8mb is not allowed
    if ($file_size > $max_allowed_file) {
        toastMsg('Your file is greater than 8mb', 'error');
        return;
    }

    $path = $_FILES['photo']['name'];
    if ($_GET['edit']) {
        if ($path == null) {
            $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `pages` = '$pages', `pageorder` = '$pageorder', `cname` = '$cname', `cbrief` = '$cbrief', `date`=Now() WHERE id='$id'");
            if (!$Query) {
                toastMsg("Something went wrong! Please try again later.", 'error');
                return;
            }
            toastMsg("Updated successfully", 'success');
            header("location: $viewPage");
            exit();
        } else {
            $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `pages` = '$pages', `pageorder` = '$pageorder', `cname` = '$cname', `cbrief` = '$cbrief', `photo` = '$path', `date`=Now() WHERE id='$id'");
        }
    } else {
        if ($path == null) {
            $path = "nophoto.jpg";
        }
        $Query = $conn->query("INSERT INTO `$tableName` (`name`, `pages`, `pageorder`, `cname`, `photo`, `cbrief`) VALUES ('$name', '$pages', '$pageorder', '$cname', '$path', '$cbrief')");
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