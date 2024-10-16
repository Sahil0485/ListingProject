<?php include_once './includes/header.php'; ?>
<?php
$pageName = "Manage About Us";
$tableName = "aboutus";
$id = 1;
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="manage-cms.php">Manage CMS</a></li>
            <li class="breadcrumb-item active"><?= $pageName ?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-widget">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>About Us</h4>
                    </div>
                </div>
                <?php
                $aboutQuery = $conn->query("SELECT * FROM `$tableName` WHERE id = '1'");
                $aboutRow = $aboutQuery->fetch_assoc();
                ?>
                <div class="panel-body">
                    <div class="form-block">
                        <form class="form-common" enctype="multipart/form-data" method="post" action="">
                            <div class="form-group">
                                <label for="name">Page Title</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $aboutRow['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="aboutheading1">Sub Title 1</label>
                                <input type="text" class="form-control" id="aboutheading1" name="aboutheading1"
                                    value="<?php echo $aboutRow['aboutheading1'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="brief">Description</label>
                                <textarea name="brief" id="brief" required><?php echo $aboutRow['brief'] ?></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('brief');
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="brief1">Front Page</label>
                                <textarea name="brief1" id="brief1"><?php echo $aboutRow['brief1'] ?></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('brief1');
                                </script>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 r-mrg-b-20">
                                    <label for="uploadphoto" class="col-md-5 col-form-label left-align">
                                        Photo
                                    </label>
                                    <div class="col-md-7 btn btn-outline-default waves-effect waves-light">
                                        <span><i class="fa fa-cloud-upload" aria-hidden="true"></i> Browse file..</span>
                                        <input type="file" accept="image/*" name="uploadphoto" id="uploadphoto">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 r-mrg-b-20">
                                    <label for="" class="col-md-5 col-form-label left-align">
                                        Your Photo
                                    </label>
                                    <?php
                                    if ($aboutRow['photo'] != "") {
                                        ?>
                                        <img src="./uploads/aboutus/<?php echo $aboutRow['photo']; ?>" width="120px"
                                            height="120px" class="img" />
                                        <?php
                                    } else {
                                        ?>
                                        <img src="./uploads/aboutus/nophoto.jpg" width="120px" height="120px" class="img" />
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <label class="col-md-3 col-form-label left-align" for="imgstatus">Image Status</label>
                                <div class="form-check">
                                    <select class="custom-select" id="imgstatus" name="imgstatus" required>
                                        <?php
                                        if ($aboutRow['imgstatus'] == 'Active') {
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
        </div>
    </div>
</div>
<?php

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $aboutheading1 = trim($_POST['aboutheading1']);
    $brief = trim($_POST['brief']);
    $brief1 = trim($_POST['brief1']);
    $uploadphoto = $_FILES['uploadphoto'];
    $imgstatus = trim($_POST['imgstatus']);

    $link = createSlug($name);

    $file_size = $_FILES['uploadphoto']['size'];
    $max_allowed_file = 8388608;   //file bigger than 8mb is not allowed
    if ($file_size > $max_allowed_file) {
        toastMsg('Your file is greater than 8mb', 'error');
        return;
    }

    $path = $_FILES['uploadphoto']['name'];
    if ($path == null) {
        $updateQuery = $conn->query("UPDATE `$tableName` SET `name` = '$name', `brief` = '$brief', `link` = '$link', `brief1` = '$brief1', `aboutheading1` = '$aboutheading1', `imgstatus` = '$imgstatus', `date` = NOW() WHERE id='$id'");
        if (!$updateQuery) {
            toastMsg("Something went wrong! Please try again later.", 'error');
            return;
        }
        toastMsg("Updated successfully", 'success');
        return;
    }

    $file_path = pathinfo($path);
    $file_extension = $file_path['extension'];
    $allowed_extensions = ['png', 'jpeg', 'jpg'];
    if (!in_array($file_extension, $allowed_extensions)) {
        toastMsg('Only png, jpeg and jpg files are allowed', 'error');
        return;
    }

    $updateQuery = $conn->query("UPDATE `$tableName` SET `name` = '$name', `brief` = '$brief', `link` = '$link', `photo` = '$path', `brief1` = '$brief1', `aboutheading1` = '$aboutheading1', `imgstatus` = '$imgstatus', `date` = NOW() WHERE id='$id'");
    if (!$updateQuery) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }
    $upload_path = './uploads/aboutus/' . $path;
    unlink("./uploads/aboutus/" . $aboutRow['photo']);
    $upload_status = move_uploaded_file($_FILES['uploadphoto']['tmp_name'], $upload_path);
    if (!$upload_status) {
        toastMsg("Something went wrong! Please try again later.", 'error');
    }

    toastMsg("Updated successfully", 'success');
    header("location: ./manage-about.php");
    exit();
}
?>
<?php include_once './includes/footer.php'; ?>