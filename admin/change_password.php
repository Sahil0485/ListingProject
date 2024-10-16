<?php include_once './includes/header.php'; ?>
<?php
$pageName = "Change Password";
$tableName = "amenities";
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
    <div class="col-md-12" style="display: flex;justify-content: center;">
        <div class="box-widget">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Change Password</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-common user-profile-form" method="post">
                        <div class="form-group">
                            <input type="password" name="oldPasscode" class="form-control"
                                placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passcode" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passcode1" class="form-control"
                                placeholder="Confirm New Password">
                        </div>
                        <button type="submit" name="chgPasscode" class="listing-btn-large">
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['chgPasscode'])) {
    $oldPasscode = $_POST['oldPasscode'];
    $passcode = $_POST['passcode'];
    $passcode1 = $_POST['passcode1'];

    if ($oldPasscode != $userProfileRow['passcode']) {
        toastMsg("Password is incorrect", "error");
        return;
    }

    if ($passcode != $passcode1) {
        toastMsg("Confirm New Password did not match.", "error");
        return;
    }

    $updateUserQuery = $conn->query("UPDATE `admin` SET `passcode` = '$passcode', `passcode1` = '$passcode1', `date` = NOW() WHERE id = 1");

    if (!$updateUserQuery) {
        toastMsg("Something went wrong! Please try again later.", 'error');
        return;
    }

    toastMsg("Updated successfully", 'success');
    header("Location: dashboard.php");
    exit();

}
?>
<?php include_once './includes/footer.php'; ?>