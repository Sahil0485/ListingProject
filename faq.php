<?php include_once './includes/header.php' ?>
<div class="subheader">
    <h2>FAQs</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">FAQs</li>
        </ol>
        <div class="breadcrumb-call-to-action">
            <?php
            $generalContactQuery = $conn->query("SELECT * FROM `contactcategory` WHERE id = '1'");
            $generalContactRow = $generalContactQuery->fetch_assoc();
            ?>
            <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $generalContactRow['phone']; ?></p>
            <a href="javascript:void(0)" class="contact-btn">
                Contact Us
            </a>
        </div>
    </div>
</div>
<div class="single-post-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 push-lg-3">
                <article class="single-post">
                    <div class="faq-section">
                        <div class="panel-group" id="accordion">
                            <?php
                            $results_per_page = 7;

                            // Find out the number of results stored in database
                            $faqPageQuery = $conn->query("SELECT COUNT(*) AS total FROM `faqpages`");
                            $row = $faqPageQuery->fetch_assoc();
                            $total_results = $row['total'];

                            // Calculate the number of pages required
                            $number_of_pages = ceil($total_results / $results_per_page);

                            // Determine which page number visitor is currently on
                            if (!isset($_GET['page']) || $_GET['page'] < 1) {
                                $current_page = 1;
                            } elseif ($_GET['page'] > $number_of_pages) {
                                $current_page = $number_of_pages;
                            } else {
                                $current_page = (int) $_GET['page'];
                            }

                            $start_limit = ($current_page - 1) * $results_per_page;

                            $faqPageQuery = $conn->query("SELECT * FROM `faqpages` ORDER BY `pageorder` LIMIT $start_limit, $results_per_page");

                            while ($faqPageRow = $faqPageQuery->fetch_assoc()) {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                href="#panel<?php echo $faqPageRow['id'] ?>">
                                                <?php echo $faqPageRow['name'] ?>
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="panel<?php echo $faqPageRow['id'] ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                <?php echo $faqPageRow['brief'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }

                            echo '<br><div class="pagination">';
                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                if ($page == $current_page) {
                                    echo "<strong>$page</strong> ";
                                } else {
                                    echo "&nbsp;<a href='?page=$page'>$page</a>&nbsp; ";
                                }
                            }
                            echo '</div>';
                            ?>

                        </div>
                    </div>
                </article>
            </div>
            <?php include_once './includes/sidebar.php' ?>
        </div>
    </div>
</div>

<?php include_once './includes/footer.php' ?>