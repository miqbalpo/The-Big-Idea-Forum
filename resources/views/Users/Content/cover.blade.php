<section class="hero-section" id="hero">
    <div class="hero-bg">
        <img src="{{ asset('uploads/image/backgroundHome2.jpeg') }}" class="bg-img active">
        <img src="{{ asset('uploads/image/backgroundHome3.jpeg') }}" class="bg-img">
        <img src="{{ asset('uploads/image/backgroundHome4.jpeg') }}" class="bg-img">
        <img src="{{ asset('uploads/image/backgroundHome5.jpeg') }}" class="bg-img">
        <img src="{{ asset('uploads/image/backgroundHome6.jpeg') }}" class="bg-img">
        <img src="{{ asset('uploads/image/backgroundHome7.jpeg') }}" class="bg-img">
        <img src="{{ asset('uploads/image/backgroundHome8.jpeg') }}" class="bg-img">
        <img src="{{ asset('uploads/image/backgroundHome9.jpeg') }}" class="bg-img">
    </div>

    <div class="overlay"></div>

    <div class="container hero-content">
    <div class="text-content">
        <h1>THE BIG IDEA FORUM</h1>
        <p>#BRINGINGGREATMINDSTOGETHER</p>
    </div>
    </div>
</section>

<style>
.hero-section {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center; /* dorong konten ke kanan */
    z-index: 1;
    transition: opacity 0.3s ease-out;
}

.hero-bg {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.bg-img {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transform: scale(1.1);
    transition: opacity 2s ease-in-out, transform 6s ease-in-out;
}

.bg-img.active {
    opacity: 1;
    transform: scale(1);
}
.hero-content .navbar-tbif__logo {
    height: 450px; /* responsif & tetap besar */
    width: auto;
}
.overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background: rgba(0, 0, 0, 0.4);
}

.hero-content {
    position: absolute;   /* keluar dari batas container */
    right: 2%;            /* atur jarak dari kanan */
    z-index: 3;
}

.text-content h1 {
    font-size: 3.5rem;
    font-weight: 800;
}

.text-content p {
    font-size: 1.5rem;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // SLIDESHOW
    const images = document.querySelectorAll(".bg-img");
    let current = 0;

    function changeImage() {
        images[current].classList.remove("active");
        current = (current + 1) % images.length;
        images[current].classList.add("active");
    }

    setInterval(changeImage, 6000);


    // SCROLL ANIMATION
    const hero = document.getElementById("hero");
    const heroContent = document.querySelector(".hero-content");

    window.addEventListener("scroll", function() {
        let scroll = window.scrollY;
        let height = window.innerHeight;

        let progress = scroll / height;

        if (progress <= 1) {
            hero.style.opacity = 1 - progress;
            heroContent.style.transform = "translateY(" + (scroll * 0.3) + "px)";
            heroContent.style.opacity = 1 - progress;
        }
    });

});
</script>