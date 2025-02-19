<?php
include 'dbbloom.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password
    $isAdult = isset($_POST['isAdult']) ? 1 : 0;

    // Cek apakah username atau email sudah ada
    $checkUser = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $checkUser->bind_param("ss", $username, $email);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        echo "Username atau Email sudah terdaftar!";
    } else {
        // Jika username/email belum ada, masukkan ke database
        $insertUser = $conn->prepare("INSERT INTO users (nama_lengkap, username, email, password, isAdult) VALUES (?, ?, ?, ?, ?)");
        $insertUser->bind_param("ssssi", $nama_lengkap, $username, $email, $password, $isAdult);

        if ($insertUser->execute()) {
            echo "Pendaftaran berhasil! Silakan login.";
            header("Location: blooming.php"); // Redirect ke halaman login
            exit();
        } else {
            echo "Terjadi kesalahan: " . $conn->error;
        }
    }

    if (!$insertUser->execute()) {
        echo "Error: " . $conn->error;
    }
    
    $checkUser->close();
    $insertUser->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="website icon" type="png" href="yess.png">
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wgth@300;400;500;600;700;800;900&display=swap");

*{
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
    color: #fff;
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

.wrapper .remember-forgot{
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}

.remember-forgot label input {
    accent-color: #fff;
    margin-right: 3px;

}

.remember-forgot a{
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
}

.wrapper .register-link{
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
<body>
    
    <div class="wrapper" name="myform">
        <form action="register.php" method="POST">
            <h1>Sign Up</h1>
            <div class="input-box">
                <input type="text" name="fullName" placeholder="Full name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required minlength="3" maxlength="12">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxl-gmail'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
        
            <div class="remember-forgot">
                <label><input type="checkbox" id="isAdult">I am more than 17 years old</label>
            </div>
        
            <button type="submit" class="btn">Sign up</button>
        
            <div class="register-link">
                <p>Already have an account? <a href="login.html">Login</a></p>
            </div>
        </form>        
    </div>
    <script>
        function validateform() {
            let x  = document.forms["myform"]
            ["Username"].value;
              if (x=="") {
                alert ("Name Must be filled out");
                return false;
              }
        }

        function validateform() {
            let x  = document.forms["myform"]
            ["Password"].value;
              if (x=="") {
                alert ("Password Must be filled out");
                return false;
              }
        }

        function validateform() {
            let x  = document.forms["myform"]
            ["Email"].value;
              if (x=="") {
                alert ("Password Must be filled out");
                return false;
              }
        }

        function validateform() {
            let x  = document.forms["myform"]
            ["Full name"].value;
              if (x=="") {
                alert ("Password Must be filled out");
                return false;
              }
        }
          // Fungsi untuk menyimpan data ke localStorage
          function saveToLocalStorage(event) {
            event.preventDefault();

            // Ambil nilai dari input
            const fullName = document.getElementById('fullName').value;
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const isAdult = document.getElementById('isAdult').checked;

            // Simpan ke localStorage sebagai JSON
            const userData = {
                fullName: fullName,
                username: username,
                email: email,
                password: password,
                isAdult: isAdult
            };

            localStorage.setItem('userData', JSON.stringify(userData));
            window.location.href = 'login.html'; // Arahkan ke halaman login
        }
    </script>
</body>
</html>