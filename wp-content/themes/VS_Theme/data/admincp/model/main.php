<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET["action"])){
            $pages = $_GET["action"];
        }
        else{
            $pages = '';
        }
        if ($pages =='quanlydanhmucsanpham'){
            include("../admincp/model/quanlydanhmucsp/them.php");
            include("../admincp/model/quanlydanhmucsp/lietke.php");
            // include("../admincp/model/quanlydanhmucsp/sua.php");
        }
        elseif (isset($_GET['query']) and $_GET['query'] =='sua_danhmuc'){
            // echo "{$_GET['query']}";
            include("model/quanlydanhmucsp/sua.php");
        }
        elseif (isset($_GET['query']) and $_GET['query'] == 'sua_sanpham'){
            include("model/quanlysp/sua.php");
        }
        elseif ($pages=='quanlysanpham'){
            include('model/quanlysp/them.php');
            include('model/quanlysp/lietke.php');
        }
        elseif ($pages=='quanlydonhang'){
            // include('model/quanlysp/them.php');
            include('model/quanlydonhang/lietke.php');
        }
        elseif ($pages=='dangxuat'){
            unset($_SESSION['dangnhap']);
            header('Location: login.php');
        }
        else{
            include('model/dashboard.php');
        }
        ?>
</div>