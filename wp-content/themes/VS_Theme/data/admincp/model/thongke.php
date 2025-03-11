<?php
    require '../Carbon/autoload.php';
    include('../config/connect.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;

    if (isset($_POST['thoigian'])) {
        $thoigian = $_POST['thoigian'];
    } else {
        $thoigian = '';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }

    if ($thoigian == '7ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    } elseif ($thoigian == '28ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(28)->toDateString();
    } elseif ($thoigian == '90ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
    } else{
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }
    // $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    $sql = "SELECT 
                ngaydat, 
                COUNT(tbl_giohang_chitiet.madh) AS total_orders, 
                SUM(tbl_giohang_chitiet.soluong) AS total_quantity, 
                SUM(tbl_giohang_chitiet.soluong * tbl_sanpham.giasp) AS total_sales
                FROM tbl_giohang_chitiet
                JOIN tbl_sanpham 
                ON tbl_giohang_chitiet.id_sanpham = tbl_sanpham.id_sanpham
                WHERE ngaydat BETWEEN DATE('$subdays') AND DATE('$now')
                GROUP BY ngaydat
                ORDER BY ngaydat ASC";
    // echo"$subdays";
    $sql_query = mysqli_query($conn, $sql);
    // echo "$sql_query";

    $chart_data = array();

    while ($val = mysqli_fetch_array($sql_query)) {
        // echo "{$val['ngaydat']}<br>";
        $chart_data[] = array(
            'date' => $val['ngaydat'],          // Ngày đặt hàng
            'order' => $val['total_orders'],   // Tổng số đơn hàng trong ngày
            'sales' => $val['total_sales'],    // Tổng doanh thu trong ngày
            'quantity' => $val['total_quantity'] // Tổng số lượng sản phẩm trong ngày
        );
    }


    echo json_encode($chart_data);
?>
