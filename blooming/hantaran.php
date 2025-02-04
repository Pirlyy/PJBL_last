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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hantaran</title>
  <link rel="website icon" href="Image/yess.png">
</head>
<body>
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
        background-color: white;
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
.container {
    display: flex; /* Mengaktifkan Flexbox */
    flex-wrap: wrap; /* Agar card bisa melanjutkan ke baris berikutnya jika layar tidak cukup lebar */
    justify-content: center; /* Untuk memposisikan card di tengah secara horizontal */
    gap: 20px; /* Jarak antar card */
    padding: 20px; /* Padding di dalam container */
}

.card {
    width: 300px;
    background-color: #f0f0f0;
    border-radius: 6px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    margin: 15px; /* Bisa dihapus jika menggunakan `gap` di Flexbox */
    display: flex;
    flex-direction: column; /* Untuk memastikan konten di dalam card tetap vertikal */
}

.card img {
    width: 100%;
    height: auto;
}

.card_content {
    text-align: center;
     margin-bottom: 6px;
}

.card_content .btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: #333;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 16px;
    color: #fff;
}

#popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px; /* Lebar lebih kecil */
    padding: 20px; /* Padding tetap untuk kenyamanan */
    background: #fff;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2); /* Bayangan lebih lembut */
    border-radius: 8px; /* Sudut lembut */
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 1000;
    max-height: 100vh;
    overflow-y: auto;
}

/* Ketika popup aktif */
#popup.active {
    visibility: visible;
    opacity: 1;
    width: 280px; /* Tetap kecil saat aktif */
    padding: 20px;
}


/* Gaya untuk gambar */
#popup img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Judul */
#popup h2 {
    font-size: 1.5em;
    color: #333;
    margin-bottom: 10px;
}

/* Paragraf */
#popup p {
    font-size: 1em;
    line-height: 1.6;
    color: #666;
    margin-bottom: 20px;
}

/* Tombol tutup */
#popup .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.popup .btn:hover {
    background-color: #555;
}

/* Efek Blur */
.blur {
    filter: blur(5px);
}

/* Responsif untuk layar kecil */
@media (max-width: 768px) {
    .popup {
        width: 90%;
    }

    .popup h2 {
        font-size: 1.2em;
    }

    .popup p {
        font-size: 0.9em;
    }
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
                <li><a href="about." class="ikan">About</a></li>
            </ul>
        </nav>
        <a href="login.html" class="btn-logout" onclick="logoutUser()">Logout</a>
        <a href="https://www.instagram.com/diandrahandycraft?igsh=ZG9mcnpiMWNtanpl">
            <img src="Image/instagram.png" alt="wa" class="njir">
        </a>
    </header>
  <div class="container">
    <div class="card">
      <img src="Image/hantaran.jpg" alt="Snack Tower">
      <h3 class="card_content">Hantaran Kelahiran</h3>
      <p class="card_content">IDR 55.000,00</p>
      <a href="#" class="btn" onclick="toggle(event,'Hantaran Kelahiran','Hantaran yang cocok buat kasih ke tetangga atau keluarga terdekat kalian yang baru saja memiliki anak', 'Image/hantaran.jpg')">See More</a>
      <a href="https://Wa.me/62895609991349" class="btn">Order</a>
    </div>
    <div class="card">
      <img src="Image/hantaran2.jpg" alt="Snack Tower">
      <h3 class="card_content">Hantaran Kecantikan</h3>
      <p class="card_content">IDR 58.000,00</p>
      <a href="#" class="btn" onclick="toggle(event, 'Hantaran Kecantikan','Buket Indah nan keren cocok untuk kado ultah', 'Image/hantaran2.jpg')">See More</a>
      <a href="https://Wa.me/62895609991349" class="btn">Order</a>
    </div>
    <div class="card">
      <img src="Image/hantaran3.jpg" alt="Snack Tower">
      <h3 class="card_content">Hantaran rumah tangga</h3>
      <p class="card_content">IDR 52.000,00</p>
      <a href="#" class="btn" onclick="toggle(event, 'Hantaran Rumah Tangga','Hantaran yang cocok untuk pasutri yang baru saja menikah', 'Image/hantaran3.jpg')">See More</a>
      <a href="https://Wa.me/62895609991349" class="btn">Order</a>
    </div>
    <div class="card">
      <img src="Image/hantaran4.jpg" alt="Snack Tower">
      <h3 class="card_content">Hantaran Kosmetik</h3>
      <p class="card_content">IDR 62.000,00</p>
      <a href="#" class="btn" onclick="toggle(event, 'Hantaran Kosmetik','Hantaran yang cocok untuk kasih ke ibu kalian', 'Image/hantaran4.jpg')">See More</a>
      <a href="https://Wa.me/62895609991349" class="btn">Order</a>
    </div>
    <div class="card">
      <img src="Image/hantaran5.jpg" alt="Snack Tower">
      <h3 class="card_content">Hantaran Nikah</h3>
      <p class="card_content">IDR 70.000,00</p>
      <a href="#" class="btn" onclick="toggle(event, 'Hantaran Nikah','Hantaran Yang cocok nih kalian kasih ke tmen yang lagi nikahan biar mereka makin romantis', 'Image/hantaran5.jpg')">See More</a>
      <a href="https://Wa.me/62895609991349" class="btn">Order</a>
    </div>
    <div class="card">
      <img src="Image/hantaran6.jpg" alt="Snack Tower">
      <h3 class="card_content">Hantaran Kebersihan</h3>
      <p class="card_content">IDR 58.000 </p>
      <a href="#" class="btn" onclick="toggle(event, 'Hantaran Kebersihan','Hantaran yang cocok untuk kalian kasih ke temen kalian yang jarang mandi nih wkwwk bercanda,kalian dapat memberikan nya sebagai ucapan selamat atas menikahnya/kelahiran anak dari teman/keluarga kalian', 'Image/hantaran6.jpg')">See More</a>
      <a href="https://Wa.me/62895609991349" class="btn">Order</a>
    </div>
  </div>

  <div id="popup">
    <img id="popup-image" src="" alt="Product Image ">
    <h2 id="popup-title"></h2>
    <p id="popup-description"></p>
    <a href="#" class="btn" onclick="toggle(event)">Close</a>
</div>
<script>
    function toggle(event, title = '', description = '', imageSrc = '') {
        // Prevent default link behavior
        event.preventDefault();

        // Toggle blur effect on other elements
        const blurElements = document.querySelectorAll('.container ,header');
        blurElements.forEach(el => el.classList.toggle('blur'));

        // Update popup content
        const popup = document.getElementById('popup');
        const popupTitle = document.getElementById('popup-title');
        const popupDescription = document.getElementById('popup-description');
        const popupImage = document.getElementById('popup-image');

        if (title) {
            popupTitle.textContent = title;
            popupDescription.textContent = description;
            popupImage.src = imageSrc;
        }

        // Toggle popup visibility
        popup.classList.toggle('active');
    }
</script>
</body>
</html>