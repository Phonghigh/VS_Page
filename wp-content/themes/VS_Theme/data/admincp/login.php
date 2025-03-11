<?php
    session_start();
    include("config/connect.php");
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['Email'];
        $matkhau = md5($_POST['Password']);
        $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $_SESSION['dangnhap'] = $taikhoan;
            header('Location: index.php');
        }else{
            echo '<script> alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")</script>';
        }
    }
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40vh;
        margin: 150px auto;    
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

        .hidden {
        display: none;
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

        button {
        background-color: #5cb85c;
        color: white;
        padding: 10px;
        border: none;
        width:320px;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 auto;
        }

        button:hover {
        background-color: #4cae4c;
        }

        p {
        font-size: 14px;
        text-align: center;
        }

        a {
        color: #337ab7;
        text-decoration: none;
        }

        a:hover {
        text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <form method="POST" id="login-form" action="login.php">
                <input type="text" placeholder="Email" name="Email" required>
                <input type="password" placeholder="Password" name="Password" required>
                <input type="submit" value="Login" name="dangnhap">
                <!-- <p>Don't have an account? <a href="#" onclick="showRegister()">Register</a></p> -->
            </form>
        </div>
    </div>

    <script>
        function showRegister() {
            document.getElementById('login-form').parentElement.classList.add('hidden');
            document.getElementById('register-form-container').classList.remove('hidden');
        }

        function showLogin() {
            document.getElementById('register-form-container').classList.add('hidden');
            document.getElementById('login-form').parentElement.classList.remove('hidden');
        }
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
