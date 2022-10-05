
 

<?php
//Insert input data to DB//
$category_name = $_POST['category_name'];

//connect db//
require_once 'DBconnection.php';

//cau lenh sql
$themsql = "INSERT INTO category (category_name) VALUES ('$category_name')";

//thuc thi cau lenh
if (mysqli_query($conn, $themsql)) {
    header('Location: categorylist.php');
} else {
    echo "<script>alert ('Vui lòng kiểm tra lại');</script>";
}
?>



