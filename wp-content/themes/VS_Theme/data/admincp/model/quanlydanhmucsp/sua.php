<h3>Sửa danh mục sản phẩm</h3>
<?php
    include("config/connect.php");
    $id_danhmuc = $_GET['id_danhmuc'];
    $sql_danhmucsp ="SELECT * FROM tbl_danhmuc WHERE id_danhmuc = ".$id_danhmuc."";
    $result = mysqli_query($conn,$sql_danhmucsp);
    $row_danhmucsp = mysqli_fetch_assoc($result);
echo "
<table border=".'1'." width = ".'50%'." >
    <form method=".'POST'." action="."model/quanlydanhmucsp/xuly.php?id_danhmuc={$id_danhmuc}".">
        <tr>
            <th>Dữ liệu hiện tại</th>
            <th>Dữ liệu mới</th>
        </tr>
        <tr>
            <td>"
            .$row_danhmucsp['tendanhmuc']."
            </td>
            <td>
                <input type=".'text'." name=".'tendanhmuc_sua'.">
            </td>
        </tr>
        <tr>
            <td>"
            .$row_danhmucsp['thutu']."
            </td>
            <td>
                <input type=".'number'." name=".'thutu_sua'.">
            </td>
        </tr>
        <tr>
            <td collapse =".'2'.">
                <input type =".'submit'." name =".'suadanhmuc'." value='Sửa dữ liệu'>
            </td>
        </tr>
    </form>
</table>"
?>
    <?php
    
    ?>
