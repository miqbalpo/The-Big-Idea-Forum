@extends('Admin.Global.main')

@section('content')
<div>
  <div class="content-header">
    <h2 class="text-white">Media Gallery Management</h2>
  </div>

  <div class="event-container ">
    <div class="section-title">
      <h5>Daftar Event</h5>

    </div>

    <!-- Tabel Event -->
    <div class="table-responsive">
      <form method="POST" action="{{ route('gallery.update') }}" enctype="multipart/form-data">
        @csrf
        @foreach (['success', 'error', 'warning', 'info'] as $msg)
            @if(session($msg))
                <div class="alert alert-{{ $msg }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach
        <div id="OurSuccessStory" class="container-fluid px-0 text-white text-center bg-dark" style="border-radius: 15px;">
          <div class="container mb-2" style="border-radius: 15px;">
            <h2 class="title-section py-3 text-white fade-up">Our Success Story</h2>
            <p class="fade-up">Our Success Story highlights how The Big Idea Forum has consistently brought together leaders, innovators, policy makers, and communities to shape constructive conversations and real solutions. Through collaborative dialogues and amplified awareness, each forum continues to create meaningful impact that drives progress for Indonesia’s future.</p>
            <div class="GalleryPhoto">
              <!-- Gambar 1 dan 2 -->
              <div class="row g-3 mt-1 fade-up">
                <div class="col-md-4">
                  <div class="upload-container text-center" style="height:300px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery1]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery1']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="upload-container text-center" style="height:300px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery2]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery2']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Gambar 3 dan 4 -->
              <div class="row g-3 mt-1 fade-up">
                <div class="col-md-7">
                  <div class="upload-container text-center" style="height:280px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery3]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery3']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="upload-container text-center" style="height:280px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery4]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery4']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Gambar 5 full -->
              <div class="row g-3 mt-1 fade-up">
                <div class="col-12">
                  <div class="upload-container text-center" style="height:400px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery5]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery5']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Gambar 6 dan 7 -->
              <div class="row g-3 mt-1 fade-up">
                <div class="col-md-5">
                  <div class="upload-container text-center" style="height:270px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery6]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery6']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="upload-container text-center" style="height:270px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery7]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery7']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Gambar 8 full -->
              <div class="row g-3 mt-1 fade-up">
                <div class="col-12">
                  <div class="upload-container text-center" style="height:400px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery8]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery8']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row g-3 mt-1 fade-up">
                <div class="col-md-5">
                  <div class="upload-container text-center" style="height:303px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery9]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/'. $gallery['Gallery9']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-7">
                  <div class="upload-container text-center" style="height:303px;">
                    <input type="file" accept="image/*" name="gallery_files[Gallery10]" hidden>
                    <div class="preview-box" style="width:100%; height:100%;">
                      <img src="{{ asset('uploads/image/' . $gallery['Gallery10']) }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                      <div class="upload-overlay">
                        <div class="upload-icon">📁</div>
                        <p>Drag & drop or <span class="browse">Browse</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="row g-3 mt-1 fade-up">
          <div class="col-12">
            <div class="upload-container text-center" style="height:505px;">
              <input type="file" accept="image/*" name="gallery_files[Gallery1]" hidden>
              <div class="preview-box" style="width:100%; height:100%;" onclick="this.previousElementSibling.click()">
                <img src="{{ asset('uploads/image/Gallery2.png') }}" alt="Upload Preview" class="img-fluid" style="width:100%; height:100%; object-fit:cover;">
                <div class="upload-overlay">
                  <div class="upload-icon">📁</div>
                  <p>Drag & drop or <span class="browse">Browse</span></p>
                </div>
              </div>
            </div>
          </div>
        </div> -->
            </div>
            <div class="d-flex justify-content-end px-3 py-4">
              <button type="submit" class="btn-add-event">
                <i class="bi bi-plus-circle"></i> Submit
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- Tombol Submit -->

    @endsection

    <style>
      .upload-container {
        position: relative;
        display: inline-block;
        width: 100%;
      }

      .preview-box {
        position: relative;
        border: 2px dashed #666;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        background: #1c1c1c;
      }

      .preview-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      /* 🔥 Tambahkan overlay gelap permanen */
      .preview-box::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        /* ubah 0.4 jadi 0.6 kalau mau lebih gelap */
        z-index: 1;
      }

      /* Supaya overlay di bawah teks overlay */
      .upload-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #ccc;
        z-index: 3;
        /* biar tampil di atas overlay gelap */
      }



      .upload-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #ccc;
        pointer-events: none;
      }

      .upload-icon {
        font-size: 40px;
        margin-bottom: 10px;
      }

      .browse {
        color: #4da3ff;
        text-decoration: underline;
      }

      .note {
        font-size: 0.8rem;
        color: #777;
      }

      .grid-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
        background-color: #000;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .grid-img-long {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
        background-color: #000;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .grid-img:hover,
      .grid-img-long:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      }

      .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
      }

      .section-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #d00000;
        border-radius: 2px;
      }

      .section-divider {
        border: none;
        height: 5px;
        background-color: #ffffffff;
        width: 100%;
        border-radius: 10px;
      }

      .video-card {
        background: transparent;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .video-card .ratio {
        flex-shrink: 0;
        width: 100%;
      }

      .video-card .card-body {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
      }

      .video-card .card-title {
        font-size: 1rem;
        color: #ffffffff;
      }

      .video-card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      }


      @media (max-width: 768px) {
        .uniform-img {
          height: 200px;
        }
      }
    </style>
    
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.upload-container').forEach(container => {
        const input = container.querySelector('input[type="file"]');
        const img = container.querySelector('img');

        input.addEventListener('change', e => {
          const file = e.target.files[0];
          if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = ev => {
              img.src = ev.target.result; // tampilkan preview
            };
            reader.readAsDataURL(file);
          }
        });

        container.querySelector('.preview-box').addEventListener('click', () => {
          input.click();
        });
      });
    });
</script>
