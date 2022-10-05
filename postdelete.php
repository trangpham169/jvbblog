<?php
//lay du lieu id can xoa
$post_id = $_GET['post_id'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "trang_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//cau lenh
$delete_sql = "DELETE FROM post WHERE post_id=$post_id";

mysqli_query($conn, $delete_sql);

header("Location: postlist.php");

?>
