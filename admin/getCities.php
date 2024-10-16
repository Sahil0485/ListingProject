<?php
include_once "./includes/dbconn.php"; 
if (isset($_GET['stateid'])) {
    $stateId = intval($_GET['stateid']);
    $selectQuery = $conn->query("SELECT * FROM `city` WHERE `stateid` = $stateId AND `status` = 'Active' ORDER BY `city`");

    $cities = [];
    while ($selectRow = $selectQuery->fetch_assoc()) {
        $cities[] = [
            'id' => $selectRow['id'],
            'city' => $selectRow['city'],
        ];
    }
    echo json_encode($cities);
}
?>
