<?php
include 'dbbloom.php'; // Koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="website icon" type="png" href="Image/yess.png">


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('Image/walpaper.jpeg') no-repeat;   
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: black;
            border-radius: 10px;
            padding: 30px 40px; 
        }
        
        .wrapper h1 {
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }
        
        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .wrapper .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
        }
        
        .remember-forgot label input {
            accent-color: #fff;
            margin-right: 3px;
        }

        .remember-forgot a {
            color: #fff;
            text-decoration: none;
        }
        
        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 0 5px #fff;
            transition: 0.5s;
        }
        
        .btn:hover {
            box-shadow: 0 0 5px #fff,
            0 0 25px #fff, 0 0 30px #fff;
        }
        
        .wrapper .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
        
        .register-link p a:hover {
            text-decoration: underline;
        }
        </style>
</head>
<body>
<div class="wrapper">
    <form onsubmit="login(event)" action="blooming.html">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Username" id="username" name="username" required>
            <i class='bx bxs-user'></i> 
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" id="password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <div class="remember-forgot">
            <label><input type="checkbox" id="centang">Remember me</label>
            <a href="forgotpassword.html">Forgot password?</a>
        </div>

        <button type="submit" class="btn" id="tmbl">Sign in</button>

        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
    </form>
</div>

    <script>
function login(event) {
    event.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    if (username === 'admin' && password === 'admin1234') {
        window.location.href = 'admindashboard.html';
        return;
    }
    // Ambil data dari localStorage
    const storedUserData = localStorage.getItem('userData');
    
    if (!storedUserData) {
        alert('Pengguna Tidak dapat ditemukan!');
        return;
    }
    
    const userData = JSON.parse(storedUserData);
    
    // Validasi login
    if (username === userData.username && password === userData.password) {
        window.location.href = 'blooming.php';
    } else {
        alert('Username atau password salah!');
    }
}
    </script>
</body>
</html>
