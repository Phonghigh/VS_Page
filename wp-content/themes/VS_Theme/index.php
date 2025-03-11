
    
<?php
    global $theme_uri;
    // session_start();
    get_header();
?>
<div class='container'>
    <div class='featured'>
        <div class="section_title">
            <h2>Sản Phẩm Nổi Bật</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="featured_item">
                    <div class="featured_item_pic">
                        <img src="<?= $theme_uri; ?>/images/product/1.jpg" alt="Xịt thơm">
                        <ul class='featured_item_pic_hover'>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                            
                        </ul>
                    </div>  
                    <div class="featured_item_text">Xịt thơm</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="featured_item">
                    <div class="featured_item_pic">
                        <img src="<?= $theme_uri; ?>/images/product/2.jpg" alt="Xịt thơm">
                        <ul class='featured_item_pic_hover'>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                        </ul>
                    </div>  
                    <div class="featured_item_text">Nến thơm</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="featured_item">
                    <div class="featured_item_pic">
                        <img src="<?= $theme_uri; ?>/images/product/3.jpg" alt="Xịt thơm">
                        <ul class='featured_item_pic_hover'>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                        </ul>
                    </div>  
                    <div class="featured_item_text">Họp quà lớn</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="featured_item">
                    <div class="featured_item_pic">
                        <img src="<?= $theme_uri; ?>/images/product/4.jpg" alt="Xịt thơm">
                        <ul class='featured_item_pic_hover'>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                            <li>
                                <i class="fa fa-shopping-cart"></i>
                            </li>
                        </ul>
                    </div>  
                    <div class="featured_item_text">Hộp quà nhỏ</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    // echo $_SESSION['dangky'];
    // include(__DIR__ ."/data/admincp/config/connect.php");
    // include(__DIR__ ."/data/pages/header.php");
    // include(__DIR__ ."/data/pages/menu.php");
    // include(__DIR__ ."/data/pages/main.php");
    // include(__DIR__ ."/data/pages/footer.php");
    get_footer();
?>
</body>
</html>