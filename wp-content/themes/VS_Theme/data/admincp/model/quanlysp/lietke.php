<h3>Liệt kê sản phẩm</h3>
<?php
    $sql_lietke_sp ="SELECT * FROM tbl_sanpham";
    $row_lietke_sp = mysqli_query($conn,$sql_lietke_sp)
?>
<table border="1" width ="70%" class="lietke_sp">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng sản phẩm</th>
        <th>Hình sản phẩm</th>
        <th>Tóm tắt sản phẩm</th>
        <th style="width: 700px">Nội dung sản phẩm</th>
        <th>Tình trạng sản phẩm</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($row_lietke_sp)){
        $i++;
    echo "<tr>
        <td>".$i."</td>
        <td>".$row['tensanpham']."</td>
        <td>{$row['masp']}</td>
        <td>{$row['giasp']}</td>
        <td>{$row['soluong']}</td>
        <td>
            <img src='model/quanlysp/uploads/{$row['hinhanh']}'>
        </td>
        <td>{$row['tomtat']}</td>
        <td >{$row['noidung']}</td>
        <td>{$row['tinhtrang']}</td>
        <td>
            <a href=".'model/quanlysp/xuly.php?query=xoa&id_sanpham='.$row['id_sanpham'].">Xóa</a>
            <a href=".'?query=sua_sanpham&id_sanpham='.$row['id_sanpham'].''.">Sửa</a>
        </td>
    </tr>";
    }
    ?>
</table>
