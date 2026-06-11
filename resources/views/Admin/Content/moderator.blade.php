@extends('Admin.Global.main')

@section('content')

<div class="content-header">
  <h2 style="color: white;">Moderator Management</h2>
</div>

<div class="event-container">
  <form method="post" action="{{ route('moderator.store', $moderator->id) }}" enctype="multipart/form-data" id="editModeratorForm">
    @csrf
    <input type="hidden" name="moderator_id" value="{{ $moderator->id }}">
    <div class="row">
      <div class="col-md-3 d-flex justify-content-center align-items-center mt-3">
        <div class="upload-wrapper position-relative border border-2 rounded-3 overflow-hidden"
          style="max-height:270px; cursor: pointer;"
          onclick="document.getElementById('formImage').click()"
          ondragover="handleDragOver(event)"
          ondragleave="handleDragLeave(event)"
          ondrop="handleDrop(event)">

          <img id="image" name="image" src="{{ asset('uploads/image/' . $moderator->image) }}"
            class="img-fluid object-fit-cover" alt="Preview Image">

          <div class="hover-overlay d-flex flex-column justify-content-center align-items-center text-center">
            <i class="bi bi-images text-light" style="font-size: 70px; margin-bottom: 12px;"></i>

            <p class="mb-1">
              <span class="text-white">Drag and drop</span>
              <span class="fw-semibold text-white">Cover image</span>, or
              <span class="text-primary text-decoration-underline">Browse</span>
            </p>
            <small class="text-secondary">Maximum 2 MB width recommended.</small>
          </div>
        </div>

        <input class="form-control mt-3" type="file" id="formImage" name="image" accept="uploads/image/*" onchange="previewFile(event)" hidden>
        <input type="hidden" name="deskripsi_content" id="deskripsi_content">
      </div>

      <div class="col-md-9 mb-3">
        @foreach (['success', 'error', 'warning', 'info'] as $msg)
            @if(session($msg))
                <div class="alert alert-{{ $msg }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach
        <label for="name" class="form-label fw-semibold mb-2">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $moderator->name }}">
        <label for="deskripsi" class="form-label fw-semibold mb-2">Description</label>
        <div class="deskripsi-wrapper border border-dark bg-light">
          <div id="deskripsi" name="deskripsi" class="large-deskripsi border-top border-dark">{!! $moderator->deskripsi !!}</div>
        </div>
      </div>
    </div>

    <div class="text-end mt-4">
      <div class="d-flex justify-content-end mt-4 gap-2">
        <!-- <button class="btn-add-event" data-bs-toggle="modal" data-bs-target="successModalLabel"> -->
        <button class="btn-add-event">
          <i class="bi bi-plus-circle"></i> Submit
        </button>
      </div>
    </div>
  </form>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <i class="bi bi-check-circle-fill text-danger mb-3" style="font-size: 48px;"></i>
        <p class="mb-0 fs-5">Data berhasil disubmit!</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .upload-wrapper {
      position: relative;
      background-color: #000;
      transition: border-color 0.3s ease, background-color 0.3s ease;
      cursor: pointer;
    }

    .object-fit-cover {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }

    .hover-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.75);
      border: 2px dashed rgba(255, 255, 255, 0.3);
      opacity: 1;
      transition: opacity 0.35s ease;
      color: white;
    }

    .upload-wrapper:hover .hover-overlay,
    .upload-wrapper.dragover .hover-overlay {
      opacity: 1;
    }

    .upload-wrapper.dragover .hover-overlay {
      border-color: #0d6efd;
      background: rgba(0, 0, 0, 0.85);
    }

    .deskripsi-wrapper {
      background-color: #f6f6f6;
      border: 1px solid #ddd;
      border-radius: 0;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .ql-toolbar.ql-snow {
      background-color: #fff;
      border: none;
      border-bottom: 1px solid #e5e5e5;
      padding: 8px 12px;
    }

    .ql-container.ql-snow {
      border: none;
      font-family: "Inter", sans-serif;
      font-size: 15px;
      color: #333;
      background-color: #f9f9f9;
      min-height: 200px;
    }

    .large-deskripsi {
      height: 220px;
      padding: 12px;
    }

    .ql-toolbar button:hover,
    .ql-toolbar button.ql-active {
      background-color: #f1f1f1 !important;
      border-radius: 4px;
    }

    @media (max-width: 992px) {

      .col-md-3,
      .col-md-9 {
        width: 100%;
      }

      .upload-wrapper {
        height: 220px;
      }

      .large-deskripsi {
        height: 200px;
      }

      .card {
        padding: 1.25rem !important;
      }
    }

    @media (max-width: 576px) {
      .upload-wrapper {
        height: 180px;
      }

      .btn {
        width: 100%;
        margin-bottom: 8px;
      }

      .text-end {
        text-align: center !important;
      }
    }
  </style>

  <script>
    const quill = new Quill('#deskripsi', {
      theme: 'snow',
      placeholder: 'Write your description here...',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline'],
          [{
            'header': 1
          }, {
            'header': 2
          }],
          [{
            'align': []
          }],
          ['blockquote', 'code-block'],
          [{
            'list': 'ordered'
          }, {
            'list': 'bullet'
          }],
          ['clean']
        ]
      }
    });

    document.querySelectorAll('.ql-toolbar button').forEach(btn => {
      const format = btn.className.match(/ql-(\w+)/);
      if (format) {
        const titleMap = {
          bold: 'Bold (Ctrl+B)',
          italic: 'Italic (Ctrl+I)',
          underline: 'Underline (Ctrl+U)',
          header: 'Heading',
          align: 'Align Text',
          blockquote: 'Block Quote',
          'code-block': 'Code Block',
          list: 'List',
          clean: 'Clear Formatting'
        };
        btn.setAttribute('title', titleMap[format[1]] || format[1]);
      }
    });

    function previewFile(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById('image').src = e.target.result;
        reader.readAsDataURL(file);
      }
    }

    const uploadWrapper = document.querySelector('.upload-wrapper');

    function handleDragOver(event) {
      event.preventDefault();
      uploadWrapper.classList.add('dragover');
    }

    function handleDragLeave(event) {
      uploadWrapper.classList.remove('dragover');
    }

    function handleDrop(event) {
      event.preventDefault();
      uploadWrapper.classList.remove('dragover');
      
      // Ambil file yang di-drop
      const file = event.dataTransfer.files[0];
      
      if (file) {
        // --- TAMBAHAN PENTING ---
        // Masukkan file yang di-drop ke dalam <input id="formimage">
        const fileInput = document.getElementById('formimage');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;
        // ------------------------

        // Kode Anda untuk preview (sudah benar)
        const reader = new FileReader();
        reader.onload = e => document.getElementById('image').src = e.target.result;
        reader.readAsDataURL(file);
      }
    }

    // Submit form → tampilkan modal
    document.getElementById('editModeratorForm').addEventListener('submit', function(e) {
      // 1. Ambil konten HTML dari Quill
      const quillContent = quill.root.innerHTML;
      
      // 2. Masukkan konten ke input hidden
      document.getElementById('deskripsi_content').value = quillContent;
      
      // 3. Lanjutkan proses submit ke Controller
      // e.preventDefault() yang ada di kode lama sudah tidak diperlukan 
      // jika Anda tidak ingin menampilkan modal SUCCESS sebelum submit ke server
      
      // Jika Anda ingin modal muncul setelah sukses dari server, 
      // Anda harus menggunakan AJAX. Jika tidak, hapus e.preventDefault()
      
      // Jika Anda tetap ingin menampilkan modal sukses secara client-side, 
      // pastikan Anda menggunakan AJAX untuk submit form:
      // e.preventDefault(); 
      // // Lakukan AJAX submit form di sini
      // const modal = new bootstrap.Modal(document.getElementById('successModal'));
      // modal.show();
    });
  </script>

  @endsection