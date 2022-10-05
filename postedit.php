<?php

//lay id can sua
$post_id = $_GET['post_id'] ?? '';

// Create connection
require_once 'DBconnection.php';

//lay thong tin cua chuyen muc can sua
$edit_sql = "SELECT post.post_id, post.content,post.title , category.category_name FROM post INNER JOIN category ON post.category_id=category.id WHERE post.post_id='$post_id'";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);
//Insert input data to DB//
$title = $_POST['title'] ?? '';
$category_id = $_POST['category_name'] ?? '';
$content = $_POST['content'] ?? '';
$id = $_GET['post_id'] ?? '';
$categoryErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "* Vui lòng nhập tiêu đề bài viết" ?? '';
    } elseif ($_POST["content"] == "<br>" || $_POST["content"] == "") {
        $contentErr = "* Vui lòng nhập nội dung" ?? '';
    } else {
        if ($title != '' && $category_id != '') {
            $updatesql = "UPDATE post SET title= '$title', content='$content',category_id='$category_id' WHERE post_id='$id'";
            if (mysqli_query($conn, $updatesql)) {
                header('Location: postlist.php');
            } else {
                var_dump($conn->error);
                echo '<script>alert ("Vui lòng kiểm tra lại");</script>';
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết</title>
    <link rel="stylesheet" href="base.css">
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function () {
            new nicEditor({maxHeight: 200}).panelInstance('area');
        });
    </script>
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
        <div class="postEditForm">
            <div>
                <form action="" method="POST" name="category_form">
                    <div>
                        <label for="categoryName" class="categoryEdit_title">Tiêu đề</label><br>
                        <input type="text" class="categoryInput" name="title" value="<?php echo $row['title'] ?? '' ?>"><br>
                        <span style="color:red; margin: 30px"><?php echo $titleErr ?? '' ?></span><BR><BR>

                        <label for="category" class="postEditwhat"> Chuyên mục </label><br>
                        <select name="category_name" class="category_select">
                            <?php

                            $lietke_sql = "SELECT * FROM category";
                            $result = mysqli_query($conn, $lietke_sql);
                            while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $r['id'] ?>" selected><?php echo $r['category_name'] ?></option>
                                <?php
                            }
                            ?>
                        </select><br>
                        <label for="categoryName" class="categoryEdit_title">Nội dung</label><br>
                        <textarea name="content" id="area"
                                  style="height:2000px; margin-left: 200px; width: 100%"><?php echo $row['content'] ?></textarea>
                        <br>
                        <span style="color:red; margin: 30px"><?php echo $contentErr ?? '' ?></span><BR><BR>
                    </div>
                    <div class="categoryEdit__button">
                        <button type="submit" class="ok_btn" name='id'>OK</button>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



