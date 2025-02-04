<?php
include 'dbbloom.php'; // Koneksi ke database
session_start();

// Cek jika tombol logout ditekan dan proses logout dilakukan
if (isset($_GET['logout'])) {
    // Proses logout
    session_unset();
    session_destroy();
    setcookie("user_session", "", time() - 3600, "/");
    header("Location: login.php");  // Redirect setelah logout
    exit();
}

// Jika tidak logout, tampilkan halaman dengan tombol logout
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,initial-scale=1.0">
    <title>The Bloomnest - Tentang Kami</title>
    <link rel="website icon" href="Image/logo.jpg">
</head>
<style>
     body {
        font-family: Arial, sans-serif;
        justify-content: center;
        align-items: center;
        background-color: whitesmoke;
        margin: 0;
        padding: 0;
    }

    .njir {
        cursor: pointer;
        width: 30px;
        height: auto;
        margin-left: -10px;
    }

    * {
        box-sizing: border-box;
    }

    li, a, button {
        font-family: "Montserrat, sans-serif";
        font-weight: 500;
        font-size: 16px;
        color: black;
        text-decoration: none;
        font-family: sans-serif;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px 10%;
        background-color: #EFF3EA;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo {
        cursor: pointer;
        width: 50px;
        height: auto;
        margin-left: -10px;
        border-radius: 30px;
    }

    .nav {
        position: relative;
    }

    .nav_links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        font-family: sans-serif;
    }

    .nav_links > li {
        position: relative;
        margin-right: 20px; /* Adjust spacing as needed */
    }

    .nav_links a {
        text-decoration: none;
        padding: 10px;
        display: block;
    }

    .dropdown {
        display: none; /* Hide dropdown by default */
        position: absolute;
        top: 100%; /* Position below the parent */
        left: 0;
        background-color: rgb(255, 255, 255); /* Background color for dropdown */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Optional shadow */
        z-index: 1000; /* Ensure dropdown is above other elements */
        padding: 10px 0; /* Add padding for better spacing */
    }

    .dropdown ul {
        list-style: none; /* Removes bullet points */
        margin: 0; /* Removes extra spacing */
        padding: 0; /* Removes extra padding */
    }

    .nav_links li:hover .dropdown {
        display: block; /* Show dropdown on hover */
    }

    .dropdown li {
        white-space: nowrap; /* Prevent text wrapping */
        display: flex;
    }

    .dropdown a {
        padding: 10px 20px; /* Adjust padding for dropdown items */
        color: rgb(0, 0, 0); /* Text color for dropdown items */
        text-decoration: none;
    }

    .dropdown a:hover {
        background-color: #f0f0f0; /* Change background on hover */
    }

    .nav_links .ikan::before{
    content: '';
    position: absolute;
    top: 75%;
    left: 0;
    width: 0;
    height: 2px;    
    background: black;
    transition: .3s;
}

.nav_links .ikan:hover::before {
    width: 100%;
    box-shadow: 0 0 5px #ccc;
}

    .header {
        text-align: center;
        padding: 20px 0;
        background-color: #fff;
    }

    .header h1 {
        margin: 0;
        font-size: 2em;
        color: #333;
    }

    .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    text-decoration: none;
    margin-top: 10px;
    text-align: center;
}
.btn:hover {
    background-color: #0056b3;
}

/* Tombol Log Out */
.btn-logout {
    background-color: black; /* Warna merah */
    color: #fff; /* Teks putih */
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    position: absolute; /* Agar posisinya di kanan */
    right: 20px; /* Jarak dari kanan */
    top: 9%; /* Posisi vertikal */
    transform: translateY(-50%); /* Tengah secara vertikal */
}

.btn-logout:hover {
    background-color: #333; /* Warna saat hover */
}

body {
            font-family:sans-serif;
            background-color: #ffffff;
            color: #000000;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .content {
            flex: 1;
            padding-right: 50px;
        }
        .image {
            flex: 1;
            text-align: right;
        }
        .image img {
            max-width: 80%;
            height: auto;
            border-radius: 10px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            position: relative;
        }
        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 4px;
            background-color: #000;
        }
        .mission {
            background-color: #f4f4f4;
            padding: 40px 0;
            margin-top: 30px;
        }
</style>
<body>
    <header>
        <img class="logo" src="Image/logo.jpg" alt="logo">
        <nav>
            <ul class="nav_links">
                <li>
                    <a href="blooming.php" class="ikan">Home</a>
                </li>
                <li>
                    <a href="#" class="ikan">Category</a>
                    <ul class="dropdown">
                        <li><a href="buketbunga.php">Buket Bunga</a></li>
                        <li><a href="hantaran.php">Hantaran</a></li>
                        <li><a href="towersnack.php">Snack Tower</a></li>
                    </ul>
                </li>
                <li><a href="about.php" class="ikan">About</a></li>
            </ul>
        </nav>
        <a href="login.html" class="btn-logout" onclick="logoutUser()">Logout</a>
        <a href="https://www.instagram.com/diandrahandycraft?igsh=ZG9mcnpiMWNtanpl">
            <img src="Image/instagram.png" alt="wa" class="njir">
        </a>
    </header>

    <div class="container">
        <div class="content">
            <h1>Tentang The Bloomnest</h1>
            <p>The Bloomnest adalah rumah kreativitas yang didedikasikan untuk menghadirkan keindahan melalui buket bunga dan kerajinan tangan yang penuh makna. Kami percaya setiap produk memiliki cerita unik yang menginspirasi.</p>
            <p>Dengan dedikasi pada kualitas dan detail, kami menghadirkan karya-karya yang tidak sekadar indah, namun juga bermakna. Setiap buket dan kerajinan kami dibuat dengan cinta dan ketelatenan.</p>
        </div>
        <div class="image">
            <img src="Image/bloomnest.jpg" alt="The Bloomnest Workshop">
        </div>
    </div>

    <div class="mission">
        <div class="container">
            <div class="content">
                <h2 style="text-align: center;">Misi kami</h2>
                <p style="text-align: center;">
                    Memberikan Layanan Terbaik
                    Mengutamakan kepuasan pelanggan dengan menyediakan layanan yang ramah, cepat, dan personal sesuai kebutuhan dan preferensi pelanggan.
                    
                    Mendukung Momen Berharga
                    Berkomitmen untuk menjadi bagian dari setiap momen spesial pelanggan, seperti pernikahan, ulang tahun, hingga acara formal dan informal lainnya, melalui produk yang dirancang dengan penuh cinta dan ketelitian.
                    
                    Mendorong Kreativitas Lokal
                    Memanfaatkan bahan-bahan lokal dan memberdayakan komunitas kreatif di sekitar untuk menghasilkan produk yang berkelas dan berdaya saing.
                    
                    Berinovasi Secara Berkelanjutan
                    Terus menciptakan konsep baru dan inovasi dalam desain produk untuk mengikuti tren dan kebutuhan pelanggan yang terus berkembang.</p>
            </div>
        </div>
    </div>
</body>
</html>