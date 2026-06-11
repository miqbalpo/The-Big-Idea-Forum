<div style="position:relative; z-index:2; background:white;">
  <section id="moderator" class="container-fluid text-white text-center py-5 moderator bg-white position-relative">
    <!-- Garis atas -->
  <div class="position-absolute top-0 start-50 translate-middle-x" 
        style="width: 75%; height: 2px; background-color: #ccc;">
    </div>


    <div class="container">
      <div class="mb-5">
        <h2 class="fw-bold mb-2 text-body fade-up">MODERATOR</h2>
        <h4 class="fw-bold text-warning fade-up">HOST & FOUNDER <br>OF TBIF</h4>
      </div>

      <div class="row align-items-center justify-content-center text-start flex-column-reverse flex-md-row">
        <!-- @ foreach ($moderators as $moderator)   -->
        <div class="col-12 col-md-8 mb-4 mb-md-0 fade-up" style="text-align: justify;">
          <!-- <div id="bioCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="15000"> -->
          <div id="bioCarousel" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active text-body">
                <p>
                  {!! $moderators->deskripsi !!}
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-4 text-center ms-auto mb-4 mb-md-0 fade-up">
          <div class="bio-image">
            <img 
              src="{{ asset('uploads/image/' . $moderators->image) }}" 
              alt="Foto Moderator" 
              class="img-fluid rounded shadow mb-3" 
              style="max-width: 280px; height: auto;">
            <p class="fw-bold text-muted text-uppercase mb-0 fs-3" style="letter-spacing: 1px;">{{$moderators->name}}</p>
          </div>
        </div>
        <!-- @ endforeach -->
      </div>
    </div>
  </section>
</div>

<style>
.fade-up {
  animation: fadeUp 0.8s ease-in-out;
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.carousel-item {
  transition: opacity 1s ease-in-out;
}

.moderator {
  position: relative;
}
</style>
