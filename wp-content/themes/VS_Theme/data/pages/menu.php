<?php
    $sql_lietke_danhmucsp ="SELECT * FROM tbl_danhmuc";
    $row_lietke_danhmucsp = mysqli_query($conn,$sql_lietke_danhmucsp)
?>



<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <li>
        <?php
            while ($row = mysqli_fetch_array($row_lietke_danhmucsp)){
                echo "<a href='index.php?quanly=danhmucsanpham&id={$row['id_danhmuc']}'>{$row['tendanhmuc']}</a>";
                // echo 'thành công';
            }
        ?>
        </li>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
        <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
    </ul>
</div>

