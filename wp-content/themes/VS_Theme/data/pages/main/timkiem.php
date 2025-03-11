<?php
    if(isset($_POST['tukhoa'])){
        $tukhoa = $_POST['tukhoa'];
    }else{
        $tukhoa = '';
    }
    $sql_sp ="SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$tukhoa."%'";
    $row_sp = mysqli_query($conn,$sql_sp)
?>
<form action="index.php?quanly=timkiem" method="POST" class="timkiem">
    <input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm...">
    <input type="submit" name="timkiem" value="Tìm Kiếm">
</form>

<h3>Từ khóa tìm kiếm: <?php echo $_POST['tukhoa'] ?></h3>
<div class="grip_container_maincontent">
    
        <?php
        while($row= mysqli_fetch_array($row_sp)) {
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