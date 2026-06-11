@extends('Admin.Global.main')

@section('content')

<style>
  .text-danger {
    color: #CC1417 !important;
  }
</style>
<div class="container-fluid py-4">

  <!-- Header -->
  <div class="mb-4">
    <h2 class="text-white fw-semibold">Video Management</h2>
  </div>

  <!-- Form Group -->
  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('video.store') }}">
        @csrf
        @foreach (['success', 'error', 'warning', 'info'] as $msg)
            @if(session($msg))
                <div class="alert alert-{{ $msg }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach
        <div class="mb-3">
          <label class="form-label fw-semibold">Video title <span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter video title">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Video URL (English) <span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="text" id="url_video" name="url_video" class="form-control" placeholder="https://">
          </div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <button class="btn btn-primary" style="background-color: #CC1417; border-color: #CC1417;">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Table Section -->
  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Title</th>
            <th>Updated Date</th>
            <th>Video URL</th>
            <th class="text-center"><i class="bi bi-pencil-square"></i> Action</th>
          </tr>
        </thead>

        <tbody>

          <!-- 🟩 TERBARU (HARI INI) -->
          <tr class="table-secondary">
            <th colspan="4" class="text-start fw-bold">📅 Today</th>
          </tr>

          @forelse ($videos_latest as $v)
            <tr>
              <td>{{ $v->title }}</td>
              <td>{{ $v->updated_at->format('d-M-Y | h:i a') }}</td>
              <td>{{ $v->url_video }}</td>
              <td class="text-center">
                <a href="#"
                  class="text-primary me-3"
                  data-bs-toggle="modal"
                  data-bs-target="#editVideoModal"
                  onclick="editVideo('{{ $v->id }}', '{{ $v->title }}', '{{ $v->url_video }}')">Edit</a>
                <form action="{{ route('video.delete', $v->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="text-danger" style="background:none;border:none;">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-start text-muted">There are no new videos today.</td></tr>
          @endforelse

          <!-- 🟧 1 MINGGU SEBELUM -->
          <tr class="table-secondary">
            <th colspan="4" class="text-start fw-bold">📅 1 Week Before</th>
          </tr>

          @forelse ($videos_1w as $v)
            <tr>
              <td>{{ $v->title }}</td>
              <td>{{ $v->updated_at->format('d-M-Y | h:i a') }}</td>
              <td>{{ $v->url_video }}</td>
              <td class="text-center">
                <a href="#"
                  class="text-primary me-3"
                  data-bs-toggle="modal"
                  data-bs-target="#editVideoModal"
                  onclick="editVideo('{{ $v->id }}', '{{ $v->title }}', '{{ $v->url_video }}')">Edit</a>
                <form action="{{ route('video.delete', $v->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="text-danger" style="background:none;border:none;">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-start text-muted">No videos from the last 1 week.</td></tr>
          @endforelse

          <!-- 🟦 1 BULAN SEBELUM -->
          <tr class="table-secondary">
            <th colspan="4" class="text-start fw-bold">📅 1 Month Before</th>
          </tr>

          @forelse ($videos_1m as $v)
            <tr>
              <td>{{ $v->title }}</td>
              <td>{{ $v->updated_at->format('d-M-Y | h:i a') }}</td>
              <td>{{ $v->url_video }}</td>
              <td class="text-center">
                <a href="#"
                  class="text-primary me-3"
                  data-bs-toggle="modal"
                  data-bs-target="#editVideoModal"
                  onclick="editVideo('{{ $v->id }}', '{{ $v->title }}', '{{ $v->url_video }}')">Edit</a>
                <form action="{{ route('video.delete', $v->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="text-danger" style="background:none;border:none;">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-start text-muted">No videos from the last 1 month.</td></tr>
          @endforelse

        </tbody>


      </table>
    </div>
  </div>

  <!-- Button Section -->

</div>

<!-- 🔹 Modal Edit Video -->
<div class="modal fade" id="editVideoModal" tabindex="-1" aria-labelledby="editVideoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#CC1417; color:white;">
        <h5 class="modal-title fw-semibold" id="editVideoModalLabel">Edit Video</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="editVideoForm" method="post">
          @csrf
          @method('put')
          <input type="hidden" id="editVideoId" name="video_id">
          <div class="mb-3">
            <label class="form-label fw-semibold">Video Title</label>
            <input type="text" class="form-control" id="editTitle" name="title">
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Video URL</label>
            <input type="text" class="form-control" id="editUrl" name="url_video">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn" style="background-color:#CC1417; color:white;">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  function editVideo(id, title, url) {
    console.log(id, title, url);
    document.getElementById('editVideoId').value = id;
    document.getElementById('editTitle').value = title;
    document.getElementById('editUrl').value = url;
  }

</script>
<!-- 🔹 Script untuk isi data ke modal -->
<script>

  document.addEventListener('DOMContentLoaded', function() {
    // 1. Tangkap form dan tombol submit
    const form = document.getElementById('editVideoForm');
    const saveButton = form.closest('.modal-content').querySelector('.modal-footer button:last-child');

    saveButton.addEventListener('click', function(e) {
      e.preventDefault(); // Mencegah submit form bawaan HTML

      const videoId = document.getElementById('editVideoId').value;
      const newTitle = document.getElementById('editTitle').value;
      const newUrl = document.getElementById('editUrl').value;

      // Asumsi Route Update Anda adalah 'video.update' yang memerlukan {id}
      // Ganti 'video.update' dengan route aktual Anda dan sesuaikan URL-nya
      const updateUrl = '/admin/videoupdate/' + videoId; // Contoh: /video/123

      // Siapkan data
      const formData = new FormData(form);
      // Kita juga bisa mengirim data sebagai JSON:
      /*
      const data = {
          _token: document.querySelector('[name="_token"]').value, // CSRF Token
          _method: 'PUT',
          title: newTitle,
          url_video: newUrl,
      };
      */

      // 2. Kirim Data dengan Fetch API (AJAX)
      fetch(updateUrl, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
          },
          body: formData // Menggunakan FormData untuk handle _method='PUT'
        })
        .then(response => {
          if (!response.ok) {
            // Tangani Error HTTP
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          // 3. Tangani Sukses
          alert('Video berhasil diupdate!');
          // Sembunyikan modal dan muat ulang tabel/halaman
          const modalElement = document.getElementById('editVideoModal');
          const modal = bootstrap.Modal.getInstance(modalElement);
          modal.hide();
          window.location.reload();
        })
        .catch(error => {
          // 4. Tangani Kegagalan
          console.error('Ada kesalahan saat update:', error);
          alert('Gagal mengupdate video. Cek console untuk detail.');
        });
    });
  });
</script>

@endsection