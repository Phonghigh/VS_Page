<?php
    $id_danhmuc = $_GET['id'];
    $sql_lietke_sp ="SELECT * FROM tbl_sanpham WHERE  id_danhmuc = {$id_danhmuc}";
    $row_lietke_sp = mysqli_query($conn,$sql_lietke_sp)
?>

<form action="index.php?quanly=timkiem" method="POST" class="timkiem">
    <input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm...">
    <input type="submit" name="timkiem" value="Tìm Kiếm">
</form>

<div class="grip_container_maincontent">
    
        <?php
        while($row= mysqli_fetch_array($row_lietke_sp)) {
            echo "
            <div class='grip_item_maincontent'>
                <img src='admincp/model/quanlysp/uploads/".$row['hinhanh']."' alt='".$row['hinhanh']."'>
                <a href='?quanly=chitietsanpham&id=".$row['id_sanpham']."'>
                <p>{$row['tensanpham']}</p>
                <p class='price'>";echo number_format($row['giasp']); echo "đ </p>
                </a>
            </div>";
        }
        ?>
</div>

<script>
    
    $('.list_menu li a').removeClass('highlight');
    $(this).addClass('highlight');
    
</script>