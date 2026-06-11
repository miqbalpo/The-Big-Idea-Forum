<nav id="mainNavbar" class="navbar-tbif">
  <div class="navbar-tbif__inner">

    <!-- Desktop Nav Links -->
    <ul class="navbar-tbif__links" id="navLinks">
      
        <a href="#" class="navbar-tbif__brand">
            <img src="{{ asset('uploads/assets/Logo-tbif.png') }}" alt="TBIF Logo" class="navbar-tbif__logo">
        </a>
      <li class="dropdown">
        <a href="#" class="nav-link-tbif">
          About <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#aboutCNN" class="nav-link-tbif" data-section="aboutCNN">About CNN Indonesia</a></li>
          <li><a href="#aboutTBIF" class="nav-link-tbif" data-section="aboutTBIF">About TBIF</a></li>
        </ul>
      </li>
      <li><a href="#moderator" class="nav-link-tbif" data-section="moderator">Moderator</a></li>
      <li><a href="#RestorativeEconomy" class="nav-link-tbif" data-section="RestorativeEconomy">Terms of Ref</a></li>
      <li class="dropdown">
        <a href="#" class="nav-link-tbif">
          Ecosystem <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#CNNIndonesiaUniverse" class="nav-link-tbif" data-section="CNNIndonesiaUniverse">CNN Universe</a></li>
          <li><a href="#TransmediaEcosystem" class="nav-link-tbif" data-section="TransmediaEcosystem">Ecosystem</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link-tbif">
          Success Story <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#OurSuccessStory" class="nav-link-tbif" data-section="OurSuccessStory">Gallery</a></li>
          <li><a href="#Topics" class="nav-link-tbif" data-section="Topics">Videos</a></li>
        </ul>
      </li>
      <li><a href="#Contact" class="nav-link-tbif" data-section="Contact">Contact</a></li>
    </ul>

    <!-- Hamburger Button (Mobile) -->
    <button class="navbar-tbif__hamburger" id="hamburgerBtn" aria-label="Toggle menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>

  <!-- Mobile Dropdown Menu -->
  <div class="navbar-tbif__mobile-menu" id="mobileMenu">
    <ul>
      <li><a href="#aboutCNN" class="mobile-link">01 — About CNN Indonesia</a></li>
      <li><a href="#aboutTBIF" class="mobile-link">02 — About TBIF</a></li>
      <li><a href="#Forum" class="mobile-link">03 — Why Join The Forum</a></li>
      <li><a href="#moderator" class="mobile-link">04 — Moderator</a></li>
      <li><a href="#RestorativeEconomy" class="mobile-link">05 — Terms of Reference</a></li>
      <li><a href="#CNNIndonesiaUniverse" class="mobile-link">07 — CNN Universe</a></li>
      <li><a href="#TransmediaEcosystem" class="mobile-link">08 — Ecosystem</a></li>
      <li><a href="#OurSuccessStory" class="mobile-link">09 — Success Story</a></li>
      <li><a href="#Topics" class="mobile-link">10 — Video Highlights</a></li>
      <li><a href="#Contact" class="mobile-link">11 — Contact</a></li>
    </ul>
  </div>
</nav>

<!-- Spacer agar konten tidak tertutup navbar -->
<div style="height: 64px;"></div>

<style>

.dropdown.active > .nav-link-tbif {
  background: #cc1417;
  border-color: #cc1417;
  color: #fff;
}

.dropdown-menu {
  display: none;
  position: absolute;
  background: rgba(20,20,20,0.7);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 8px 0;
  margin-top: 8px;
  min-width: 220px;
}

.dropdown.active .dropdown-menu {
  display: block;
}

.dropdown-menu a {
  display: block;
  padding: 10px 16px;
  color: white;
}

.dropdown-menu a:hover {
  background: #cc1417;
}

  /* ===== NAVBAR BASE ===== */
  .navbar-tbif {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  background: transparent; /* ini yang penting */
  backdrop-filter: none;   /* hapus blur */
  -webkit-backdrop-filter: none;
  border-bottom:  2px solid rgba(255,255,255,0.4);     /* opsional, kalau mau bersih total */
}

  /* Saat di-scroll → jadi lebih gelap */
  .navbar-tbif.scrolled {
    background: rgba(8, 8, 8, 0.6);
    box-shadow: 0 4px 30px rgba(204, 20, 23, 0.2);
  }

  .navbar-tbif__inner {
    max-width: 1280px;
    margin: 0 auto;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 24px;
  }

  /* ===== LOGO ===== */
  

  .navbar-tbif__logo {
    height: 70px;
  width: auto;
    filter: brightness(1.1);
    transition: transform 0.2s ease;
    margin-right: 100px;
  }

  .navbar-tbif__logo:hover {
    transform: scale(1.05);
  }

  /* ===== DESKTOP LINKS ===== */
  .navbar-tbif__links {
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: flex-start; /* tambah ini */
  gap: 30px; /* atur jarak antar menu */
  margin: 0;
  padding: 0;
  width: 100%;
}

  .nav-link-tbif {
    text-decoration: none;
    color: white;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    padding: 6px 12px;
    border-radius: 50px;
    border: 1px solid transparent;
    transition: all 0.25s ease;
    white-space: nowrap;
    font-family: 'Merriweather', sans-serif;
  }

  .nav-link-tbif:hover,
  .nav-link-tbif.active {
    color: #fff;
    border-color: #cc1417;
    background: rgba(204, 20, 23, 0.15);
  }

  .nav-link-tbif.active {
    background: #cc1417;
    border-color: #cc1417;
    color: #fff;
  }

  /* ===== HAMBURGER ===== */
  .navbar-tbif__hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
    border-radius: 6px;
    transition: background 0.2s;
  }

  .navbar-tbif__hamburger:hover {
    background: rgba(255,255,255,0.08);
  }

  .navbar-tbif__hamburger span {
    display: block;
    width: 24px;
    height: 2px;
    background: #fff;
    border-radius: 2px;
    transition: all 0.3s ease;
    transform-origin: center;
  }

  /* Hamburger animasi jadi X */
  .navbar-tbif__hamburger.open span:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
  }
  .navbar-tbif__hamburger.open span:nth-child(2) {
    opacity: 0;
    transform: scaleX(0);
  }
  .navbar-tbif__hamburger.open span:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
  }

  /* ===== MOBILE MENU ===== */
  .navbar-tbif__mobile-menu {
    display: none;
    background: rgba(10, 10, 10, 0.97);
    border-top: 1px solid rgba(204, 20, 23, 0.3);
    padding: 0;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, padding 0.3s ease;
  }

  .navbar-tbif__mobile-menu.open {
    max-height: 600px;
    padding: 12px 0 20px;
  }

  .navbar-tbif__mobile-menu ul {
    list-style: none;
    margin: 0;
    padding: 0 20px;
  }

  .navbar-tbif__mobile-menu li {
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }

  .mobile-link {
    display: block;
    padding: 14px 4px;
    color: rgba(255,255,255,0.75);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    letter-spacing: 0.02em;
    font-family: 'Poppins', sans-serif;
    transition: color 0.2s, padding-left 0.2s;
  }

  .mobile-link:hover {
    color: #cc1417;
    padding-left: 12px;
  }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 992px) {
    .navbar-tbif__links {
      display: none;
    }

    .navbar-tbif__hamburger {
      display: flex;
    }

    .navbar-tbif__mobile-menu {
      display: block;
    }
  }

  @media (max-width: 480px) {
    .navbar-tbif__inner {
      padding: 0 16px;
    }
  }
</style>

<script>
  (function () {
    const navbar    = document.getElementById('mainNavbar');
    const hamburger = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileLinks = document.querySelectorAll('.mobile-link');
    const navLinks  = document.querySelectorAll('.nav-link-tbif');

    // ─── Scroll: tambahkan class "scrolled" ───────────────────────────────
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 30);
      highlightActiveSection();
    });

    // ─── Hamburger toggle ────────────────────────────────────────────────
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('open');
      mobileMenu.classList.toggle('open');
    });

    // ─── Tutup mobile menu saat link diklik ──────────────────────────────
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('open');
        mobileMenu.classList.remove('open');
      });
    });

    // ─── Smooth scroll untuk semua link navbar ───────────────────────────
    document.querySelectorAll('.nav-link-tbif, .mobile-link').forEach(link => {
      link.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href && href.startsWith('#')) {
          const target = document.querySelector(href);
          if (target) {
            e.preventDefault();
            const offset = 70; // tinggi navbar
            const top = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top, behavior: 'smooth' });
          }
        }
      });
    });

    // ─── Active link saat scroll ──────────────────────────────────────────
    function highlightActiveSection() {
      let currentSection = null;

      document.querySelectorAll("section[id]").forEach(section => {
        const rect = section.getBoundingClientRect();

        // Section dianggap aktif kalau melewati 30% layar atas
        if (rect.top <= window.innerHeight * 0.3 &&
            rect.bottom >= window.innerHeight * 0.3) {
          currentSection = section.id;
        }
      });

        navLinks.forEach(link => {
        link.classList.remove("active");

        if (link.dataset.section === currentSection) {
          link.classList.add("active");
        }
      });

      const dropdown = document.querySelector(".dropdown");
      const dropdownBtn = dropdown.querySelector(".nav-link-tbif");
      const ecosystemBtn = document.querySelectorAll(".dropdown")[1].querySelector(".nav-link-tbif");

      if(currentSection === "CNNIndonesiaUniverse" || currentSection === "TransmediaEcosystem"){
        ecosystemBtn.classList.add("active");
      }else{
        ecosystemBtn.classList.remove("active");
      }

      const successBtn = document.querySelectorAll(".dropdown")[2].querySelector(".nav-link-tbif");

      if(currentSection === "OurSuccessStory" || currentSection === "Topics"){
        successBtn.classList.add("active");
      }else{
        successBtn.classList.remove("active");
      }

      if(currentSection === "aboutCNN" || currentSection === "aboutTBIF"){
        dropdownBtn.classList.add("active");
      }else{
        dropdownBtn.classList.remove("active");
      }
    }

highlightActiveSection();
  })();

const dropdowns = document.querySelectorAll(".dropdown");

dropdowns.forEach(dropdown => {

  const dropdownBtn = dropdown.querySelector(".nav-link-tbif");
  const dropdownLinks = dropdown.querySelectorAll(".dropdown-menu a");

  let timeout;

  // CLICK
  dropdownBtn.addEventListener("click", function(e){
    e.preventDefault();

    dropdowns.forEach(d => {
      if(d !== dropdown){
        d.classList.remove("active");
      }
    });

    dropdown.classList.toggle("active");
  });

  // HOVER OPEN
  dropdown.addEventListener("mouseenter", () => {
    if(window.innerWidth > 992){
      clearTimeout(timeout);

      dropdowns.forEach(d => {
        if(d !== dropdown){
          d.classList.remove("active");
        }
      });

      dropdown.classList.add("active");
    }
  });

  // HOVER CLOSE (pakai delay)
  dropdown.addEventListener("mouseleave", () => {
    if(window.innerWidth > 992){
      timeout = setTimeout(() => {
        dropdown.classList.remove("active");
      }, 200); // delay 200ms
    }
  });

  // Klik submenu
  dropdownLinks.forEach(link => {
    link.addEventListener("click", () => {
      dropdown.classList.remove("active");
    });
  });

});
</script>