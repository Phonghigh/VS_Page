<?php
// session_start();
?>
<p>Giỏ hàng
    <?php
        if (isset( $_SESSION['dangky'])) {
            echo "Xin chào {$_SESSION['dangky']}";
        }
    ?>
</p>

<?php
// echo"<pre>";
// print_r($_SESSION['cart']);
// echo"</pre>";
?>


<table border="1" style ="width: 100%; text-align: center; border-collapse: collapse">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Giá</th>
        <th>Quản lý</th>
    </tr>
    <?php
    if(isset($_SESSION['cart'])) {
        $i=0;
        $tong_tien = 0;
        foreach($_SESSION['cart'] as $cart_item) {
            $thanhtien = $cart_item['soluong'] * (int)$cart_item['giasp'];
            $tong_tien += $thanhtien;
            $i++;
        ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><?php echo $cart_item['masp']; ?></td>
        <td><img style="width: 150px" src="admincp/model/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" alt=""></td>
        <td>
            <a href="pages/main/themgiohang.php?cong_sl&id=<?php echo $cart_item['id']?>" class="giohang_button">+</a>
            <p class="giohang_soluong"><?php echo $cart_item['soluong']; ?></p>
            <a href="pages/main/themgiohang.php?tru_sl&id=<?php echo $cart_item['id']?>" class="giohang_button">-</a>
        </td>
        <td><?php echo number_format($cart_item['giasp']); ?> đ</td>
        <td><?php echo number_format($thanhtien); ?> đ</td>
        <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xóa</a></td>
    </tr>
    <?php
        }
        echo "
        <tr>
            <td colspan ='7'>
                <p>Tổng tiền: ";echo number_format($tong_tien); echo " đ</p>
            </td>
            <td>
                <a href='pages/main/themgiohang.php?xoatatca=1'>Xóa tất cả</a>
            </td>
        </tr>
        <tr>
        <td colspan ='8'>";
        if(isset($_SESSION['dangky'])or isset($_SESSION['dangnhap'])) {
            echo "<a href='index.php?quanly=thanhtoan'>Đặt hàng</a></td></tr>";
        }else{
            echo "<a href='index.php?quanly=dangky&giohang=true' style='margin-right: 50px'>Đăng ký để đặt hàng</a>";
            echo "<a href='index.php?quanly=dangnhap&giohang=true'>Đăng nhập để đặt hàng</a></td></tr>";
        }
    }
    
    else {
    ?>
    
    <tr>
        <td colspan ='8'>
            <p>Hiện tại giỏ hàng đang trống</p>
        </td>
    </tr>
    
    <?php
    }
    ?>
</table>

