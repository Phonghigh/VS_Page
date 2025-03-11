<div class="main">
    <?php
    
    ?>
    <div class="maincontent">
        <?php
        if(isset($_GET["quanly"])){
            $pages = $_GET["quanly"];
        }
        else{
            $pages = '';
        }

        if ($pages == 'danhmucsanpham'){
            include(__DIR__ .'/main/danhmucsanpham.php');
        }
        elseif ($pages == 'chitietsanpham'){
            include(__DIR__ .'/main/sanpham.php');
        }
        elseif ($pages == 'giohang'){
            include(__DIR__ .'/main/giohang.php');
        }
        elseif ($pages == 'dangky'){
            include(__DIR__ .'/main/dangky.php');
        }
        elseif ($pages == 'dangnhap'){
            include(__DIR__ .'/main/dangnhap.php');
        }
        elseif ($pages == 'thanhtoan'){
            include(__DIR__ .'/main/thanhtoan.php');
        }
        elseif ($pages == 'timkiem'){
            include(__DIR__ .'/main/timkiem.php');
        }
        elseif ($pages == 'camon'){
            include(__DIR__ .'/main/camon.php');
        }
        elseif ($pages == 'thaydoimatkhau'){
            include(__DIR__ .'/main/thaydoimatkhau.php');
        }
        elseif ($pages == 'lienhe'){
            include(__DIR__ .'/main/lienhe.php');
        }
        else{
            include(__DIR__ ."/main/index.php");
        }
        ?>  
    </div>
</div>