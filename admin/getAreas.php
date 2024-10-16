<?php
include_once './includes/dbconn.php';
if (isset($_GET['cityid'])) {
    $cityId = intval($_GET['cityid']);
    $selectQuery = $conn->query("SELECT * FROM `suburb` WHERE `cityid` = $cityId AND `status` = 'Active' ORDER BY `suburb`");

    $areas = [];
    while ($selectRow = $selectQuery->fetch_assoc()) {
        $areas[] = [
            'id' => $selectRow['id'],
            'suburb' => $selectRow['suburb'],
        ];
    }
    echo json_encode($areas);
}
?>