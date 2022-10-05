<?php

//lay id can sua
$id = $_GET['id'] ?? '';


// Create connection
require_once 'DBconnection.php';

//lay thong tin cua chuyen muc can sua
$edit_sql = "SELECT * FROM category WHERE id='$id'";

$result = mysqli_query($conn, $edit_sql);

$row = mysqli_fetch_assoc($result);


$category_name = $_POST['category_name'] ?? '';

//connect db//
$category_sql = "SELECT * FROM category WHERE category_name = '$category_name'";
$query = mysqli_query($conn, $category_sql);
$category_count = mysqli_num_rows($query);


$categoryErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["category_name"])) {
        $categoryErr = "* Vui lòng nhập tên chuyên mục";
    } elseif ($category_count > 0) {
        $categoryErr = "* Tên chuyên mục đã tồn tại";
    } else {
        //Insert input data to DB//
        $id = $_POST['id'];
//cau lenh sql
        $updatesql = "UPDATE category SET category_name='$category_name' WHERE id='$id'";

//thuc thi cau lenh
        if (mysqli_query($conn, $updatesql)) {
            header('Location: categorylist.php');
        }

    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa chuyên mục</title>
    <link rel="stylesheet" href="base.css">
</head>
<body>
<div class="allpage_mypage">
    <div class="mypage">
        <div class="header">
            <div class="topbar">
                <ul>
                    <li><a href="categorylist.php">QUẢN LÝ CHUYÊN MỤC</a></li>
                    <li><a href="postlist.php">QUẢN LÝ BÀI VIẾT</a></li>
                </ul>
            </div>
        </div>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="category_form">
                <input type="hidden" name="id" value="<?php echo $id; ?>" id="">
                <div>
                    <label for="categoryName" class="categoryEdit_title">Tên chuyên mục</label><br>
                    <input type="text" class="categoryInput" name="category_name"
                           value="<?php echo $row['category_name'] ?? '' ?>"><br>
                    <span style="color:red; margin: 30px"><?php echo $categoryErr ?></span><br><br>
                </div>

                <div class="categoryEdit__button">

                    <button type="submit" class="ok_btn" name='add'>OK</button>
                </div>
        </div>
    </div>


</body>
</html>
