<h3>Liệt kê đơn hàng</h3>
<?php
    $sql_lietke_dh ="SELECT * FROM tbl_giohang,tbl_dangky WHERE tbl_giohang.id_khachhang = tbl_dangky.id_dangky ORDER BY id_giohang DESC";
    $row_lietke_dh = mysqli_query($conn,$sql_lietke_dh)
?>
<table border="1" width ="70%">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Điện thoại</th>
        <th colspan="2">Quản lý</th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($row_lietke_dh)){
        $i++;
    echo "<tr>
        <td>".$i."</td>
        <td>".$row['madh']."</td>
        <td>{$row['tenkhachhang']}</td>
        <td>{$row['diachi']}</td>
        <td>{$row['email']}</td>
        <td>{$row['dienthoai']}</td>
        <td>
            <a href=".'model/quanlydonhang/xemdonhang.php?madh='.$row['madh'].">Xem đơn hàng</a>
        </td>
        <td>
            <a href=".'model/quanlydonhang/indonhang.php?madh='.$row['madh'].">In đơn hàng</a>
        </td>
    </tr>";
    }
    ?>
</table>
