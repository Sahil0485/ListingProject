<?php include './includes/header.php'; ?>
<?php
$pageTitle = "View Listing";
$tableName = "listings";
$actionPage = "action-listing.php";
$viewPage = "view-listing.php";
$folderName = "./uploads/listings/";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageTitle ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item active"><?= $pageTitle ?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-widget widget-module">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4><?= $pageTitle ?></h4>
                    </div>
                    <a href="<?= $actionPage ?>" style="float: right; margin-top: 0;"
                        class="btn btn-raised btn-default btn-rounded">Add Listing</a>
                </div>
                <div class="panel-body">
                    <div class="basic-datatable-block">
                        <table id="basic_datatable" class="display table table-bordered basic-data-table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check_all" value=""></th>
                                    <th>S. No.</th>
                                    <th>List ID</th>
                                    <th>Business Name</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>List Type</th>
                                    <th>Created By</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $viewQuery = $conn->query("SELECT * FROM $tableName");
                                $i = 0;
                                while ($viewRow = $viewQuery->fetch_assoc()) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td>
                                            <input name="data[]" type="checkbox" id="data"
                                                value="<?php echo $viewRow['id']; ?>">
                                        </td>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $viewRow['listno'] ?></td>
                                        <td><?php custom_echo($viewRow['businessname'], 5); ?></td>
                                        <td><?php custom_echo($viewRow['state']) ?></td>
                                        <td><?php custom_echo($viewRow['city']) ?></td>
                                        <td><?php custom_echo($viewRow['fname']) ?></td>
                                        <td><?php custom_echo($viewRow['name']) ?></td>
                                        <td><?php echo $viewRow['listtype'] ?></td>
                                        <td><?php
                                        if ($viewRow['staffname'] !== "") {
                                            echo $viewRow['staffname'];
                                        } else { ?>
                                                Admin
                                            <?php } ?>
                                        </td>
                                        <td><?php if ($viewRow['photo'] != "") { ?>
                                                <img src="<?php echo $folderName . $viewRow['photo']; ?>" width="30" height="30"
                                                    class="img" />
                                            <?php } else { ?>
                                                <img src="<?php echo $folderName ?>nophoto.jpg" width="30" height="30"
                                                    class="img" />
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $viewRow['status'] ?></td>
                                        <td class="controller-column">
                                            <a href="<?= $actionPage ?>?listno=<?php echo $viewRow['listno']; ?>">
                                                <i class="fa fa-pencil edit-icon"></i>
                                            </a>
                                            <a href="?delete=<?php echo $viewRow['id']; ?>" onclick="return confirm(&#39;Are you sure?&#39;)">
                                                <i class="fa fa-trash-o delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $imgQuery = $conn->query("SELECT photo FROM `$tableName` WHERE id = $id");
    $imgName = $imgQuery->fetch_assoc();
    $deleteQuery = $conn->query("DELETE FROM $tableName WHERE id = $id");
    if (!$deleteQuery) {
        toastMsg("Something went wrong! Try again later.", "error");
        header("location: $viewPage");
        exit();
    }
    if ($imgName['photo'] != "nophoto.jpg") {
        if (!unlink($folderName . $imgName['photo'])) {
            toastMsg("Something went wrong! Try again later.", "error");
            header("location: $viewPage");
            exit();
        }
    }
    toastMsg("Deleted successfully", "success");
    header("location: $viewPage");
    exit();
}
?>

<?php include './includes/footer.php'; ?>