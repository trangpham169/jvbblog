<?php
session_start();
include 'DBconnection.php';
$LoginErr = '';
if (isset($_POST['dangnhap'])) {
    if($_POST['username']!='' && $_POST['password']!='' ){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        //Kiểm tra tên đăng nhập có tồn tại không
        $sql = "SELECT username,password FROM users WHERE username='$username' AND password='$password'";
    
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) == 0) {
            echo "<script>alert('Vui lòng kiểm tra lại');</script>";
        } else {
            $_SESSION['user_name'] = $username;
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
    <title>JVB'S BLOG</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
    .hello{
        margin-left: 1000px;
        margin-top: -50px;

    }
    #logoutBtn{
        margin-top: -14px;
        line-height: 18px;
    border: 1px solid #ccc;
    background: #fff;
    padding: 3px 10px;
    font-size: 14px;
    border-radius: 15px;
    cursor: pointer;
    color: #555 !important;
    min-width: 0;
    width: auto;
    height: auto;
    font-weight: normal;
    box-shadow: none;
    float: right;
    margin-bottom: -20px;
    margin-right: 72px;
    text-decoration: none;
    }
</style>
<body>

<div class="header">
    <div class="banner">JVB's BLOG</div>
    <div class="topbar">
        <div>
            <ul>
                <li><a href="index.php">TRANG CHỦ</a></li>
                <?php
                //cau lenh
                $lietke_sql = "SELECT * FROM category limit 6";
                $LoginErr ='';
                //thuc thi cau lenh
                $result = mysqli_query($conn, $lietke_sql);
                //duyet result va ỉn ra

                while ($r = mysqli_fetch_assoc($result)) {
                    ?>
                    <li><a href="bycategory.php?id=<?php echo $r['id']; ?>"><?php echo $r['category_name'] ?></a></li>
                    <?php
                }
                ?>
                <li><a href="contact.php">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div>
            <?php
            if (isset($_SESSION['user_name'])) {
                echo "<div class='hello'>" . $_SESSION['user_name']. "<br><br><a id='logoutBtn' href='logout.php'><i class='fa-solid fa-right-from-bracket'></i></a></div>";
            } else {
                echo "<button type ='submit' name='dangnhap' id='myBtn' >Đăng nhập</button>";
            }
            ?>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>CHÀO MỪNG TỚI BLOG CỦA JVB</h2>
                        <button class="span"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div>
                        <form action='' method='POST'>
                            <div class="modal-body">
                                <p><input type="text" name="username" placeholder=" Tên đăng nhập" required></p>
                                <p><input type="password" name="password" placeholder=" Mật khẩu" required></p>
                                
                            </div>
                            <div class="modal-footer" style="margin: 0px">
                                <h3>
                                    <button type='submit' name='dangnhap' class='login_ok_btn' style='margin:auto'>ĐĂNG
                                        NHẬP
                                    </button>
                                </h3>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("fa-solid fa-xmark")[0];

                // When the user clicks the button, open the modal
                btn.onclick = function () {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }
            </script>
        </div>
    </div>
</div>

</body>
</html>
