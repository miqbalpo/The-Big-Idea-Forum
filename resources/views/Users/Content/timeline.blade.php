<div style="position:relative; z-index:2; background:white;">
<section id="RestorativeEconomy" class="py-5 bg-white position-relative" style="color: #fff;">
  <div class="container text-center" style="max-width: 1000px;">
    <h3 class="fw-bold mb-4 fade-up text-muted fs-2">{!! $event->title !!}</h3>
    
    <p class="text-body mb-2 fs-5 fade-up delay-1">
      {!! strip_tags($event->description) !!}
    </p>
    <p class="text-body mb-5 fs-5 fade-up delay-2">A Forum for collaboration and Networking</p>

    <!-- When & Where -->
    <!-- <div class="d-flex justify-content-center align-items-start gap-5 flex-wrap mb-5 fade-up delay-3"> -->
    <div class="gap-5 flex-wrap mb-5 fade-up delay-3">
      <div class="row">
        <div class="col-md-4 justify-content-center">
          <p class="border border-black text-muted rounded-pill px-4 py-2 fw-semibold d-inline-block mb-3 fs-5">WHEN</p>
          <h4 class="fw-bold mb-0 text-muted">{{ $event->date->format('F jS, Y') }}</h4>
        </div>
        <div class="col-md-4"></div>  
        <div class="col-md-4 justify-content-center">
          <p class="border border-black text-muted rounded-pill px-4 py-2 fw-semibold d-inline-block mb-3 fs-5">WHERE</p>
          <h4 class="fw-bold mb-0 text-muted">{{ $event->location }}</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 justify-content-center">
          <p class="border border-black text-muted rounded-pill px-4 py-2 fw-semibold d-inline-block mb-3 fs-5">WHO</p>
          <h4 class="fw-bold mb-1 text-muted">High Level Speakers</h4>
          <p class="mb-0 text-body fs-5">{!! $event->title !!}</p>
        </div>
      </div>
    </div>

    <!-- Speakers -->
    <div class="row justify-content-center g-4">]
      @foreach ($narasumbers as $narasumber)
      <div class="col-md-5 fade-up delay-1">
        <div class="border border-black text-muted rounded-4 p-4" style="font-size: 1.1rem;">
          <h4 class="fw-bold mb-1">{{ $narasumber->name }}</h4>
          <p class="text-body mb-0">{{ $narasumber->jabatan }}</p>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>

  
      <div class="position-absolute bottom-0 start-50 translate-middle-x" 
       style="width: 75%; height: 2px; background-color: #ccc;"></div>
</section>
</div>

<style>
    
  /* Efek fade ke atas */
  .fade-up {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 1s ease-out, transform 1s ease-out;
  }

  .fade-up.show {
    opacity: 1;
    transform: translateY(0);
  }

  /* Delay biar urut */
  .delay-1 { transition-delay: 0.2s; }
  .delay-2 { transition-delay: 0.4s; }
  .delay-3 { transition-delay: 0.6s; }
  .delay-4 { transition-delay: 0.8s; }
  .delay-5 { transition-delay: 1s; }
</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll(".fade-up");

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
          observer.unobserve(entry.target); // animasi cuma sekali
        }
      });
    }, { threshold: 0.2 });

    elements.forEach(el => observer.observe(el));
  });
</script>
