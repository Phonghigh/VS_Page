<h3>Sửa sản phẩm</h3>
<?php
    include("config/connect.php");
    $id_sanpham = $_GET['id_sanpham'];
    $sql_sp ="SELECT * FROM tbl_sanpham WHERE id_sanpham = ".$id_sanpham."";
    $result = mysqli_query($conn,$sql_sp);
    $row_sp = mysqli_fetch_assoc($result);
echo "
<table border=".'1'." width = ".'50%'." class ='sua_sp'>
    <form method=".'POST'." action="."model/quanlysp/xuly.php?id_sanpham={$id_sanpham}"." enctype='multipart/form-data'>
        <tr>
            <th>Dữ liệu hiện tại</th>
            <th>Dữ liệu mới</th>
        </tr>
        <tr>
            <td>"
            .$row_sp['tensanpham']."
            </td>
            <td>
                <input type=".'text'." name=".'tensanpham_sua'.">
            </td>
        </tr>
        <tr>
            <td>"
            .$row_sp['masp']."
            </td>
            <td>
                <input type=".'text'." name=".'masp_sua'.">
            </td>
        </tr>
        <tr>
            <td>
            {$row_sp['giasp']}
            </td>
            <td>
                <input type=".'text'." name=".'giasp_sua'.">
            </td>
        </tr>
        <tr>
            <td>
            {$row_sp['soluong']}
            </td>
            <td>
                <input type=".'number'." name=".'soluong_sua'.">
            </td>
        </tr>
        <tr>
            <td>
            <img src ='model/quanlysp/uploads/{$row_sp['hinhanh']}' width='50%'>
            </td>
            <td>
                <input type= 'file' name='hinhanh_sua'>
            </td>
        </tr>
        <tr>
            <td>
            {$row_sp['tomtat']}
            </td>
            <td>
                <textarea rows='5' name='tomtat_sua'></textarea>
            </td>
        </tr>
        <tr>
            <td>
            {$row_sp['noidung']}
            </td>
            <td>
                <textarea rows='5' name='noidung_sua'></textarea>
            </td>
        </tr>
        <tr>
            <td>
            {$row_sp['tinhtrang']}
            </td>
            <td>
                <input type=".'number'." name=".'tinhtrang_sua'.">
            </td>
        </tr>
        <tr>
            <td>
            {$row_sp['id_danhmuc']}
            </td>
            <td>
                <input type=".'number'." name=".'id_danhmuc_sua'.">
            </td>
        </tr>
        <tr>
            <td collapse =".'2'.">
                <input type =".'submit'." name ='suasanpham' value='Sửa dữ liệu'>
            </td>
        </tr>
    </form>
</table>"
?>
