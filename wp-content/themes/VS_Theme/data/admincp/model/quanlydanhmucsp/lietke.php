<h3>Liệt kê danh mục sản phẩm</h3>
<?php
    $sql_lietke_danhmucsp ="SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $row_lietke_danhmucsp = mysqli_query($conn,$sql_lietke_danhmucsp)
?>
<table border="1" width ="70%">
    <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($row_lietke_danhmucsp)){
        $i++;
    echo "<tr>
        <td>".$i."</td>
        <td>".$row['tendanhmuc']."</td>
        <td>
            <a href=".'model/quanlydanhmucsp/xuly.php?query=xoa&id_danhmuc='.$row['id_danhmuc'].">Xóa</a>
            <a href=".'?query=sua_danhmuc&id_danhmuc='.$row['id_danhmuc'].''.">Sửa</a>
        </td>
    </tr>";
    }
    ?>
</table>
