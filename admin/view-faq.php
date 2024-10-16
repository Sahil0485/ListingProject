<?php include './includes/header.php'; ?>
<?php
$pageTitle = "View FAQ";
$tableName = "faqpages";
$viewPage = "view-faq.php";
$actionPage = "action-faq.php";
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
                        class="btn btn-raised btn-default btn-rounded">Add FAQ</a>
                </div>
                <div class="panel-body">
                    <div class="basic-datatable-block">
                        <table id="basic_datatable" class="display table table-bordered basic-data-table">
                            <thead>
                                <tr>
                                    <th>Page Order</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $viewQuery = $conn->query("SELECT * FROM $tableName ORDER BY `pageorder`");
                                while ($viewRow = $viewQuery->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $viewRow['pageorder'] ?></td>
                                        <td><?php echo $viewRow['name'] ?></td>
                                        <td class="controller-column">
                                            <a href="<?= $actionPage ?>?edit=<?php echo $viewRow['id']; ?>">
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
    $deleteQuery = $conn->query("DELETE FROM $tableName WHERE id = $id");
    if (!$deleteQuery) {
        toastMsg("Something went wrong! Try again later.", "error");
        header("location: $viewPage");
        exit();
    }
    toastMsg("$tableName Deleted successfully", "success");
    header("location: $viewPage");
    exit();
}
?>

<?php include './includes/footer.php'; ?>