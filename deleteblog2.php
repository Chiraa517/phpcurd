<?php 
include 'db_conn.php';

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];

    $conn->query("DELETE FROM `blog2` WHERE `id` = '$id'") or die($conn->error);
    header("LOCATION: blog2.php");
}


?>