<!-- 🔹 GALLERY SECTION (tetap seperti semula) -->
  <div style="position:relative; z-index:2; background:white;"> 
<section id="OurSuccessStory" class="container-fluid px-0 text-white text-center py-5 bg-dark">
  <div class="container">
    <h2 class="title-section mb-3 text-white fade-up">Our Success Story</h2>
    <p class="fade-up">Our Success Story highlights how The Big Idea Forum has consistently brought together leaders, innovators, policy makers, and communities to shape constructive conversations and real solutions. Through collaborative dialogues and amplified awareness, each forum continues to create meaningful impact that drives progress for Indonesia’s future.</p>
    
    <div class="GalleryPhoto">
      <div class="slider-1">
        <div class="row g-3 mt-1 fade-up">
          <div class="col-md-4">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery1']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
          <div class="col-md-8">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery2']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
        </div>

        <div class="row g-3 mt-1 fade-up">
          <div class="col-md-7">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery3']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
          <div class="col-md-5">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery4']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
        </div>

        <div class="row g-3 mt-1 fade-up">
          <div class="col-12">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery5']) }}" class="img-fluid grid-img-long" alt="Photo Gallery">
          </div>
        </div>
      </div>

      <div class="slider-2">
        <div class="row g-3 mt-1 fade-up">
          <div class="col-md-5">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery6']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
          <div class="col-md-7">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery7']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
        </div>

        <div class="row g-3 mt-1 fade-up">
          <div class="col-12">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery8']) }}" class="img-fluid grid-img-long" alt="Photo Gallery">
          </div>
        </div>

        <div class="row g-3 mt-1 fade-up">
          <div class="col-md-5">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery9']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
          <div class="col-md-7">
            <img src="{{ asset('uploads/image/' . $gallery['Gallery10']) }}" class="img-fluid grid-img" alt="Photo Gallery">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 🔹 VIDEOS SECTION -->
<!-- 🔹 VIDEOS SECTION -->
<section id="Topics" class="container-fluid text-white py-5 bg-dark">
  <div class="container text-start">

    <hr class="section-divider">
    <h2 class="title-section text-white fade-up">Our Video Highlights</h2>

    <!-- 🔹 FILTER TAB NAV -->
    <ul class="nav nav-pills mt-4 mb-4" id="videoTab" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#content-latest">Today</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#content-1w">1 Week Before</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#content-1m">1 Month Before</button>
      </li>
    </ul>

    <!-- TAB CONTENT -->
    <div class="tab-content fade-up">

      <!-- 🟩 TERBARU -->
      <div class="tab-pane fade show active" id="content-latest">
        <div class="video-carousel">

          @forelse($videos_latest->take(6) as $video)
            <div class="video-card shadow-sm">
              <div class="ratio ratio-16x9">
                <iframe src="{{ $video->url_video }}" allowfullscreen></iframe>
              </div>
              <div class="card-body">
                <h5 class="card-title fw-semibold">{{ $video->title }}</h5>
              </div>
            </div>

          @empty
            <div class="video-empty">
              <p class="fs-3 fw-bold text-center text-white">
                📅 There are no new videos today.
              </p>
            </div>
          @endforelse

        </div>

        <div class="text-center mt-4">
          <a href="{{ route('allvideos.index') }}" class="btn btn-outline-light px-4" style="border-color:#cc1417">
            View All <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
      </div>

      <!-- 🟧 1 MINGGU -->
      <div class="tab-pane fade" id="content-1w">
        <div class="video-carousel">

          @forelse($videos_1w->take(6) as $video)
            <div class="video-card shadow-sm">
              <div class="ratio ratio-16x9">
                <iframe src="{{ $video->url_video }}" allowfullscreen></iframe>
              </div>
              <div class="card-body">
                <h5 class="card-title fw-semibold">{{ $video->title }}</h5>
              </div>
            </div>

          @empty
            <div class="video-empty">
              <p class="fs-3 fw-bold text-center text-white">
                📅 No videos from the last 1 week.
              </p>
            </div>
          @endforelse

        </div>

        <div class="text-center mt-4">
          <a href="{{ route('allvideos.index') }}" class="btn btn-outline-light px-4" style="border-color:#cc1417">
            View All <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
      </div>

      <!-- 🟦 3 MINGGU -->
      <div class="tab-pane fade" id="content-1m">
        <div class="video-carousel">

          @forelse($videos_1m->take(6) as $video)
            <div class="video-card shadow-sm">
              <div class="ratio ratio-16x9">
                <iframe src="{{ $video->url_video }}" allowfullscreen></iframe>
              </div>
              <div class="card-body">
                <h5 class="card-title fw-semibold">{{ $video->title }}</h5>
              </div>
            </div>

          @empty
            <div class="video-empty">
              <p class="fs-3 fw-bold text-center text-white">
                📅 No videos from the last 1 month.
              </p>
            </div>
          @endforelse

        </div>

        <div class="text-center mt-4">
          <a href="{{ route('allvideos.index') }}" class="btn btn-outline-light px-4" style="border-color:#cc1417">
            View All <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<!-- 🔹 STYLE -->
<style>
.grid-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 8px;
  background-color: #000;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.grid-img-long {
  width: 100%;
  height: 500px;
  object-fit: cover;
  border-radius: 8px;
  background-color: #000;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.grid-img:hover, .grid-img-long:hover {
  transform: scale(1.03);
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}
.section-divider {
  border: none;
  height: 5px;
  background-color: #ffffff;
  border-radius: 10px;
}

/* 🔸 TAB FILTER */
.nav-pills {
  justify-content: flex-start !important;
}
.nav-pills .nav-link {
  color: #fff;
  border: 1px solid #cc1417;
  margin-right: 8px;
  border-radius: 50px;
  padding: 8px 18px;
  font-weight: 500;
  transition: all 0.3s ease;
}
.nav-pills .nav-link.active {
  background-color: #cc1417;
  border-color: #cc1417;
  color: #fff;
}
.nav-pills .nav-link:hover {
  background-color: #b01013;
  border-color: #b01013;
}

/* 🔸 VIDEO CAROUSEL */
.video-card {
  background: transparent;
  flex: 0 0 31%;
  border-radius: 8px;
  transition: transform 0.3s ease;
  scroll-snap-align: start;
}
.video-card .card-body {
  color: white;
  padding: 12px;
}
.video-card:hover {
  transform: translateY(-5px);
}
.video-carousel {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}
.video-empty {
  width: 100%;
  min-height: 40vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

@media (max-width: 768px) {
   p.fade-up {
        text-align: justify;
    }

  .slider-1 {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 10px;
  }

  .slider-1 .row {
    display: contents; 
  }

  .slider-1 [class*="col-"] {
    flex:0 0 100%;   
    scroll-snap-align: center;
  }

  .grid-img,
  .grid-img-long {
    width: 100%;
    aspect-ratio: 16 / 9;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
  }

  .slider-1::-webkit-scrollbar {
    display: none;
  }
  .slider-1 {
    scrollbar-width: none;
  }
  .slider-2 {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 10px;
  }

  .slider-2 .row {
    display: contents;
  }

  .slider-2 [class*="col-"] {
    flex: 0 0 100%;
    scroll-snap-align: center;
  }

  .slider-2::-webkit-scrollbar {
    display: none;
  }
  .slider-2 {
    scrollbar-width: none;
  }
}

/* 🔸 RESPONSIVE (MOBILE) */
@media (max-width: 768px) {
  .video-carousel {
    flex-wrap: nowrap;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
  }

  .video-card {
    flex: 0 0 80%;
    min-width: 250px;
  }

  /* ✅ Hilangkan scrollbar di semua browser */
  .video-carousel::-webkit-scrollbar {
    display: none;
  }
  .video-carousel {
    scrollbar-width: none; /* Firefox */
  }

  .nav-pills {
    flex-wrap: nowrap;
    overflow-x: auto;
  }

  /* ✅ Hilangkan scrollbar pada tab filter juga */
  .nav-pills::-webkit-scrollbar {
    display: none;
  }
  .nav-pills {
    scrollbar-width: none;
  }

  .nav-pills .nav-link {
    white-space: nowrap;
  }
   .video-empty {
    min-height: 40vh;
  }
}

</style>
