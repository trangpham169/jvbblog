<?php
//Insert input data to DB//
$category_name = $_POST['category_name'];
$id = $_POST['id'];

//connect db//
require_once 'DBconnection.php';

//cau lenh sql
$updatesql = "UPDATE category SET category_name='$category_name' WHERE id=$id";

//thuc thi cau lenh
if (mysqli_query($conn, $updatesql)) {
    header('Location: categorylist.php');
} else {
    echo '<script>alert ("Vui lòng kiểm tra lại");</script>';
}
?>



