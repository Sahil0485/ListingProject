<?php
include_once "./includes/dbconn.php"; 
if (isset($_GET['fname'])) {
    $fname = trim($_GET['fname']);
    $selectQuery = $conn->query("SELECT * FROM `subcategory` WHERE `fname` = '$fname' AND `status` = 'Active' ORDER BY `name`");

    $subcategorylist = [];
    while ($selectRow = $selectQuery->fetch_assoc()) {
        $subcategorylist[] = [
            'id' => $selectRow['id'],
            'name' => $selectRow['name'],
        ];
    }
    echo json_encode($subcategorylist);
}
?>
