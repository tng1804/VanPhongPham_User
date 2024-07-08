<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel ="stylesheet" href ="admin/style.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-control {
            margin-bottom: 15px;
            position: relative;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #0056b3;
        }

        .signup-link {
            margin-top: 20px;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .alert {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    include "session.php";
    ?>
    <div class = "container">
        <form method ="POST">
            <h1>Login Form</h1>
            <div class="form-control ">
                <input name="email" id ="email" type="email" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>
        
            <div class="form-control ">
                <input id="password" name ="password" type="password" placeholder ="Password" >
                <span></span>
                <small></small>
            </div>
            <button type = "submit" name ="btn-submit" class = "btn-submit">Login</button>
            <div class="signup-link">
                Not a member? <a href="createAccout.php">Create Accout</a>
            </div>
        </form>
        <div class="signup-link">
             <a href="quenMK.php">Quên mật khẩu</a>
        </div>
    <?php
        $conn = mysqli_connect("localhost","root","admin","vanphongpham");
        if(!$conn){
            die("Kết nối thất bại");
            exit();
        }
        else{
            if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btn-submit'])){
                $email = $_POST['email'];
                $pass = $_POST['password'];
                if(empty($email) || empty($pass)){
                    echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
                    </script>";
                    return;
                }
                $sql = "SELECT * FROM tbltk WHERE email='".$email."' AND pass ='".$pass."' AND quyen = '1' ";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)<=0){
                    echo  "<script type = 'text/javascript'>alert('Tên tài khoản hoặc mật khẩu khách hàng không đúng.');
                    </script>";
                }
                else{
                    $row = mysqli_fetch_assoc($result);
                    session_start();
                    Session::set('registerlogin',true);
                    Session::set('registername',$row['ten']);
                    // if(Session::get('registerlogin')==true)
                    // $a = Session::get('registername') 
                    

                    echo  "<script type = 'text/javascript'>alert('Đăng nhập Thành công');
                    window.location.href = 'index.php';
                    </script>";
                }
                
            }
        }
    
?>
    </div>
</body>
<script src="admin/app.js"></script>
</html>
