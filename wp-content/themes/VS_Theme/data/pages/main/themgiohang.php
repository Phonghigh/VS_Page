<?php
    session_start();
    include("../../admincp/config/connect.php");
    //thêm số lượng
    if (isset($_SESSION["cart"]) && isset($_GET["cong_sl"])) {
        // $_SESSION["cart"]
        $id = $_GET["id"];
        // if ($)
        foreach ($_SESSION["cart"] as $cart_item) {
            if ($cart_item["id"] !== $id) {
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }else{
                $sanpham_query = mysqli_query($conn,"SELECT * FROM tbl_sanpham WHERE id_sanpham='{$cart_item['id']}'");
                $row = mysqli_fetch_assoc($sanpham_query);
                if($cart_item['soluong'] < $row['soluong']){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }else{
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }
            }
        }
        $_SESSION['cart'] = $product;
        header('Location: ../../index.php?quanly=giohang');
    }
    //trừ số lượng
    if (isset($_SESSION["cart"]) && isset($_GET["tru_sl"])) {
        $id = $_GET["id"];
        foreach ($_SESSION["cart"] as $cart_item) {
            if ($cart_item["id"] !== $id) {
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            elseif($cart_item['soluong']>1){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']-1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
        }
        $_SESSION['cart'] = $product;
        header('Location: ../../index.php?quanly=giohang');
    }
    //xóa sản phẩm
    if (isset($_SESSION["cart"]) && isset($_GET["xoa"])) {
        $id = $_GET["xoa"];
        foreach ($_SESSION["cart"] as $cart_item) {
            if ($cart_item["id"] !== $id) {
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            elseif($cart_item['soluong']>1){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']-1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
        }
        $_SESSION['cart'] = $product;
        header('Location: ../../index.php?quanly=giohang');
    }

    //Xóa tất cả
    if (isset($_SESSION['cart']) && isset($_GET['xoatatca'])) {
        unset($_SESSION['cart']);
        header('Location: ../../index.php?quanly=giohang');

    }
    //thêm sản phẩm vào giỏ hàng
    if(isset($_POST['themgiohang'])){
        // session_destroy();
        $id = $_GET['id_sanpham'];
        $soluong = 1;
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham =$id LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        if($row){
            $new_product = array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
            //Kiểm tra session giở hàng tồn tại
            if(isset($_SESSION['cart'])){
                $found= false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id'] == $id){
                        $found=true;
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong']+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    }
                    else{
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    }
                }
                if($found == false){    
                    $_SESSION['cart'] =array_merge($product, $new_product);
                }
                else{ 
                    $_SESSION['cart'] = $product;
                }
            }
            else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>