@include('Users.Global.header')

<section id="AllVideos" class="container-fluid text-white py-5 bg-dark">
  <div class="container text-start">
    <h2 class="title-section text-white mb-4 fade-up">All Video Highlights</h2>

    {{-- ✅ Jika semua kategori video kosong --}}
    @if($videos_latest->isEmpty() && $videos_1w->isEmpty() && $videos_1m->isEmpty())
      <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <p class="text-center fs-3 fw-bold text-white">🎬 Belum ada video yang tersedia saat ini.</p>
      </div>
    @else
      <!-- 🔹 FILTER TAB NAV -->
      <ul class="nav nav-pills mt-4 mb-4 video-filter-tabs" id="videoTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="tab-latest" data-bs-toggle="tab" data-bs-target="#content-latest" type="button" role="tab">
            Today
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="tab-1w" data-bs-toggle="tab" data-bs-target="#content-1w" type="button" role="tab">
            1 Month Before
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="tab-1m" data-bs-toggle="tab" data-bs-target="#content-1m" type="button" role="tab">
            1 Week Before
          </button>
        </li>
      </ul>

      <!-- 🔹 TAB CONTENT -->
      <div class="tab-content fade-up" id="videoTabContent">

        <!-- 🟩 TAB TERBARU -->
        <div class="tab-pane fade show active" id="content-latest" role="tabpanel" style="min-height: 90vh;">
          <div class="video-carousel">
            @forelse($videos_latest as $video)
              <div class="video-card shadow-sm">
                <div class="ratio ratio-16x9">
                  <iframe 
                    src="{{ $video->url_video }}" 
                    title="{{ $video->title }}" 
                    allowfullscreen>
                  </iframe>
                </div>
                <div class="card-body">
                  <h5 class="card-title fw-semibold">{{ $video->title }}</h5>
                </div>
              </div>
            @empty
              <div class="d-flex justify-content-center align-items-center w-100" style="min-height: 90vh;">
                <p class="text-center fs-3 fw-bold text-white">📅 There are no new videos today.</p>
              </div>
            @endforelse
          </div>
        </div>

        <!-- 🟧 TAB 1 MINGGU SEBELUM -->
        <div class="tab-pane fade" id="content-1w" role="tabpanel" style="min-height: 90vh;">
          <div class="video-carousel">
            @forelse($videos_1w as $video)
              <div class="video-card shadow-sm">
                <div class="ratio ratio-16x9">
                  <iframe 
                    src="{{ $video->url_video }}" 
                    title="{{ $video->title }}" 
                    allowfullscreen>
                  </iframe>
                </div>
                <div class="card-body">
                  <h5 class="card-title fw-semibold">{{ $video->title }}</h5>
                </div>
              </div>
            @empty
              <div class="d-flex justify-content-center align-items-center w-100" style="min-height: 90vh;">
                <p class="text-center fs-3 fw-bold text-white">📅 No videos from the last 1 week.</p>
              </div>
            @endforelse
          </div>
        </div>

        <!-- 🟦 TAB 3 MINGGU SEBELUM -->
        <div class="tab-pane fade" id="content-1m" role="tabpanel" style="min-height: 90vh;">
          <div class="video-carousel">
            @forelse($videos_1m as $video)
              <div class="video-card shadow-sm">
                <div class="ratio ratio-16x9">
                  <iframe 
                    src="{{ $video->url_video }}" 
                    title="{{ $video->title }}" 
                    allowfullscreen>
                  </iframe>
                </div>
                <div class="card-body">
                  <h5 class="card-title fw-semibold">{{ $video->title }}</h5>
                </div>
              </div>
            @empty
              <div class="d-flex justify-content-center align-items-center w-100" style="min-height: 90vh;">
                <p class="text-center fs-3 fw-bold text-white">📅 No videos from the last 1 month.</p>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    @endif
  </div>
</section>

@include('Users.Global.footer')

<style>
body {
  background-color: #111315;
}

/* 🔸 TAB FILTER */
.video-filter-tabs {
  justify-content: flex-start !important;
  flex-wrap: nowrap;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none; /* Firefox */
}
.video-filter-tabs::-webkit-scrollbar {
  display: none; /* Chrome, Safari */
}
.video-filter-tabs .nav-link {
  color: #fff;
  border: 1px solid #cc1417;
  margin-right: 8px;
  border-radius: 50px;
  padding: 8px 18px;
  font-weight: 500;
  transition: all 0.3s ease;
  white-space: nowrap;
}
.video-filter-tabs .nav-link.active {
  background-color: #cc1417;
  border-color: #cc1417;
  color: #fff;
}
.video-filter-tabs .nav-link:hover {
  background-color: #b01013;
  border-color: #b01013;
}

/* 🔸 VIDEO GRID */
.video-card {
  background: transparent;
  width: 32%;
  border-radius: 8px;
  transition: transform 0.3s ease;
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
  flex-wrap: wrap;
  gap: 1rem;
}

/* 🔸 RESPONSIVE (MOBILE) */
@media (max-width: 768px) {
  .video-carousel {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    gap: 1.5rem;
    overflow-y: visible; /* biar scroll pakai body, bukan div */
  }

  .video-card {
    width: 100%;
    min-width: auto;
  }

  /* ✅ Hilangkan scrollbar di mobile */
  .video-carousel::-webkit-scrollbar {
    display: none;
  }
  .video-carousel {
    scrollbar-width: none;
  }
}
</style>
