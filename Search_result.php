<!-- <?php
// if(isset($_POST['btn'])){
//     $noidung = $_POST['noidung'];
// }
// ?>

    // <?php
// include 'DBconnection.php';
// $sql = "SELECT * FROM post WHERE title LIKE '%$noidung%' ";
// $result = mysqli_query($conn,$sql);

// while($row = mysqli_fetch_array($result)){
//     echo $row['title'];
//     echo $row['content']
// }


?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JVB'S BLOG</title>
    <link rel="stylesheet" href="base.css">
</head>

<div class="allpage">
    <div class="content">
        <?php require_once 'header.php'; ?>
        <div class="contentblog">
            <div class="post">
                <div class="search_result_title">Kết quả tìm kiếm cho: <?php
                    if (isset($_POST['noidung'])) {
                        $noidung = $_POST['noidung'];
                        echo $noidung;
                    }
                    ?>
                </div>
                <br>
                <hr width="100%" align="left"/>
                <br>

                <?php
                if (isset($_POST['btn'])) {
                    $noidung = $_POST['noidung'];
                }
                ?>

                <?php
                include 'DBconnection.php';
                $sql = "SELECT * FROM post WHERE title LIKE '%$noidung%' ORDER BY created_at DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) == 0) {
                    echo "Không có kết quả";
                }

                while ($r = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="posttitle"><a
                                href="postdetail.php?post_id=<?php echo $r['post_id'] ?>"><?php echo strtoupper($r['title']) ?></a>
                    </div>
                    <div class="post_content">
                        <?php echo substr($r['content'], 0, 2000) ?>
                        <a href="postdetail.php?post_id=<?php echo $r['post_id'] ?>" class="seemore"> ...Đọc tiếp</a>
                        <hr width="100%" align="left"/>
                    </div>
                    <?php
                }

                ?>

            </div>
            <?php require_once 'rightbar.php'; ?>
        </div>
        <div class=footer>
            <?php include 'footer.php'; ?>
        </div>
    </div>
</div>


