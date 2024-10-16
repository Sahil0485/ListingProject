<div class="main-nav-section">
    <div class="user-panel">
        <?php
        if (isset($_SESSION['username'])) {
            ?>
            <a href="?logout" class="user-login-btn border-btn">
                <i class="bi bi-box-arrow-in-left" aria-hidden="true"></i> Log out
            </a>
            <a href="dashboard.php" class="user-addlisting-btn" style="margin: 0">
                <i class="bi bi-person-check" aria-hidden="true"></i> Dashboard
            </a>
        <?php } else { ?>
            <a href="login.php" class="user-login-btn border-btn">
                <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i> Log in
            </a>
            <a href="register.php" class="user-addlisting-btn" style="margin: 0">
                <i class="bi bi-person-add" aria-hidden="true"></i> Register
            </a>
        <?php } ?>
    </div>
    <nav class="navbar navbar-toggleable-md fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-bars navbar-toggle-btn" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand" href="index.php">
            <img src="images/logo-footer.png" width="156px" alt="img" class="img-responsive" />
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <li><a class="dropdown-item" href="about-us.php">About Us</a></li>
                        <li>
                            <a class="dropdown-item" href="contact-us.php">Contact Us</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="feedback.php">Feedback</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="faq.php">FAQs</a>
                        </li>
                        <li><a class="dropdown-item" href="terms.php">Terms & Conditions</a></li>
                        <li><a class="dropdown-item" href="privacy.php">Privacy Policy</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="all-category.php" id="navbarDropdownMenuLink3">
                        <!-- data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
                        <!-- the above line is stoping the anchor tag to redirect page -->
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <?php
                        $navCategoryQuery = $conn->query("SELECT * FROM `addcategory` WHERE `status` = 'Active' ORDER BY `name`");
                        while ($navCategoryRow = $navCategoryQuery->fetch_assoc()) {
                            ?>
                            <li>
                                <a class="dropdown-item" href="sub-category.php?pages=<?php echo $navCategoryRow['pages'] ?>">
                                    <?php echo $navCategoryRow['name'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <button type="button" class="btn btn-primary">
                        <a href="add-listing.php" class="user-addlisting-btn" onmouseover="this.style.color='#e1e1e1';"
                            style="margin: 0;">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Listing
                        </a>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php
if (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();

    // Clear the cookie
    if (isset($_COOKIE['username'])) {
        setcookie('username', '', time() - 3600, "/");
    }

    toastMsg("Logout Successful", "success");
    header("Location: index.php");
    exit();
}
?>