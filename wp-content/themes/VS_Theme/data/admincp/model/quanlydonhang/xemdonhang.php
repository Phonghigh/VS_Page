<a href="../../index.php?action=quanlydonhang">Back</a>
<h3>Liệt kê đơn hàng</h3>
<?php
    include("../../config/connect.php");
    $madh = $_GET['madh']; 
    $sql_lietke_dhchitiet ="SELECT * FROM tbl_giohang_chitiet WHERE madh = {$madh} ORDER BY id_giohang_chitiet DESC";
    $row_lietke_dhchitiet = mysqli_query($conn,$sql_lietke_dhchitiet);

?>
<table border="1" width ="70%">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
    </tr>
    <?php
    $i = 0;
    $tong_tien = 0;
    while ($row = mysqli_fetch_array($row_lietke_dhchitiet)){
        $sql_lietke_sanpham ="SELECT * FROM tbl_sanpham WHERE id_sanpham = '{$row['id_sanpham']}' ";
        $sanpham = mysqli_query($conn,$sql_lietke_sanpham);
        $result = mysqli_fetch_assoc($sanpham);
        $i++;
        $thanhtien = $row['soluong'] * (int)$result['giasp'];
        $tong_tien += $thanhtien;
        echo "<tr>
        <td>".$i."</td>
        <td>".$result['tensanpham']."</td>
        <td>{$result['masp']}</td>
        <td>{$result['giasp']}</td>
        <td><img style='width: 200px' src='../quanlysp/uploads/{$result['hinhanh']}'></td>
        <td>{$row['soluong']}</td>
        <td>"; echo number_format($thanhtien); echo " <b>đ</b></td>
    </tr>";
    }
    
    echo "<tr>
        <td colspan ='8' style= 'text-align: center;font-weight: bold;color: red'>"; echo number_format($tong_tien); echo "</td>
    </tr>";
    ?>
</table>

