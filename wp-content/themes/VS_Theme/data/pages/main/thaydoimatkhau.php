<?php
if(isset($_POST['thaydoimatkhau'])){
        echo"{$_SESSION['email']} thanfh coogn";
        // $username = $_POST['username'];
        $password = md5($_POST['password']);
        $new_password = md5($_POST['new_password']);
        if ($password != $new_password) {
            echo"<script>alert ('Mật khẩu không khớp nhau') </script>";
        }
        else {
            $sql = "SELECT * FROM tbl_dangky WHERE email='".$_SESSION['email']."' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_assoc($result);
            $sql_update = "UPDATE tbl_dangky SET matkhau='".$password."' WHERE email ='".$_SESSION['email']."' ";
            $result = mysqli_query($conn, $sql_update);
            // header("Location: index.php");
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
        <h2>Đổi mật khẩu</h2>
        <form method="POST" id="login-form">
            <input type="password" placeholder="Mật khẩu mới" name="password" required>
            <input type="password" placeholder="Nhập lại mật khẩu" name="new_password" required>
            <input type="submit" value="Đổi mật khẩu" name="thaydoimatkhau">
        </form>
    </div>
</div>
</body>
</html>
