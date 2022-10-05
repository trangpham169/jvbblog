
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JVB'S BLOG</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
<div>
    <div class="allpage">
        <div class="content">
            <?php require_once 'header.php'; ?>
            <div class="contentblog">
                <div class="post">
                    <?php
                    $id = $_GET['id'];
                    $lietke_sql = "SELECT * FROM post WHERE category_id = $id ORDER BY created_at DESC";
                    //thuc thi cau lenh
                    $result = mysqli_query($conn, $lietke_sql);
                    //duyet result va ỉn ra
                    while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="posttitle"><a href="postdetail.php?post_id=<?php echo $r['post_id']?>"><?php echo strtoupper($r['title']) ?></a></div>
                        <div class="post_content">
                            <?php echo substr($r['content'], 0, 2000) ?>
                            <a href="postdetail.php?post_id=<?php echo $r['post_id']?>" class="seemore"> ...Đọc tiếp</a>
                            <hr width="100%" align="left"/>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php require_once 'rightbar.php'; ?>
            </div>
            <div class=footer>
                <?php include 'footer.php';?>
            </div>
        </div>
    </div>
</body>
</html>
