<?php
    session_start();
    if(!$_SESSION['dangnhap'])
    header('Location:login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <?php
            include("config/connect.php");
            include("model/header.php");
            include("model/menu.php");
            include("model/main.php");
            include("model/footer.php");
        ?>
        
    </div>
        
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
        
    $(document).ready(function () {
        thongke();
        var barChart = new Morris.Bar({
            element: 'bar-chart', // ID của container cho biểu đồ
            xkey: 'date',
            ykeys: ['sales'],
            labels: ['Doanh thu'],
            barColors: ['#1abc9c'], // Màu sắc cột
            hideHover: 'auto',
            data: []
        });
        

        var char = new Morris.Area({
            parseTime: false,
            element: 'chart',
            xkey: 'date',
            ykeys: ['order', 'sales', 'quantity'],
            labels: ['Đơn hàng', 'Doanh thu', 'Số lượng bán ra']
        });

        $('.select-date').change(function () {
            var thoigian = $(this).val();
            if (thoigian == '7ngay') {
                var text = '7 ngày qua';
            } else if (thoigian == '28ngay') {
                var text = '28 ngày qua';
            } else if (thoigian == '90ngay') {
                var text = '90 ngày qua';
            } else {
                var text = '365 ngày qua';
            }

            $.ajax({
                url: 'model/thongke.php',
                method: 'POST',
                dataType: 'JSON',
                data: { thoigian: thoigian },
                success: function (data) {
                    char.setData(data);
                    barChart.setData(data);
                    $('#text-date').text(text);
                }
            });
        });
        function thongke() {
            var text = "365 ngày qua";
            $('#text-date').text(text);

            $.ajax({
                url: "model/thongke.php",
                method: "POST",
                dataType: "JSON",
                success: function (data) {
                    char.setData(data);
                    barChart.setData(data);
                    $('#text-date').text(text);
                }
            });
        }
    });
    </script>

</body>
</html>