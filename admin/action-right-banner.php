<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Right Banner";
$tableName = "bannerrightpage";
$folderName = "./uploads/banner-right/";
$viewPage = "view-right-banner.php";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= $viewPage ?>">View Right Banner</a></li>
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
                            <h4>Edit Right Banner</h4>
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
                                    <label class="col-md-3 col-form-label left-align" for="fname">Category</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="fname" name="fname" required
                                            onchange="getSubCategory(this.value)">
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `addcategory` WHERE `status` = 'Active' ORDER BY `name`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['name'] ?>" <?php if ($selectRow['name'] == $editRow['fname'])
                                                       echo "Selected" ?>>
                                                    <?php echo $selectRow['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="name">Sub Category</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="name" name="name" required>
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `subcategory` WHERE `status` = 'Active' ORDER BY `name`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['name'] ?>" <?php if ($selectRow['name'] == $editRow['name'])
                                                       echo "Selected" ?>>
                                                    <?php echo $selectRow['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bannername">Banner Name</label>
                                    <input type="text" class="form-control" id="bannername" name="bannername"
                                        value="<?php echo $editRow['bannername'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="bannerlink">Banner Link</label>
                                    <input type="text" class="form-control" id="bannerlink" name="bannerlink"
                                        value="<?php echo $editRow['bannerlink'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pageorder">Page Order</label>
                                    <input type="number" class="form-control" id="pageorder" name="pageorder"
                                        value="<?php echo $editRow['pageorder'] ?>" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="linktarget">Link Target</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="linktarget" name="linktarget" required>
                                            <option value="_blank" <?php if ($editRow['linktarget'] == '_blank')
                                                echo ' selected="selected"'; ?>>_blank</option>
                                            <option value="_self" <?php if ($editRow['linktarget'] == '_self')
                                                echo ' selected="selected"'; ?>>_self</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="position">
                                        Position Status
                                    </label>
                                    <div class="form-check">
                                        <select class="custom-select" id="position" name="position" required>
                                            <option value="Left" <?php if ($editRow['position'] == 'Left')
                                                echo ' selected="selected"'; ?>>Left</option>
                                            <option value="Right" <?php if ($editRow['position'] == 'Right')
                                                echo ' selected="selected"'; ?>>Right</option>
                                            <option value="Both" <?php if ($editRow['position'] == 'Both')
                                                echo ' selected="selected"'; ?>>Both</option>
                                        </select>
                                    </div>
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
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="photo" class="col-md-5 col-form-label left-align">
                                            Photo
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
                                            Your Photo
                                        </label>
                                        <?php if ($editRow['photo'] != "") { ?>
                                            <img src="<?php echo $folderName . $editRow['photo']; ?>" width="120px"
                                                height="120px" class="img" />
                                        <?php } else { ?>
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
                            <h4>Add Right Banner</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="fname">Category</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="fname" name="fname" required
                                            onchange="getSubCategory(this.value)">
                                            <option value="" disabled selected>Select Category</option>
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `addcategory` WHERE `status` = 'Active' ORDER BY `name`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['name'] ?>">
                                                    <?php echo $selectRow['name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="name">Sub Category</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="name" name="name" required>
                                            <option value="" disabled selected>Select Category First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bannername">Banner Name</label>
                                    <input type="text" class="form-control" id="bannername" name="bannername"
                                        placeholder="Enter Banner Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="bannerlink">Banner Link</label>
                                    <input type="text" class="form-control" id="bannerlink" name="bannerlink"
                                        placeholder="Enter Banner Link" required>
                                </div>
                                <div class="form-group">
                                    <label for="pageorder">Page Order</label>
                                    <input type="number" class="form-control" id="pageorder" name="pageorder"
                                        placeholder="e.g. 1" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="linktarget">Link Target</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="linktarget" name="linktarget" required>
                                            <option value="" disabled selected>Select Target</option>
                                            <option value="_blank">_blank</option>
                                            <option value="_self">_self</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="position">
                                        Position Status
                                    </label>
                                    <div class="form-check">
                                        <select class="custom-select" id="position" name="position" required>
                                            <option value="" disabled selected>Select Position</option>
                                            <option value="Left">Left</option>
                                            <option value="Right">Right</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
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
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="photo" class="col-md-5 col-form-label left-align">
                                            Photo
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
<script>
    function getSubCategory(value) {
        const fname = document.getElementById('fname').value;
        const subcategory = document.getElementById('name');

        // Clear previous subcategorylist
        subcategory.innerHTML = '<option value="" disabled selected>Select Sub Category</option>';

        if (fname) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'getSubCategory.php?fname=' + fname, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    const subcategorylist = JSON.parse(this.responseText);
                    subcategorylist.forEach(subCat => {
                        const option = document.createElement('option');
                        option.value = subCat.name;
                        option.textContent = subCat.name;
                        subcategory.appendChild(option);
                    });
                }
            };
            xhr.send();
        }
    }
</script>
<?php

if (isset($_POST['submit'])) {

    $fname = trim($_POST['fname']); // Category
    $name = trim($_POST['name']); // Sub-category
    $pageorder = trim($_POST['pageorder']);
    $bannername = trim($_POST['bannername']);
    $bannerlink = trim($_POST['bannerlink']);
    $linktarget = trim($_POST['linktarget']);
    $position = trim($_POST['position']);
    $status = trim($_POST['status']);
    $photo = $_FILES['photo'];

    $pages = createSlug($name);
    $link = createSlug($fname);

    $file_size = $_FILES['photo']['size'];
    $max_allowed_file = 8388608;   //file bigger than 8mb is not allowed
    if ($file_size > $max_allowed_file) {
        toastMsg('Your file is greater than 8mb', 'error');
        return;
    }

    $path = $_FILES['photo']['name'];
    if ($_GET['edit']) {
        if ($path == null) {
            $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `pages` = '$pages', `link` = '$link', `pageorder` = '$pageorder', `bannername` = '$bannername', `bannerlink` = '$bannerlink', `linktarget` = '$linktarget', `position` = '$position', `fname` = '$fname', `status` = '$status', `date`=Now() WHERE id='$id'");
            if (!$Query) {
                toastMsg("Something went wrong! Please try again later.", 'error');
                return;
            }
            toastMsg("Updated successfully", 'success');
            header("location: $viewPage");
            exit();
        } else {
            $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `pages` = '$pages', `link` = '$link', `pageorder` = '$pageorder', `bannername` = '$bannername', `bannerlink` = '$bannerlink', `linktarget` = '$linktarget', `position` = '$position', `fname` = '$fname', `status` = '$status', `photo` = '$path', `date`=Now() WHERE id='$id'");
        }
    } else {
        if ($path == null) {
            $path = "nophoto.jpg";
        }
        $Query = $conn->query("INSERT INTO `$tableName` (`name`, `pages`, `pageorder`, `bannername`, `bannerlink`, `linktarget`, `position`, `link`, `fname`, `status`, `photo`) VALUES ('$name', '$pages', '$pageorder', '$bannername', '$bannerlink', '$linktarget', '$position', '$link', '$fname', '$status', '$path')");
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