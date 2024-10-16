<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/auth.php" ?>

<a href="#" id="slide-nav-trigger" class="slide-nav-trigger">
    <i class="fa fa-bars" aria-hidden="true"></i>
    Dashboard Navigation
</a>
<?php include_once "./includes/user-sidebar.php" ?>
<div class="page-container-wrap">
    <div class="user-profile-update-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-widget">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Profile Details</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form class="form-common user-profile-form" method="post" action=""
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="edit-profile-photo">
                                            <img src="./admin/uploads/user/<?php echo $user_photo ? $user_photo : 'nophoto.jpg'; ?>"
                                                alt="img" class="img-responsive">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span>
                                                        <i class="fa fa-upload"></i>
                                                        Upload Photo
                                                    </span>
                                                    <input type="file" accept="image/*" name="photo" class="upload">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="firstname" value="<?php echo $user_firstname ?>"
                                            class="form-control" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastname" value="<?php echo $user_lastname ?>"
                                            class="form-control" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" value="<?php echo $user_email ?>" class="form-control" readonly
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="mobileno" value="<?php echo $user_mobileno ?>"
                                            class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="form-group" style="display: flex; justify-content: space-between;">
                                        <label class="col-md-3 col-form-label left-align" for="stateid">State</label>
                                        <div class="form-check">
                                            <select class="custom-select" id="stateid" name="stateid"
                                                onchange="loadCities()">
                                                <?php
                                                $selectQuery = $conn->query("SELECT * FROM `state` WHERE `status` = 'Active' ORDER BY `state`");
                                                while ($selectRow = $selectQuery->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $selectRow['id'] ?>" <?php if ($user_state == $selectRow['state'])
                                                           echo "selected" ?>>
                                                        <?php echo $selectRow['state'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="noChange">
                                        <div class="form-group">
                                            <input type="text" name="city" value="<?php echo $user_city ?>"
                                                class="form-control" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="suburb" value="<?php echo $user_suburb ?>"
                                                class="form-control" placeholder="Area">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="postcode" value="<?php echo $user_postcode ?>"
                                                class="form-control" readonly placeholder="Pincode">
                                        </div>
                                    </div>
                                    <div id="stateChange" style="display: none;">
                                        <div class="form-group" style="display: flex; justify-content: space-between;">
                                            <label class="col-md-3 col-form-label left-align" for="cityid">City</label>
                                            <div class="form-check">
                                                <select class="custom-select" id="cityid" name="cityid"
                                                    onchange="loadArea()">
                                                    <option value="" disabled selected>Select State First</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: flex; justify-content: space-between;">
                                            <label class="col-md-3 col-form-label left-align" for="suburb">Area</label>
                                            <div class="form-check">
                                                <select class="custom-select" id="suburb" name="suburb"
                                                    onchange="loadPostCode()">
                                                    <option value="" disabled selected>Select City First</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="postcode" class="form-control" readonly
                                                placeholder="Pincode">
                                        </div>
                                    </div>
                                    <div class="form-group textarea-form-group">
                                        <textarea rows="5" cols="5" name="address" class="form-control"
                                            placeholder="Address"><?php echo $user_address ?></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="listing-btn-large">Save Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
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
                                        <input type="password" name="passcode" class="form-control"
                                            placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="passcode1" class="form-control"
                                            placeholder="Confirm New Password">
                                    </div>
                                    <button type="submit" name="chgPasscode" class="listing-btn-large">Update
                                        Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadCities() {
            let stateId = document.getElementById('stateid').value;
            let citySelect = document.getElementById('cityid');

            document.getElementById("stateChange").style.display = "block";
            document.getElementById("noChange").style.display = "none";

            // Clear previous cities
            citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';

            if (stateId) {
                let xhr = new XMLHttpRequest();
                xhr.open('GET', 'admin/getCities.php?stateid=' + stateId, true);
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
                xhr.open('GET', 'admin/getAreas.php?cityid=' + cityId, true);
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
                xhr.open('GET', 'admin/getPostCode.php?suburb=' + suburb, true);
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
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $mobileno = $_POST['mobileno'];
        $stateid = $_POST['stateid'];
        $cityid = $_POST['cityid'];
        $suburb = trim($_POST['suburb']);
        $postcode = trim($_POST['postcode']);
        $address = trim($_POST['address']);
        $photo = $_FILES['photo'];

        if (empty($firstname) || empty($lastname) || empty($mobileno) || empty($address)) {
            toastMsg("No field can be empty", "error");
            return;
        }

        $file_size = $_FILES['photo']['size'];
        $max_allowed_file = 8388608;   //file bigger than 8mb is not allowed
        if ($file_size > $max_allowed_file) {
            toastMsg('Your file is greater than 8mb', 'error');
            return;
        }

        $path = $_FILES['photo']['name'];

        $fullname = $firstname . " " . $lastname;
        $pages = createSlug($fullname);

        $sqlp1 = "SELECT * FROM `state` WHERE `id` = '$stateid'";
        $queryp1 = mysqli_query($conn, $sqlp1);
        $rowp1 = mysqli_fetch_array($queryp1);
        $state = $rowp1['state'];

        $sqlp2 = "SELECT * FROM `city` WHERE `id` = '$cityid'";
        $queryp2 = mysqli_query($conn, $sqlp2);
        $rowp2 = mysqli_fetch_array($queryp2);
        $city = $rowp2['city'];

        if ($path == null) {
            $updateUserQuery = $conn->query("UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `fullname` = '$fullname', `pages` = '$pages', `mobileno` = '$mobileno', `state` = '$state', `city` = '$city', `suburb` = '$suburb', `address` = '$address', `postcode` = '$postcode', `date` = NOW() WHERE userid='$userid'");
        } else {
            $updateUserQuery = $conn->query("UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `fullname` = '$fullname', `pages` = '$pages', `mobileno` = '$mobileno', `state` = '$state', `city` = '$city', `suburb` = '$suburb', `address` = '$address', `postcode` = '$postcode', `photo` = '$path', `date` = NOW() WHERE userid='$userid'");

            $file_path = pathinfo($path);
            $file_extension = $file_path['extension'];
            $allowed_extensions = ['png', 'jpeg', 'jpg'];
            if (!in_array($file_extension, $allowed_extensions)) {
                toastMsg('Only png, jpeg and jpg files are allowed', 'error');
                return;
            }

            $upload_path = "./admin/uploads/user/" . $path;
            unlink("./admin/uploads/user/" . $photo);
            $upload_status = move_uploaded_file($_FILES['photo']['tmp_name'], $upload_path);
            if (!$upload_status) {
                toastMsg("Something went wrong! Please try again later.", 'error');
            }
        }

        if (!$updateUserQuery) {
            toastMsg("Something went wrong! Please try again later.", 'error');
            return;
        }

        toastMsg("Updated successfully", 'success');
        header("Location: dashboard.php");
        exit();
    }

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

        $updateUserQuery = $conn->query("UPDATE `users` SET `passcode` = '$passcode', `passcode1` = '$passcode1', `date` = NOW() WHERE userid = '$userid'");

        if (!$updateUserQuery) {
            toastMsg("Something went wrong! Please try again later.", 'error');
            return;
        }

        toastMsg("Updated successfully", 'success');
        header("Location: dashboard.php");
        exit();

    }
    ?>
    <div class="col-md-12">
        <?php include_once "./includes/footer.php" ?>
    </div>
</div>