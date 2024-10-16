<?php include_once './includes/header.php'; ?>
<?php
$pageName = "Manage CMS";
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
    <div class="col-lg-12">
        <div class="box-widget">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4><?= $pageName ?></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="borderd-table-block">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Page Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>About Us</td>
                                    <td class="controller-column">
                                        <a href="manage-about.php">
                                            <i class="fa fa-pencil edit-icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once './includes/footer.php'; ?>