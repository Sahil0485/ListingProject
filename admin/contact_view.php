<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage Contact";
$tableName = "contactcategory";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item active"><?= $pageName ?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-widget">
            <?php
            $id = 1;
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Edit Contact</h4>
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
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="<?php echo $editRow['phone'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?php echo $editRow['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="web">Web</label>
                                <input type="text" class="form-control" id="web" name="web"
                                    value="<?php echo $editRow['web'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address"><?php echo $editRow['address'] ?></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('address');
                                </script>
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
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $web = trim($_POST['web']);
    $address = trim($_POST['address']);

    $Query = $conn->query("UPDATE `$tableName` SET `phone` = '$phone', `email` = '$email', `web` = '$web', `address` = '$address' WHERE id='$id'");
    if (!$Query) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }
    toastMsg("Updated successfully", 'success');
    header('location: ./contact_view.php');
    exit();

}
?>
<?php include_once './includes/footer.php'; ?>