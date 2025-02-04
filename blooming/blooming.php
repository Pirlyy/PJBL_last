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
    <title>Bloomnest</title>
    <link rel="website icon" href="Image/logo.jpg">
    <link rel="stylesheet" href="boom.css">
</head>
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
        <a href="login.php" class="btn-logout" onclick="logoutUser()">Logout</a>
        <a href="https://www.instagram.com/diandrahandycraft?igsh=ZG9mcnpiMWNtanpl">
            <img src="Image/instagram.png" alt="wa" class="njir">
        </a>
    </header>
    
    <div>
        <h1 class="catalog">BEST SELLER PRODUCT!!!</h1>
    </div>

    <!-- Slider Section -->
    <div class="slider">
        <div class="slides">
            <img src="Image/slide 1.jpg" alt="Slide 1">
            <img src="Image/slide 2.jpg" alt="Slide 2">
            <img src="Image/slide 3.jpg" alt="Slide 3">
            <img src="Image/slide 4.jpg" alt="Slide 4">
        </div>
        <div class="dots">
            <button class="active" onclick="setSlide(0)"></button>
            <button onclick="setSlide(1)"></button>
            <button onclick="setSlide(2)"></button>
            <button onclick="setSlide(3)"></button>
        </div>
    </div>

    <div class="gomen">
        <img src="Image/gesture.png" alt="halo" class="halo">
        <h1 class="terserah">Selamat Datang!</h1>
        <p class="terserah">"Ingin memberikan sentuhan spesial pada momen Anda? The Bloomnest hadir dengan buket bunga elegan, hantaran yang penuh makna, dan tower snack yang menggoda selera.
            Ciptakan momen tak terlupakan dengan produk handmade berkualitas dari kami."</p>
    </div>

    <div class="knp">
        <img src="Image/person.png" alt="hmm?" class="hmm">
        <h1 class="terserah">Kenapa Harus Memilih Kami?</h1>
        <p class="terserah">"Karena produk kita nggak cuma cantik, tapi juga penuh makna! Buket bunga, hantaran, atau snack tower yang kamu pesan, pasti bakal jadi hadiah paling berkesan. Kita pakai bahan terbaik dan desain yang selalu fresh, jadi siap-siap bikin momen spesial kamu jadi lebih istimewa!"</p>
    </div>

    <div class="feedback">
        <img src="Image/review.png" alt="3" class="review">
        <h1 class="terserah">Menurut Mereka</h1>
    </div>

    <div class="komen">
        <div class="comment">
            <div class="comment-header">
                <div class="avatar">
                    <img src="Image/yotsuba.jpeg" alt="Avatar">
                </div>
                <div class="comment-author">
                    <span>Nakano Yotsuba</span>
                    <span class="comment-date">2 Hari yang lalu</span>
                </div>
            </div>
            <p class="comment-text">Produk ini sangat berkualitas! Saya sangat puas dengan pelayanan dan kemasannya.</p>
        </div>
        <div class="comment">
            <div class="comment-header">
                <div class="avatar">
                    <img src="Image/anna.jpeg" alt="Avatar">
                </div>
                <div class="comment-author">
                    <span>Anna Yamada</span>
                    <span class="comment-date">2 Hari yang lalu</span>
                </div>
            </div>
            <p class="comment-text">Terimakasih The bloomnest,Produk nya sangat berkualitas dan indah</p>
        </div>
        <div class="comment">
            <div class="comment-header">
                <div class="avatar">
                    <img src="Image/ryo (1).jpeg" alt="Avatar">
                </div>
                <div class="comment-author">
                    <span>Ryo Yamada</span>
                    <span class="comment-date">2 Hari yang lalu</span>
                </div>
            </div>
            <p class="comment-text">Berkat Buket Bunga yang kubeli dari the bloomnest membuat moment valentine saya dengan cowok saya (firr) menjadi semakin romantis</p>
        </div>
    </div>
    

<div class="scroll-to-top" id="scrollToTop">
    ↑
</div>


    <!-- Slider JavaScript -->
    <script>
        const slides = document.querySelector('.slides');
        const dots = document.querySelectorAll('.dots button');
        let index = 0;

        function autoSlide() {
            index = (index + 1) % dots.length;
            updateSlider();
        }

        let interval = setInterval(autoSlide, 3000);

        function updateSlider() {
            slides.style.transform = `translateX(${-index * 100}%)`;
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');
        }

        function setSlide(slideIndex) {
            index = slideIndex;
            updateSlider();
            clearInterval(interval);
            interval = setInterval(autoSlide, 3000);
        }

        function toggle(event, title = '', description = '', imageSrc = '') {
            // Prevent default link behavior
            event.preventDefault();

            // Toggle blur effect on other elements
            const blurElements = document.querySelectorAll('.card_container, header, .slider');
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
// Function to show the access denied modal
function showAccessDeniedModal() {
    document.getElementById('accessDeniedModal').style.display = 'block';
}

// Function to hide the access denied modal
function hideAccessDeniedModal() {
    document.getElementById('accessDeniedModal').style.display = 'none';
}

// On page load, check for accessibility setting
window.onload = function() {
    const accessibilitySetting = localStorage.getItem('accessibility') || 'enabled';

    // Jika accessibility disabled, tampilkan modal
    if (accessibilitySetting === 'disabled') {
        showAccessDeniedModal();

        // Periksa apakah elemen dengan id "content" ada sebelum mengaksesnya
        const contentElement = document.getElementById('content');
        if (contentElement) {
            contentElement.style.display = 'none';
        }
    }
};

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate");
            }else{
                entry.target.classList.remove("animate");
            }
        });
    },
    {threshold: 0.5}
);

const elements = document.querySelectorAll('.terserah, .halo, .hmm, .review, .komen');
elements.forEach((el) => observer.observe(el));


// Ambil elemen tombol
const scrollToTopButton = document.getElementById("scrollToTop");

// Tampilkan tombol saat scroll melebihi 100px
window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
        scrollToTopButton.classList.add("show");
    } else {
        scrollToTopButton.classList.remove("show");
    }
});

// Fungsi untuk scroll kembali ke atas
scrollToTopButton.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

</script>
</body>
</html>


