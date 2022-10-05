<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JVB TOURNAMENT OF CHAMPIONSHIP 2022</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<div class="allpage">
    <div class="content">
        <?php
        require_once 'header.php';
        $detail_sql = "SELECT post.post_id, post.title,post.content,post.created_at, category.category_name, category.id as category_id FROM post INNER JOIN category ON post.category_id=category.id WHERE post.post_id = {$_GET['post_id']}";
        $result = mysqli_query($conn, $detail_sql);
        $r = mysqli_fetch_assoc($result);
        $new_post_sql = "SELECT * FROM post  WHERE post.post_id != {$_GET['post_id']} ORDER BY created_at DESC";
        $result_new_post = mysqli_query($conn, $new_post_sql);
        $data = mysqli_fetch_assoc($result_new_post);
        ?>
        <div class="contentblog">
            <div class="post">
                <div class="posttitle"><a href="#"><?php echo $r['title'] ?></a></div>
                <div class="post_remarks">
                    <p class="postdetail_category">Chuyên mục: <span><a
                                    href="bycategory.php?id=<?php echo $r['category_id']; ?>"><?php echo $r['category_name'] ?></a></span>
                    </p>
                    <p class="post_created_at">Ngày đăng: <?php echo $r['created_at'] ?></p>
                    <hr width="100%" text-align="left"/>
                </div>
                <div class="post_content">
                    <?php echo $r['content'] ?>
                </div>


                <hr width="100%" align="left"/>
            
                <BR>
                <div class="newpost">BÀI VIẾT MỚI NHẤT:</div>
                <BR><BR>

                <div class="post_suggestion">
                    <div class="post_suggestion1">
                        <a class="posttitle-a"
                           href="postdetail.php?post_id=<?php echo $data['post_id'] ?>"><?php echo strtoupper($data['title']) ?></a><br>
                        <div class="post_content"> <?php echo substr($data['content'], 0, 1000) ?>
                            <a href="postdetail.php?id=<?php echo $data['post_id'] ?>" class="seemore">...Đọc tiếp</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once 'rightbar.php'; ?>
        </div>
        <div class=footer>
            <?php include 'footer.php'; ?>
        </div>
    </div>

</div>
