<?php
include_once "./includes/dbconn.php";
if (isset($_GET['suburb'])) {
    $suburb = trim($_GET['suburb']);
    $selectQuery = $conn->query("SELECT * FROM `suburb` WHERE `suburb` = '$suburb' AND `status` = 'Active'");

    if ($selectRow = $selectQuery->fetch_assoc()) {
        ?>
        <input type="number" class="form-control" id="postcode" value="<?php echo $selectRow['postcode'] ?>" name="postcode" readonly required>
        <?php
    }
}
?>