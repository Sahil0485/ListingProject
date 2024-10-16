<?php include_once "./includes/header.php" ?>

<div class="main-wrap">
    <div class="page-container-wrap" style="width: 100%; transform: translate3d( 0, 0, 0); padding: 0.5rem 2rem;">
        <div class="container-fluid">
            <div class="row">
                <?php
                $categoryQuery = $conn->query("SELECT * FROM `addcategory` WHERE `status` = 'Active' ORDER BY `pageorder` ASC");
                if ($categoryQuery->num_rows == 0) {
                    echo "<script>";
                    echo "alert('This page is empty');";
                    echo "window.location.href='index.php';";
                    echo "</script>";
                    exit();
                }
                while ($categoryRow = $categoryQuery->fetch_assoc()) {
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <article class="popular-listing-post">
                            <div class="post-thumb">

                                <img src="admin/uploads/category/<?php echo $categoryRow['photo'] ? $categoryRow['photo'] : 'nophoto.jpg' ?>"
                                    alt="img" class="img-responsive" width="400px">
                                <div class="overlay" style="background: rgba(1,1,1,0.3);"></div>
                            </div>
                            <div class="post-details">
                                <div class="post-meta">
                                    <div class="location">
                                        <h5>
                                            <a href="sub-category.php?pages=<?php echo $categoryRow['pages']; ?>">
                                                <?php echo $categoryRow['name'] ?>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="post-entry-block">
                                    <p class="post-entry">
                                        <?php
                                        $fnameCategory = $categoryRow['name'];
                                        $subcategoryQuery = $conn->query("SELECT * FROM `subcategory` WHERE `status` = 'Active' AND `fname` = '$fnameCategory' ORDER BY `name` ASC LIMIT 5");
                                        while ($subcategoryRow = $subcategoryQuery->fetch_assoc()) {
                                            ?>
                                            <a
                                                href="sub-category-listing.php?link=<?php echo $subcategoryRow['link'] ?>&pages=<?php echo $subcategoryRow['pages'] ?>">
                                                <?php echo $subcategoryRow['name'] ?>
                                            </a>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <br><br><br>
</div>

<?php include_once "./includes/footer.php" ?>