<?php
//lay du lieu id can xoa
$id = $_GET['id'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "trang_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//cau lenh
$delete_sql = "DELETE FROM category WHERE id=$id";

mysqli_query($conn, $delete_sql);

header("Location: categorylist.php");

?>
