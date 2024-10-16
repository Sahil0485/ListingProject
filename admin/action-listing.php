<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Listing";
$tableName = "listings";
$folderName = "./uploads/listings/";
$galleryFolder = "./uploads/listing-gallery-thum/";
$viewPage = "view-listing.php";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= $viewPage ?>">View Listing</a></li>
            <li class="breadcrumb-item active"><?= $pageName ?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-widget">
            <?php
            if (isset($_GET['listno'])) {
                $listno = $_GET['listno'];
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Edit Listing</h4>
                        </div>
                    </div>
                    <?php
                    $editQuery = $conn->query("SELECT * FROM `$tableName` WHERE listno = '$listno'");
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
                                <div class="form-common">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label left-align">Listing Type</label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_14" name="listtype" type="radio"
                                                        class="custom-control-input" value="Free" <?php if ($editRow['listtype'] == "Free")
                                                            echo "checked" ?> required>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Free</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-radio fill-colord has-success">
                                                        <input id="radioStacked_14" name="listtype" type="radio"
                                                            class="custom-control-input" value="Featured" <?php if ($editRow['listtype'] == "Featured")
                                                            echo "checked" ?> required>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Featured</span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="custom-control custom-radio fill-colord has-success">
                                                        <input id="radioStacked_13" name="listtype" type="radio"
                                                            class="custom-control-input" value="Premium" <?php if ($editRow['listtype'] == "Premium")
                                                            echo "checked" ?> required>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Premium</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <label for="businessname">Business Name</label>
                                    <input type="text" class="form-control" id="businessname" name="businessname"
                                        value="<?php echo $editRow['businessname'] ?>" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="stateid">State</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="stateid" name="stateid" required
                                            onchange="loadCities()">
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `state` WHERE `status` = 'Active' ORDER BY `state`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['id'] ?>" <?php if ($editRow['state'] == $selectRow['state'])
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
                                        <select class="custom-select" id="cityid" name="cityid" onchange="loadArea()">
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `city` WHERE `status` = 'Active' ORDER BY `city`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['id'] ?>" <?php if ($editRow['city'] == $selectRow['city'])
                                                       echo "selected" ?>>
                                                    <?php echo $selectRow['city'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="suburb">Area</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="suburb" name="suburb" onchange="loadPostCode()">
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `suburb` WHERE `status` = 'Active' ORDER BY `suburb`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['suburb'] ?>" <?php if ($editRow['suburb'] == $selectRow['suburb'])
                                                       echo "selected" ?>>
                                                    <?php echo $selectRow['suburb'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Post code</label>
                                    <input type="number" class="form-control" id="postcode" name="postcode"
                                        value="<?php echo $editRow['postcode'] ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country"
                                        value="<?php echo $editRow['country'] ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="landlineno">Land Line No</label>
                                    <input type="number" class="form-control" id="landlineno" name="landlineno"
                                        value="<?php echo $editRow['landlineno'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile"
                                        value="<?php echo $editRow['mobile'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Business Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="<?php echo $editRow['address'] ?>" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="email">User Name</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="email" name="email" required>
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `users` WHERE `status` = 'Active' ORDER BY `firstname`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['email'] ?>" <?php if ($editRow['email'] == $selectRow['email'])
                                                       echo "selected" ?>>
                                                    <?php echo $selectRow['email'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="businessemail">Listing Email</label>
                                    <input type="email" class="form-control" id="businessemail" name="businessemail"
                                        value="<?php echo $editRow['businessemail'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" id="website" name="website"
                                        value="<?php echo $editRow['website'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="photo" class="col-md-5 col-form-label left-align">
                                            Listing Photo
                                        </label>
                                        <div class="col-md-7 btn btn-outline-default waves-effect waves-light">
                                            <span><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                Browse file..
                                            </span>
                                            <input type="file" accept="image/*" name="photo" id="photo">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="" class="col-md-5 col-form-label left-align">
                                            Your Photo
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
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="file" class="col-md-5 col-form-label left-align">
                                            Listing Gallery
                                        </label>
                                        <div class="col-md-10 btn btn-outline-default waves-effect waves-light">
                                            <span><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                Browse file..
                                            </span>
                                            <input type="file" accept="image/*" name="file[]" id="file" multiple>
                                        </div>
                                        <p style="font-size:0.75rem; color:#00c400; margin:0;">
                                            For Multiple Images Add : - Ctrl + Select Images
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="" class="col-md-5 col-form-label left-align">
                                            Your Gallery
                                        </label>
                                        <?php
                                        $listEmail = $editRow['email'];
                                        $listno = $editRow['listno'];
                                        $galleryQuery = $conn->query("SELECT * FROM `listinggallery` WHERE `email` = '$listEmail' AND `listno` = '$listno' ORDER BY `date`");
                                        $galleryRows = $galleryQuery->num_rows;
                                        if ($galleryRows == 0) {
                                            ?>
                                            <img src="<?php echo $folderName ?>nophoto.jpg" width="120px" height="120px"
                                                class="img" />
                                            <?php
                                        } else {
                                            while ($galleryRow = $galleryQuery->fetch_assoc()) {
                                                ?><img src="<?php echo $galleryFolder . $galleryRow['photo']; ?>"
                                                    width="120px" height="120px" class="img" />
                                                <a href="?delete=<?php echo $galleryRow['id']; ?>" onclick="return confirm(&#39;Are you sure?&#39;)">
                                                    <i class="fa fa-trash-o delete-icon"></i>
                                                </a>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Status</label>
                                    <select class="custom-select" id="status" name="status" required>
                                        <option value="Active" <?php if (isset($editRow['status']) && $editRow['status'] == 'Active')
                                            echo "selected"; ?>>Active</option>
                                        <option value="DeActive" <?php if (isset($editRow['status']) && $editRow['status'] == 'DeActive')
                                            echo "selected"; ?>>DeActive</option>
                                        <option value="Waiting" <?php if (isset($editRow['status']) && $editRow['status'] == 'Waiting')
                                            echo "selected"; ?>>Waiting For Approval</option>
                                        <option value="Rejected" <?php if (isset($editRow['status']) && $editRow['status'] == 'Rejected')
                                            echo "selected"; ?>>Rejected</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="brief">Page Description</label>
                                    <textarea name="brief" id="brief"><?php echo $editRow['brief'] ?></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('brief');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="maplocation">Map Location</label>
                                    <textarea name="maplocation" id="maplocation" cols="30" rows="10"
                                        required><?php echo $editRow['maplocation'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Opening Hours :</label>
                                    <div style="padding: 0 12%;">
                                        <?php
                                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                        for ($i = 1; $i <= 7; $i++) { ?>
                                            <div class="form-group" style="display: flex;">
                                                <label class="col-md-3 col-form-label left-align"
                                                    for="dayam<?php echo $i ?>"><?php echo $days[$i - 1]; ?></label>
                                                <div class="form-check">
                                                    <select class="custom-select" id="dayam<?php echo $i ?>"
                                                        name="dayam<?php echo $i ?>" required>
                                                        <?php for ($j = 1; $j <= 12; $j++) { ?>
                                                            <option value="<?php echo $j ?>:00 AM" <?php if ($editRow['dayam' . $i] == $j . ':00 AM')
                                                                   echo "selected"; ?>>
                                                                <?php echo $j ?>:00 AM
                                                            </option>
                                                        <?php } ?>
                                                        <option value="Closed" <?php if ($editRow['dayam' . $i] == 'Closed')
                                                            echo "selected"; ?>>Closed</option>
                                                    </select>
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="form-check">
                                                    <select class="custom-select" id="daypm<?php echo $i ?>"
                                                        name="daypm<?php echo $i ?>" required>
                                                        <?php for ($j = 1; $j <= 12; $j++) { ?>
                                                            <option value="<?php echo $j ?>:00 PM" <?php if ($editRow['daypm' . $i] == $j . ':00 PM')
                                                                   echo "selected"; ?>>
                                                                <?php echo $j ?>:00 PM
                                                            </option>
                                                        <?php } ?>
                                                        <option value="Closed" <?php if ($editRow['daypm' . $i] == 'Closed')
                                                            echo "selected"; ?>>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
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
                            <h4>Add Listing</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-common">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label left-align">Listing Type</label>
                                        <div class="col-md-8">
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_14" name="listtype" type="radio"
                                                        class="custom-control-input" value="Free" required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Free</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_14" name="listtype" type="radio"
                                                        class="custom-control-input" value="Featured" required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Featured</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="custom-control custom-radio fill-colord has-success">
                                                    <input id="radioStacked_13" name="listtype" type="radio"
                                                        class="custom-control-input" value="Premium" required>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Premium</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="fname">Category</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="fname" name="fname" required
                                            onchange="getSubCategory(this.value)">
                                            <option value="" selected disabled>Select Category</option>
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
                                            <option value="" selected disabled>Select Category First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="businessname">Business Name</label>
                                    <input type="text" class="form-control" id="businessname" name="businessname" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="stateid">State</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="stateid" name="stateid" required
                                            onchange="loadCities()">
                                            <option value="" selected disabled>Select State</option>
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
                                        <select class="custom-select" id="cityid" name="cityid" required
                                            onchange="loadArea()">
                                            <option value="" selected disabled>Select State First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="suburb">Area</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="suburb" name="suburb" required
                                            onchange="loadPostCode()">
                                            <option value="" selected disabled>Select City First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Post code</label>
                                    <input type="number" class="form-control" id="postcode" name="postcode" readonly
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="landlineno">Land Line No</label>
                                    <input type="number" class="form-control" id="landlineno" name="landlineno" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Business Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="email">User Name</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="email" name="email" required>
                                            <option value="" selected disabled>Select User</option>
                                            <?php
                                            $selectQuery = $conn->query("SELECT * FROM `users` WHERE `status` = 'Active' ORDER BY `firstname`");
                                            while ($selectRow = $selectQuery->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $selectRow['email'] ?>">
                                                    <?php echo $selectRow['email'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="businessemail">Listing Email</label>
                                    <input type="email" class="form-control" id="businessemail" name="businessemail"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" id="website" name="website" required>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="photo" class="col-md-5 col-form-label left-align">
                                            Listing Photo
                                        </label>
                                        <div class="col-md-7 btn btn-outline-default waves-effect waves-light">
                                            <span><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                Browse file..
                                            </span>
                                            <input type="file" accept="image/*" name="photo" id="photo">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6 r-mrg-b-20">
                                        <label for="file" class="col-md-5 col-form-label left-align">
                                            Listing Gallery
                                        </label>
                                        <div class="col-md-10 btn btn-outline-default waves-effect waves-light">
                                            <span><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                Browse file..
                                            </span>
                                            <input type="file" accept="image/*" name="file[]" id="file" multiple>
                                        </div>
                                        <p style="font-size:0.75rem; color:#00c400; margin:0;">
                                            For Multiple Images Add : - Ctrl + Select Images
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="status" name="status" required>
                                            <option value="Active">Active</option>
                                            <option value="DeActive">DeActive</option>
                                            <option value="Waiting">Waiting For Approval</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brief">Page Description</label>
                                    <textarea name="brief" id="brief"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('brief');
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="maplocation">Map Location</label>
                                    <textarea name="maplocation" id="maplocation" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Opening Hours :</label>
                                    <div style="padding: 0 12%;">
                                        <?php
                                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                        for ($i = 1; $i <= 7; $i++) { ?>
                                            <div class="form-group" style="display: flex;">
                                                <label class="col-md-3 col-form-label left-align"
                                                    for="dayam<?php echo $i ?>"><?php echo $days[$i - 1]; ?></label>
                                                <div class="form-check">
                                                    <select class="custom-select" id="dayam<?php echo $i ?>"
                                                        name="dayam<?php echo $i ?>" required>
                                                        <?php for ($j = 1; $j <= 12; $j++) { ?>
                                                            <option value="<?php echo $j ?>:00 AM">
                                                                <?php echo $j ?>:00 AM
                                                            </option>
                                                        <?php } ?>
                                                        <option value="Closed">Closed</option>
                                                    </select>
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="form-check">
                                                    <select class="custom-select" id="daypm<?php echo $i ?>"
                                                        name="daypm<?php echo $i ?>" required>
                                                        <?php for ($j = 1; $j <= 12; $j++) { ?>
                                                            <option value="<?php echo $j ?>:00 PM">
                                                                <?php echo $j ?>:00 PM
                                                            </option>
                                                        <?php } ?>
                                                        <option value="Closed">Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
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

    function loadCities() {
        let stateId = document.getElementById('stateid').value;
        let citySelect = document.getElementById('cityid');

        // Clear previous cities
        citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';

        if (stateId) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'getCities.php?stateid=' + stateId, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    let cities = JSON.parse(this.responseText);
                    cities.forEach(city => {
                        let option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.city;
                        citySelect.appendChild(option);
                    });
                }
            };
            xhr.send();
        }
    }

    function loadArea() {
        let cityId = document.getElementById('cityid').value;
        let areaSelect = document.getElementById('suburb');

        //Clear previous areas and load new areas
        areaSelect.innerHTML = '<option value="" disabled selected>Select Area</opiton>';

        if (cityId) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'getAreas.php?cityid=' + cityId, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    let areas = JSON.parse(this.responseText);
                    areas.forEach(area => {
                        let option = document.createElement('option');
                        option.value = area.suburb;
                        option.textContent = area.suburb;
                        areaSelect.appendChild(option);
                    });
                }
            };
            xhr.send();
        }
    }

    function loadPostCode() {
        let suburb = document.getElementById('suburb').value;
        let postCode = document.getElementById('postcode');
        let country = document.getElementById('country');

        country.value = "India";
        if (suburb) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'getPostCode.php?suburb=' + suburb, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    postCode.innerHTML = this.responseText;
                }
            };
            xhr.send();
        }
    }
</script>

<?php

if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $businessemail = trim($_POST['businessemail']);

    $nameQuery = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $nameRow = $nameQuery->fetch_assoc();
    $fullname = $nameRow['fullname'];

    $website = trim($_POST['website']);
    $businessname = trim($_POST['businessname']);
    $businesslink = createSlug($businessname);

    $fname = trim($_POST['fname']);
    $address = trim($_POST['address']);
    $landlineno = trim($_POST['landlineno']);
    $mobile = trim($_POST['mobile']);
    $brief = trim($_POST['brief']);

    $listtype = trim($_POST['listtype']);
    $maplocation = trim($_POST['maplocation']);

    $stateid = trim($_POST['stateid']);
    $cityid = trim($_POST['cityid']);
    $suburb = trim($_POST['suburb']);
    $postcode = trim($_POST['postcode']);
    $status = trim($_POST['status']);
    $photo = $_FILES['photo'];

    $pages = createSlug($name);
    $link = createSlug($fname);

    $suburblink = createSlug($suburb);

    $sqlp1 = "SELECT * FROM `state` WHERE `id` = '$stateid'";
    $queryp1 = mysqli_query($conn, $sqlp1);
    $rowp1 = mysqli_fetch_array($queryp1);
    $state = $rowp1['state'];
    $statelink = createSlug($state);

    $sqlp2 = "SELECT * FROM `city` WHERE `id` = '$cityid'";
    $queryp2 = mysqli_query($conn, $sqlp2);
    $rowp2 = mysqli_fetch_array($queryp2);
    $city = $rowp2['city'];
    $citylink = createSlug($city);

    $dayam1 = trim($_POST['dayam1']);
    $dayam2 = trim($_POST['dayam2']);
    $dayam3 = trim($_POST['dayam3']);
    $dayam4 = trim($_POST['dayam4']);
    $dayam5 = trim($_POST['dayam5']);
    $dayam6 = trim($_POST['dayam6']);
    $dayam7 = trim($_POST['dayam7']);
    $daypm1 = trim($_POST['daypm1']);
    $daypm2 = trim($_POST['daypm2']);
    $daypm3 = trim($_POST['daypm3']);
    $daypm4 = trim($_POST['daypm4']);
    $daypm5 = trim($_POST['daypm5']);
    $daypm6 = trim($_POST['daypm6']);
    $daypm7 = trim($_POST['daypm7']);

    $file_size = $_FILES['photo']['size'];
    $max_allowed_file = 8388608;   //file bigger than 8mb is not allowed
    if ($file_size > $max_allowed_file) {
        toastMsg('Your file is greater than 8mb', 'error');
        return;
    }

    //uploading gallery
    if ($_GET['listno']) {
        $listingGalleryUpdate = $conn->query("UPDATE `listinggallery` SET `businessname` = '$businessname', `businesslink` = '$businesslink', `date` = Now() where `email`='$email' and `listno`='$listno'");
        if (!$listingGalleryUpdate) {
            toastMsg("Something went wrong! Please try again later.", 'error');
            return;
        }
    }

    $path = $_FILES['photo']['name'];
    if ($_GET['listno']) {
        if ($path == null) {
            $Query = $conn->query("UPDATE `$tableName` SET `name` = '$name', `pages` = '$pages', `email` = '$email', `businessemail` = '$businessemail', `fullname` = '$fullname', `website` = '$website', `businessname` = '$businessname', `businesslink` = '$businesslink', `fname` = '$fname', `link` = '$link', `countrylink` = 'india', `mobile` = '$mobile', `landlineno` = '$landlineno', `address` = '$address', `country` = 'India', `postcode` = '$postcode', `city` = '$city', `citylink` = '$citylink', `state` = '$state', `statelink` = '$statelink', `suburb` = '$suburb', `suburblink` = '$suburblink', `brief` = '$brief', day1 = 'Monday', day2 = 'Tuesday', day3 = 'Wednesday', day4 = 'Thursday', day5 = 'Friday', day6 = 'Saturday', day7 = 'Sunday', dayam1 = '$dayam1', dayam2 = '$dayam2', dayam3 = '$dayam3', dayam4 = '$dayam4', dayam5 = '$dayam5', dayam6 = '$dayam6', dayam7 = '$dayam7', daypm1 = '$daypm1', daypm2 = '$daypm2', daypm3 = '$daypm3', daypm4 = '$daypm4', daypm5 = '$daypm5', daypm6 = '$daypm6', daypm7 = '$daypm7', `listtype` = '$listtype', `maplocation` = '$maplocation', `status` = '$status', `date`=Now() WHERE listno='$listno'");
            if (!$Query) {
                toastMsg("Something went wrong! Please try again later.", 'error');
                return;
            }
            toastMsg("Updated successfully", 'success');
            header("location: $viewPage");
            exit();
        } else {
            $Query = $conn->query(query: "UPDATE `$tableName` SET `name` = '$name', `pages` = '$pages', `email` = '$email', `businessemail` = '$businessemail', `fullname` = '$fullname', `website` = '$website', `businessname` = '$businessname', `businesslink` = '$businesslink', `fname` = '$fname', `link` = '$link', `countrylink` = 'india', `mobile` = '$mobile', `landlineno` = '$landlineno', `address` = '$address', `country` = 'India', `postcode` = '$postcode', `city` = '$city', `citylink` = '$citylink', `state` = '$state', `statelink` = '$statelink', `suburb` = '$suburb', `suburblink` = '$suburblink', `brief` = '$brief', day1 = 'Monday', day2 = 'Tuesday', day3 = 'Wednesday', day4 = 'Thursday', day5 = 'Friday', day6 = 'Saturday', day7 = 'Sunday', dayam1 = '$dayam1', dayam2 = '$dayam2', dayam3 = '$dayam3', dayam4 = '$dayam4', dayam5 = '$dayam5', dayam6 = '$dayam6', dayam7 = '$dayam7', daypm1 = '$daypm1', daypm2 = '$daypm2', daypm3 = '$daypm3', daypm4 = '$daypm4', daypm5 = '$daypm5', daypm6 = '$daypm6', daypm7 = '$daypm7', `listtype` = '$listtype', `maplocation` = '$maplocation', `status` = '$status', `photo` = '$path', `date`=Now() WHERE listno='$listno'");
        }
    } else {
        if ($path == null) {
            $path = "nophoto.jpg";
        }
        $sqllist = "SELECT * FROM listings ORDER BY listid DESC";
        $querylist = mysqli_query($conn, $sqllist);
        $rowlist = mysqli_fetch_array($querylist);
        $listid = $rowlist['listid'];
        $listno = "LS00" . $listid + 1;
        $Query = $conn->query("INSERT `$tableName` SET `listno` = '$listno', `name` = '$name', `pages` = '$pages', `email` = '$email', `businessemail` = '$businessemail', `fullname` = '$fullname', `website` = '$website', `businessname` = '$businessname', `businesslink` = '$businesslink', `fname` = '$fname', `link` = '$link', `countrylink` = 'india', `mobile` = '$mobile', `landlineno` = '$landlineno', `address` = '$address', `country` = 'India', `postcode` = '$postcode', `city` = '$city', `citylink` = '$citylink', `state` = '$state', `statelink` = '$statelink', `suburb` = '$suburb', `suburblink` = '$suburblink', `brief` = '$brief', day1 = 'Monday', day2 = 'Tuesday', day3 = 'Wednesday', day4 = 'Thursday', day5 = 'Friday', day6 = 'Saturday', day7 = 'Sunday', dayam1 = '$dayam1', dayam2 = '$dayam2', dayam3 = '$dayam3', dayam4 = '$dayam4', dayam5 = '$dayam5', dayam6 = '$dayam6', dayam7 = '$dayam7', daypm1 = '$daypm1', daypm2 = '$daypm2', daypm3 = '$daypm3', daypm4 = '$daypm4', daypm5 = '$daypm5', daypm6 = '$daypm6', daypm7 = '$daypm7', `listtype` = '$listtype', `maplocation` = '$maplocation', `photo` = '$path', `status` = '$status'");
    }

    if ($_FILES['file']['name'] != null) {
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $listingPhoto = $_FILES['file']['name'][$i];
            $listingPhotoNewName = date('ynjHis') . $listingPhoto;
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $galleryFolder . $listingPhotoNewName);
            $listingGalleryQuery = $conn->query("INSERT `listinggallery` SET `listno` = '$listno', `photo` = '$listingPhotoNewName', `businessname` = '$businessname', `businesslink` = '$businesslink', `email` = '$email', `date` = Now()");
        }
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
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $imgQuery = $conn->query("SELECT `photo` FROM `listinggallery` WHERE id = $id");
    $imgName = $imgQuery->fetch_assoc();
    $deleteQuery = $conn->query("DELETE FROM `listinggallery` WHERE id = $id");
    if (!$deleteQuery) {
        toastMsg("Something went wrong! Try again later.", "error");
        header("location: $viewPage");
        exit();
    }
    if ($imgName['photo'] != "nophoto.jpg") {
        if (!unlink($galleryFolder . $imgName['photo'])) {
            toastMsg("Something went wrong! Try again later.", "error");
            header("location: $viewPage");
            exit();
        }
    }
    toastMsg("Image Deleted successfully", "success");
    header("location: $viewPage");
    exit();
}
?>
<?php include_once './includes/footer.php'; ?>