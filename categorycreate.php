<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới chuyên mục</title>
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
            <?php
            $category_name = $_POST['category_name'] ?? '';

            //connect db//
            require_once 'DBconnection.php';
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
                    $category_name = $_POST['category_name'];
                    $themsql = "INSERT INTO category (category_name) VALUES ('$category_name')";
                    if (mysqli_query($conn, $themsql)) {
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

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="category_form">
                <div>
                    <label for="categoryName" class="categoryEdit_title">Tên chuyên mục</label><br>
                    <input type="text" class="categoryInput" name="category_name" id="category_name"><br>
                    <span style="color:red; margin: 30px"><?php echo $categoryErr ?></span><br><br>
                </div>

                <div class="categoryEdit__button">
                    <button type="submit" class="ok_btn">OK</button>
                </div>
        </div>
    </div>
</body>
</html>
