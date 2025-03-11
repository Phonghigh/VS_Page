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
            <h2>Login</h2>
            <form method="POST" id="login-form">
                <input type="text" placeholder="Email" name="Email" required>
                <input type="password" placeholder="Password" name="Password" required>
                <input type="submit" value="Login" name="dangnhap">
                <!-- <p>Don't have an account? <a href="#" onclick="showRegister()">Register</a></p> -->
            </form>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['Email'];
        $matkhau = md5($_POST['Password']);
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau = '".$matkhau."' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $_SESSION['dangnhap'] = $row['tenkhachhang'];
            $_SESSION['id_khachhang'] = $row['id_dangky'];
            $_SESSION['email'] = $row['email'];
            // echo "{$_SESSION['dangnhap']}";
            if (isset($_GET['giohang'])){
                header('Location: index.php?quanly=giohang');
                }else{ 
                    // echo'helllo';
                header('Location: index.php');
                }
        }else{
            echo '<script> alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")</script>';
        }
    }
?>

