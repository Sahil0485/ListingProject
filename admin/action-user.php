<?php
include_once './includes/header.php';
?>
<?php
$pageName = "Manage User";
$tableName = "users";
$viewPage = "verified-user.php";
?>
<div class="row">
    <div class="page-title-block">
        <h4><?= $pageName ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php"><i class="ti-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo $viewPage ?>">Verified Users</a></li>
            <li class="breadcrumb-item active"><?= $pageName ?></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-widget">
            <?php
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Edit User</h4>
                        </div>
                    </div>
                    <?php
                    $editQuery = $conn->query("SELECT * FROM `$tableName` WHERE id = '$id'");
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
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        value="<?php echo $editRow['firstname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        value="<?php echo $editRow['lastname'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo $editRow['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobileno">Mobile Number</label>
                                    <input type="number" class="form-control" id="mobileno" name="mobileno"
                                        value="<?php echo $editRow['mobileno'] ?>" required>
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
                                        <select class="custom-select" id="cityid" name="cityid" required
                                            onchange="loadArea()">
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
                                        <select class="custom-select" id="suburb" name="suburb" required
                                            onchange="loadPostCode()">
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
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="10"
                                        required><?php echo $editRow['address'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="passcode">Password</label>
                                    <input type="password" class="form-control" id="passcode" name="passcode"
                                        value="<?php echo $editRow['passcode'] ?>" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="status" name="status" required>
                                            <?php
                                            if ($editRow['status'] == 'Active') {
                                                ?>
                                                <option value="Active" selected>Active</option>
                                                <option value="DeActive">Deactive</option>
                                            <?php } else { ?>
                                                <option value="Active">Active</option>
                                                <option value="DeActive" selected>Deactive</option>
                                            <?php } ?>
                                        </select>
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
                            <h4>Add User</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-block">
                            <form class="form-common" enctype="multipart/form-data" method="post" action="">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        placeholder="User First Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        placeholder="User Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="User mail"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="mobileno">Mobile Number</label>
                                    <input type="number" class="form-control" id="mobileno" name="mobileno"
                                        placeholder="User Mobile Number" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="stateid">State</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="stateid" name="stateid" required
                                            onchange="loadCities()">
                                            <option value="" disabled selected>Select State</option>
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
                                    <label class="col-md-3 col-form-label left-align" for="cityid">City</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="cityid" name="cityid" required
                                            onchange="loadArea()">
                                            <option value="" disabled selected>Select State First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="suburb">Area</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="suburb" name="suburb" required
                                            onchange="loadPostCode()">
                                            <option value="" disabled selected>Select City First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Post code</label>
                                    <input type="number" class="form-control" id="postcode" name="postcode" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="10" placeholder="User Address"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="passcode">Password</label>
                                    <input type="password" class="form-control" id="passcode" name="passcode"
                                        placeholder="User Password" required>
                                </div>
                                <div class="form-group" style="display: flex;">
                                    <label class="col-md-3 col-form-label left-align" for="status">Status</label>
                                    <div class="form-check">
                                        <select class="custom-select" id="status" name="status" required>
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="DeActive">Deactive</option>
                                        </select>
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
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $mobileno = trim($_POST['mobileno']);
    $stateid = trim($_POST['stateid']);
    $cityid = trim($_POST['cityid']);
    $suburb = trim($_POST['suburb']);
    $postcode = trim($_POST['postcode']);
    $country = trim($_POST['country']);
    $address = trim($_POST['address']);
    $passcode = trim($_POST['passcode']);
    $status = trim($_POST['status']);

    $fullname = $firstname . " " . $lastname;
    $pages = createSlug($fullname);

    $passcode1 = $passcode;
    $activation = md5($email_address . time());

    $sqlp1 = "SELECT * FROM `state` WHERE `id` = '$stateid'";
    $queryp1 = mysqli_query($conn, $sqlp1);
    $rowp1 = mysqli_fetch_array($queryp1);
    $state = $rowp1['state'];

    $sqlp2 = "SELECT * FROM `city` WHERE `id` = '$cityid'";
    $queryp2 = mysqli_query($conn, $sqlp2);
    $rowp2 = mysqli_fetch_array($queryp2);
    $city = $rowp2['city'];

    if ($_GET['edit']) {
        $Query = $conn->query("UPDATE `$tableName` SET `firstname` = '$firstname', `lastname` = '$lastname', `fullname` = '$fullname', `email` = '$email', `pages` = '$pages', `passcode` = '$passcode', `passcode1` = '$passcode1', `mobileno` = '$mobileno', `state` = '$state', `city` = '$city', `country` = 'India', `suburb` = '$suburb', `activation` = '$activation', `address` = '$address', `postcode` = '$postcode', `status` = '$status', `basicinfo` = '1', `date` = NOW() WHERE id='$id'");
    } else {

        $sqlp = "SELECT * FROM `users` ORDER BY `userid` desc";
        $queryp = mysqli_query($conn, $sqlp);
        $rowp = mysqli_fetch_array($queryp);
        $userid = $rowp['userid'] + 1;
        $usereng = "UI-00";
        $userno = $usereng . $userid;

        $Query = $conn->query("INSERT INTO `$tableName` (`firstname`, `lastname`, `fullname`, `userid`, `userno`, `pages`, `email`, `passcode`, `passcode1`, `mobileno`, `state`, `city`, `country`, `suburb`, `activation`, `address`, `postcode`, `status`, `basicinfo`, `staffname`) VALUES ('$firstname', '$lastname', '$fullname', '$userid', '$userno', '$pages', '$email', '$passcode', '$passcode1', '$mobileno', '$state', '$city', 'India', '$suburb', '$activation', '$address', '$postcode', '$status', '1', '$staffname')");
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
<?php include_once './includes/footer.php'; ?>