<div class="header">            
<?php 
        // session_start();
        if(isset($_SESSION['dangky']) or isset($_SESSION['dangnhap'])){
            
            echo "<div class='taikhoan'> <p style='float: right'>Xin chào <span style='color: blue'>";echo isset($_SESSION['dangky'])? $_SESSION['dangky']:$_SESSION['dangnhap'];echo "</span></p>";
            echo "<br><a href='index.php?quanly=thaydoimatkhau'>Thay Đổi Mật Khẩu</a> 
                <a href='index.php?dangxuat'>Đăng Xuất</a></div>";
        }else{
            echo "<div class='taikhoan'><a href='index.php?quanly=dangnhap'>Đăng Nhập</a>";
            echo "<a href='index.php?quanly=dangky'>Đăng Ký</a></div>";
        }
    ?>
</div>

<?php
    if(isset($_GET['dangxuat'])){
        echo'đăng xuất';
        unset($_SESSION['dangky']);
        unset($_SESSION['dangnhap']);
        header('Location: index.php');
    }
?>