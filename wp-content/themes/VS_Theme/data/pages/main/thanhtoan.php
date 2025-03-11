<?php
    // session_start();
    // include("../../admincp/config/connect.php");
    require("mail/sendmail.php");
    require 'admincp/Carbon/autoload.php';
    use Carbon\Carbon;
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0,999999);
    $insert_cart = "INSERT INTO tbl_giohang(id_khachhang,madh,status) VALUES({$id_khachhang},'{$code_order}',1)";
    $cart_query = mysqli_query($conn,$insert_cart);
    if ($cart_query) {
        //Thêm giỏ hàng chi tiết   
        $tong_tien = 0;
        foreach($_SESSION['cart'] as $cart_item) {

            $id_sanpham = $cart_item['id'];
            $sanpham_query = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE id_sanpham='{$id_sanpham}'");
            $row = mysqli_fetch_assoc($sanpham_query);
            $soluong = $cart_item['soluong'];
            $stocking = $row["soluong"] - $soluong;
            // echo "{$row['soluong']}, $soluong";
            $soluong_update = mysqli_query($conn,"UPDATE tbl_sanpham SET soluong = $stocking WHERE id_sanpham='{$id_sanpham}'");
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            // echo $now;
            $insert_order_details = "INSERT INTO tbl_giohang_chitiet(id_sanpham,madh,soluong,ngaydat) VALUES({$id_sanpham},'{$code_order}',{$soluong},'{$now}')";
            mysqli_query($conn,$insert_order_details);
            //nội dung gửi mail
            $thanhtien = $soluong * (int)$row['giasp'];
            $tong_tien += $thanhtien;
            $body = "
                Bạn vừa đặt 1 đơn hàng từ website Cầu lông.
                Đây là hóa đơn đơn hàng của bạn:
                <table border='1' width ='70%'>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tổng tiền</th>
                    </tr>
                        <tr>
                        <td>".$code_order."</td>
                        <td>".number_format($tong_tien)."</td>
                    </tr>
                </table>";
        }
        $to = $_SESSION['email'];
        $subject = "Đơn đặt hàng từ website Cầu Lông đã thành công!";
        $mail = new Mailer();
        $mail ->dathangmail($to, $subject, $body);
    }
    unset($_SESSION["cart"]);
    header("Location: index.php?quanly=camon");
?>