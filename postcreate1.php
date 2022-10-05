<?php
require_once 'DBconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới bài viết</title>
    <link rel="stylesheet" href="../base.css">
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
                    <li><a href="http://localhost./blog/View/mypage/categorylist.php">QUẢN LÝ CHUYÊN MỤC</a></li>
                    <li><a href="http://localhost./blog/View/mypage/postlist.php">QUẢN LÝ BÀI VIẾT</a></li>
                </ul>
            </div>
        </div>
        <div class="postEditForm">
            <form action="postcreate1.php" method="POST">
                <label for="Post_title" class="postEditwhat">Tiêu đề bài viết</label><br>
                <input name="title" type="text" class="Post_title"><br>
                <label for="category" class="postEditwhat"> Chuyên mục </label><br>
                <select name="category_name" class="category_select">
                    <?php
                    //connect db//
                    //cau lenh
                    $lietke_sql = "SELECT * FROM category";
                    //thuc thi cau lenh
                    $result = mysqli_query($conn, $lietke_sql);
                    //duyet result va ỉn ra

                    while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $r['id'] ?>"><?php echo $r['category_name'] ?></option>
                        <?php
                    }
                    ?>
                </select><br>
                <label for="Post_content" class="postEditwhat">Nội dung bài viết</label><br>
                <textarea name="content" id="area" style="width:90%;height:700px;padding:50px"></textarea>

                <a href="http://localhost./blog/View/mypage/postlist.php" class="cancel_btn"
                   style="margin: 50px; background-color: grey;color:white;width: 200px;height: 70px;border-radius: 3px;text-decoration: none;">CANCEL</a>
                <button type="submit" class="ok_button" name='add'>OK</button>
            </form>
        </div>
    </div>
</div>
<?php
//Insert input data to DB//
$title = $_POST['title'];
$content = $_POST['content'];
$category_name = $_POST['category_name'];

//cau lenh sql
$themsql = "INSERT INTO post (title,content,category_id) VALUES ('$title','$content','$category_name')";

//thuc thi cau lenh
if (mysqli_query($conn, $themsql)) {
    header('Location: postlist.php');
} else {
    echo "<script>alert ('Vui lòng kiểm tra lại');</script>";
}
?>
