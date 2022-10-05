<?php
include 'DBconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới bài viết</title>
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

            <?php
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            $categoryErr = "";


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["title"])) {
                    $titleErr = "* Vui lòng nhập tiêu đề bài viết" ?? '';
                } elseif ($_POST["content"] == "<br>") {
                    $contentErr = "* Vui lòng nhập nội dung" ?? '';
                } else {
                    //Insert input data to DB//
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $category_name = $_POST['category_name'];

//cau lenh sql
                    $themsql = "INSERT INTO post (title,content,category_id) VALUES ('$title','$content','$category_name')";

//thuc thi cau lenh
                    if (mysqli_query($conn, $themsql)) {
                        header('Location: postlist.php');
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="Post_title" class="postEditwhat">Tiêu đề bài viết</label><br>
                <input name="title" type="text" class="Post_title"><br>
                <span style="color:red; margin: 30px"><?php echo $titleErr ?? '' ?></span><BR><BR>
                <label for="category" class="postEditwhat">Chuyên mục</label><br>
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
                <label for="Post_content" class="postEditwhat">Nội dung bài viết</label><br><br>
                <textarea name="content" id="area" style="height:1500px; margin-left: 200px; width: 100%"></textarea>
                <span style="color:red; margin: 30px"><?php echo $contentErr ?? '' ?></span><br><br>
                <button type="submit" class="ok_btn" name='add' style="margin: 30px">OK</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>
