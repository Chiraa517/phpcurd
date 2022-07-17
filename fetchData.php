<?php
include 'db_conn.php';


$result = $conn->query("SELECT id, title, excerpt FROM `blog2`");
$arr = [];

while ($row = $result->fetch_assoc()) {
    array_push($arr, $row);
}

if (empty($arr)) {
    echo json_encode(["code" => 400, "error" => "You have no blog."]);
} else {
    echo json_encode(["code" => 200, "success" => $arr]);
}