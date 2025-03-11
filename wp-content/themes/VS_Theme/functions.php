<!-- 
    Đây là file mặc định của wordpress không cần khai báo
    Dùng để thêm hoặc sửa đổi các tính năng của theme 
-->
<?php
    Global $theme_prefix, $theme_uri;
    // $theme_prefix dùng để Tránh xung đột tên biến, hàm hoặc hook với các plugin hoặc theme khác
    $theme_prefix = "VS_theme";
    // $theme_uri dùng để lấy đường dẫn đến các file trong thư mục assets theo quy chuẩn của wordpress
    $theme_uri = get_template_directory_uri().'/assets';

    $theme_version = '1.0';

    function load_font_awesome() {
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    }
    add_action('wp_enqueue_scripts', 'load_font_awesome');
    
    add_action('wp_enqueue_scripts', function() {
        wp_deregister_style('font-awesome');
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    }, 100);
    
    