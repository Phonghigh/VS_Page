<?php
include("../../config/connect.php");
// echo"thành công";

if (isset($_POST['themsanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    //Xử lý hình ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang) VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."' )";
    mysqli_query($conn, $sql_them);
    header('Location:../../index.php?action=quanlysanpham');
}

elseif (isset($_POST['suasanpham'])) {
    $id_sanpham = $_GET['id_sanpham'];
    $tensanpham_sua = mysqli_real_escape_string($conn, $_POST['tensanpham_sua']);
    $masp_sua = mysqli_real_escape_string($conn, $_POST['masp_sua']);
    $giasp_sua = $_POST['giasp_sua'];
    $soluong_sua = (int)$_POST['soluong_sua'];
    $id_danhmuc_sua =$_POST['id_danhmuc_sua'];
    $tinhtrang_sua = (int)$_POST['tinhtrang_sua'];
    $tomtat_sua = mysqli_real_escape_string($conn, $_POST['tomtat_sua']);
    $noidung_sua = mysqli_real_escape_string($conn, $_POST['noidung_sua']);

    $hinhanh_sua = $_FILES['hinhanh_sua']['name'];
    $hinhanh_tmp = $_FILES['hinhanh_sua']['tmp_name'];
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_sua);

    // Câu lệnh SQL cập nhật
    $sql_sua = "UPDATE tbl_sanpham
                SET tensanpham = '{$tensanpham_sua}',
                    masp = '{$masp_sua}',
                    giasp = '{$giasp_sua}',
                    soluong = {$soluong_sua},
                    hinhanh = '{$hinhanh_sua}',
                    tomtat = '{$tomtat_sua}',
                    noidung = '{$noidung_sua}',
                    tinhtrang = {$tinhtrang_sua},
                    id_danhmuc = '{$id_danhmuc_sua}'
                WHERE id_sanpham = {$id_sanpham};";

    mysqli_query($conn, $sql_sua);
    header('Location:../../index.php?action=quanlysanpham');
}


elseif (isset($_GET['query']) == 'xoa') {
    $id_sanpham = $_GET['id_sanpham'];
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham=".$id_sanpham."";
    mysqli_query($conn, $sql_xoa);
    header('Location:../../index.php?action=quanlysanpham');
}
?>