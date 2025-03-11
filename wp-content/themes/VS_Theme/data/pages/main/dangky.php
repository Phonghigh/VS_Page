<?php
if (isset($_POST["dangky"])) {
    // Lấy dữ liệu từ form
    $tenkhachhang = $_POST["tenkhachhang"];
    $email = $_POST["email"];
    $dienthoai = $_POST["dienthoai"];
    $diachi = $_POST["diachi"];
    $password = md5($_POST["password"]);
    $repassword = md5($_POST["repassword"]);

    // Kiểm tra kết nối cơ sở dữ liệu (đảm bảo $conn tồn tại)
    if (!$conn) {
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Kiểm tra mật khẩu khớp
    if ($password != $repassword) {
        echo "<script>alert('Mật khẩu không khớp nhau');</script>";
    } else {
        // Thực hiện câu lệnh INSERT INTO
        $sql_dangky = "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) 
        VALUES ('$tenkhachhang', '$email', '$diachi', '$password', '$dienthoai')";
        if (mysqli_query($conn, $sql_dangky)) {
            // Đăng ký thành công
            echo "<script>alert('Bạn đã đăng ký thành công');</script>";

            // Lấy ID khách hàng vừa thêm
            $id_khachhang = mysqli_insert_id($conn);

            // Lưu thông tin vào session
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = $id_khachhang;
            $_SESSION['email'] = $email;

            // Điều hướng trang
            if (isset($_GET['giohang'])) {
                header('Location: index.php?quanly=giohang');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            // Nếu có lỗi khi thêm vào cơ sở dữ liệu
            echo "<script>alert('Đăng ký không thành công. Vui lòng thử lại!');</script>";
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>   

        .container {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40vh;
        margin: 0 auto;    
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 400px;
        }

        .form-container {
        display: flex;
        flex-direction: column;
        text-align: center;
        }


        h2 {
        margin-bottom: 20px;
        text-align: center;
        }

        input {
        width: 300px;
        margin: 0 auto;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        }
        input[type="submit"]:hover{
            background: blue;
            color: white;
        }
        input[type="submit"]{
            width: 320px;
        }

    </style>
</head>
<body>
    
<div class="container">
    <div class="form-container">
        <h2 style="text-align: center;">Register</h2>
        <form method="POST">
            <input type="text" name ="tenkhachhang" placeholder="Full Name" required>
            <input type="email" name ="email" placeholder="Email" required>
            <input type="text" name ="dienthoai" placeholder="Điện Thoại" required>
            <input type="text" name ="diachi" placeholder="Địa chỉ" required>
            <input type="password" name ="password" placeholder="Mật khẩu" required>
            <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>
            <input type="submit" value="Đăng Ký" name="dangky">
            <!-- <p>Already have an account? <a href="#" onclick="showLogin()">Login</a></p> -->
        </form>
    <div class="form-container">
</div>
</body>
</html>
