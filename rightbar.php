<div class="rightbar">
    <?php
    if (isset($_SESSION['user_name'])) {
        echo "<div class='mypage_btn'><a href='categorylist.php'>QUẢN LÝ TRANG</a></div><br><br>";
    }

    ?>
    <div class="searchbox">
        <form action="search_result.php" method="POST">
            <input type="text" class="search" placeholder="Tìm kiếm..." name="noidung"/><br>
        </form>
    </div>
    <div class="aboutme">
        <div class="aboutmetitle">ABOUT ME</div>
        <div class="avatar"><img src="https://jvb-corp.com/img/logo.png" alt="Avatar"></div>
        <div class="aboutmecontent">JVB Việt Nam
            <br>
            Tầng 25, tòa B2 Roman Plaza<br>
            Đường Tố Hữu
            Quận Nam Từ Liêm, Hà Nội<br>

            (+84) 024-6253-3311
        </div>
    </div>
</div>
</body>
</html>
