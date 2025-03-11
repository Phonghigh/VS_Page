<?php
require('../../tfpdf/tfpdf.php');
include('../../config/connect.php');
$pdf = new tFPDF();
$pdf->AddPage();
$pdf->AddFont('DejaVu','', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('DejaVu', '', 9);

$pdf->SetFillColor(193, 229, 252);
$pdf->Write(10, 'Đơn hàng của bạn gồm có:');
$pdf->Ln(10);

$width_cell=array(5,90,15,30,30,30);

$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'Tên sản phẩm', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'Số lượng', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'Giá', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'Ngày đặt', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'Tổng tiền', 1, 1, 'C', true);

$pdf->SetFillColor(236, 236, 236);
$fill = false;

$madh = $_GET['madh'];

$sql = "
    SELECT 
        sp.tensanpham AS ten_sanpham,
        ghct.madh AS ma_don_hang,
        ghct.soluong AS so_luong,
        sp.giasp AS gia_san_pham,
        ghct.ngaydat AS ngay_dat,
        (ghct.soluong * sp.giasp) AS tong_tien
    FROM 
        tbl_giohang_chitiet ghct
    JOIN 
        tbl_sanpham sp ON ghct.id_sanpham = sp.id_sanpham
    WHERE 
        ghct.madh = '$madh'
";

$sql_query = mysqli_query($conn, $sql);
$i = 0;
while ($row = mysqli_fetch_array($sql_query)) {
    $i++;
    $pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['ten_sanpham'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[2], 10, $row['so_luong'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, number_format($row['gia_san_pham']), 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, $row['ngay_dat'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[5], 10, number_format($row['tong_tien']), 1, 1, 'C', $fill);
    $fill = !$fill;
}

$pdf->Write(10, 'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
$pdf->Output();

?>