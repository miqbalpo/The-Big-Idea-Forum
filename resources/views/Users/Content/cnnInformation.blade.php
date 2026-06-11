<div style="margin-top:100vh; position:relative; z-index:2; background:white;">
  <section 
      id="aboutCNN" class="text-body bg-white position-relative overflow-hidden d-flex align-items-center justify-content-center"
  >
    <div class="container text-center fade-up">
      <h2 class="fw-bold mt-5 fade-up text-muted">CNN INDONESIA</h2>

      <!-- Bagian Teks -->
      <div class="row justify-content-center fade-up">
        <div class="text-start">
          <p class="lead mt-3" style="text-align: center; color: #a9aeb3ff;">
            CNN Indonesia officially arrived in Indonesia on October 20, 2014, as part of the large Transmedia family. 
            CNN Indonesia started its appearance through the news portal 
            <strong>CNNIndonesia.com</strong>. Followed by the presence of CNN Indonesia TV on August 17, 2015. 
            As part of <strong>CNN International</strong>, CNN Indonesia is expected to be present as a window to the world 
            to see Indonesia and Indonesian eyes to see the world.
          </p>
        </div>
      </div>

      <!-- Lottie Animasi (dipusatkan di bawah teks) -->
      <div class="d-flex justify-content-center fade-up">
        <lottie-player 
          src="{{ asset('uploads/assets/IndonesiaMap.json') }}" 
          background="transparent"  
          speed="1"  
          style="width: 100%; max-width: 900px; height: auto;"  
          loop  
          autoplay>
        </lottie-player>
      </div>
    </div>
  </section>

  <section id="aboutTBIF"  class="text-body bg-white" style="min-height: 100vh; position: relative;">
    <div class="container pb-5">
      <div class="row align-items-center mb-5 fade-right">
        <div class="col-lg-4 px-5 text-center fade-left">
          <img src="{{ asset('uploads/assets/Logo-tbif.png') }}" 
              alt="TBIF Logo" class="img-fluid rounded-3"
                style="border-radius: 20px;">
        </div>
        <div class="col-lg-8 fade-right">
          <h2 class="fw-bold text-muted" style="font-size: 40px;">What is</h2>
          <h2 class="fw-bold text-warning mb-3" style="font-size: 40px;">THE BIG IDEA FORUM</h2>
          <p class="lead text-muted" style="width: 100%;">
            The Big Idea is a collaborative forum designed to bring together decision makers ranging from industry players,
            regulators and the best minds from all sectors, to strategise and find solutions to challenges brought by
            Digital Technology, Internet of Things, AI, Global Trends and Innovations impacting our world and society,
            in order to pave the way to a Golden Indonesia by 2045.
          </p>
        </div>
      </div>
        <div class="text-center fade-up" style="margin-top: 6rem;">
          <h2 class="fw-bold mb-5 text-uppercase text-muted">WHY BE PART OF THE FORUM</h2>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center fade-up">
            <?php
            $items = [
              ['icon' => 'bi-chat-dots-fill', 'text' => 'Be part of the conversation with policy makers and other thought leaders on the Big Issues.'],
              ['icon' => 'bi-lightbulb-fill', 'text' => 'Knowledge sharing and showcasing Best Practices.'],
              ['icon' => 'bi-broadcast-pin', 'text' => 'Amplify impact, influence, brand, through all national multimedia platforms.'],
              ['icon' => 'bi-people-fill', 'text' => 'Network with Regulators and National and International movers and shakers.'],
              ['icon' => 'bi-gear-wide-connected', 'text' => 'Collaborate on achieving common goals with implementable solutions and sound policies.']
            ];

        foreach ($items as $item) {
          echo '
          <div class="col fade-up">
            <div class="card bg-transparent border-danger h-100 p-3 rounded-4 shadow-sm hover-shadow text-start fade-up">
              <div class="d-flex align-items-start gap-3">
                <i class="bi ' . $item['icon'] . ' text-danger fs-3"></i>
                <p class="mb-0 text-body text-muted">' . $item['text'] . '</p>
              </div>
            </div>
          </div>';
        }
        ?>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
.hover-shadow:hover {
  box-shadow: 0 0 20px rgba(255, 215, 0, 0.2);
  border-color: #FFD700 !important;
}

/* === Efek dasar untuk semua animasi === */
.fade-up, .fade-left, .fade-right, .fade-down {
  opacity: 0;
  transition: all 1s ease-out;
}

/* === Arah masuk animasi === */
.fade-up { transform: translateY(50px); }
.fade-down { transform: translateY(-50px); }
.fade-left { transform: translateX(-50px); }
.fade-right { transform: translateX(50px); }

/* === Saat muncul di layar === */
.show {
  opacity: 1;
  transform: translate(0, 0);
}
</style>

<script>
  // animasi muncul saat scroll
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      }
    });
  }, { threshold: 0.2 });

  // observe semua elemen dengan class animasi
  document.querySelectorAll('.fade-up, .fade-left, .fade-right, .fade-down')
    .forEach(el => observer.observe(el));
</script>
