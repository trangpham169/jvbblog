<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài viết</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<div class="allpage_mypage">
    <div class="mypage">
        <div class="header">
            <div class="topbar">
                <ul>
                    <li><a href="categorylist.php">QUẢN LÝ CHUYÊN MỤC</a></li>
                    <li><a href="#">QUẢN LÝ BÀI VIẾT</a></li>
                </ul>
            </div>
        </div>

        <div class="category">
            <div class="categoryTitle">DANH SÁCH BÀI VIẾT</div>

            <a href='postcreate.php' class="btn btn-success" style="margin-left: 1100px ">Thêm mới</a>

            <div class="categoryTable">
                <table>
                    <tr>
                        <th class="no" style="text-align: center">#</th>
                        <th class="tableName" style="text-align:center">Tiêu đề bài viết</th>
                        <th class="tableCategory" style="text-align:center">Chuyên mục</th>
                        <th class="created_at" style="text-align:center">Ngày tạo</th>
                        <th class="tableEdit"></th>
                    </tr>
                    <?php
                    //connect db//
                    include 'DBconnection.php';
                    //cau lenh
                    $lietke_sql = "SELECT post.post_id, post.title,post.created_at, category.category_name FROM post INNER JOIN category ON post.category_id=category.id";
                    //thuc thi cau lenh
                    $result = mysqli_query($conn, $lietke_sql);
                    //duyet result va ỉn ra

                    while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td style="text-align: center"><?php echo $r['post_id'] ?></td>
                            <td style="padding-left: 10px"><?php echo $r['title'] ?></td>
                            <td style="padding-left: 10px"><?php echo $r['category_name'] ?></td>
                            <td style="text-align: center"><?php echo $r['created_at'] ?></td>
                            <td>
                                <a href='postedit.php?post_id=<?php echo $r['post_id']; ?>' class="btn btn-info"
                                   style="margin: 10px; margin-left: 50px ">Sửa</a>
                                <a onclick="return confirm('Xóa thật luôn đấy nhé không đùa đâu');"
                                   href='postdelete.php?post_id=<?php echo $r['post_id']; ?>'
                                   class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
