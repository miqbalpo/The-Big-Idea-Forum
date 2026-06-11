@extends('Admin.Global.main')
<style>
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
</style>

@section('content')
<div>
  <div class="content-header">
    <h2 class="text-white">Event Management</h2>
  </div>

  <div class="event-container bg-white p-4">
    <div class="section-title mb-4">
      <h5>Tambah Event Baru</h5>
    </div>

    <!-- Form Event -->
    <form class="event-form container-fluid" method="POST" action="{{ route('event.update', $event->id) }}" id="updateEvent">
      @csrf
      @foreach (['success', 'error', 'warning', 'info'] as $msg)
            @if(session($msg))
                <div class="alert alert-{{ $msg }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach
      <input type="hidden" name="event_id" value="{{ $event->id }}">

      <!-- TITLE -->
      <label>TITLE <span class="text-danger">*</span></label>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-stars text-muted"></i></span>
        <input type="text" class="form-control" name="title" placeholder="Enter event title" value="{{ $event->title }}" required>
      </div>

      <!-- WHEN -->
      <label>WHEN <span class="text-danger">*</span></label>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
        <input type="date" class="form-control" name="date" value="{{ $event->date->format('Y-m-d') }}" required>
      </div>
      
      <!-- WHAT -->
      <label>WHAT <span class="text-danger">*</span></label>
      <div class="input-group mb-3">
        <div class="deskripsi-wrapper border border-dark bg-light">
          <div id="deskripsi" name="deskripsi" class="large-deskripsi border-top border-dark">{!! $event->description !!}</div>
          <input type="hidden" name="deskripsi_content" id="deskripsi_content">
        </div>
      </div>

      <!-- WHERE -->
      <label>WHERE <span class="text-danger">*</span></label>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
        <input type="text" class="form-control" name="location" placeholder="Enter location" value="{{ $event->location }}" required>
      </div>

      <!-- WHO -->
      <label>WHO <span class="text-danger">*</span></label>
      <div id="participants">
        @foreach($event->narasumbers as $n)
        <div class="input-group mb-3 participant">
            <span class="input-group-text"><i class="bi bi-person"></i></span>

            <input type="hidden" name="participant_id[]" value="{{ $n->id }}">

            <input type="text" class="form-control" name="participants[]" 
                  value="{{ $n->name }}" placeholder="Name" required>

            <input type="text" class="form-control" name="role[]" 
                  value="{{ $n->jabatan }}" placeholder="Role" required>

            <button type="button" class="btn btn-outline-danger remove-participant">
                <i class="bi bi-trash"></i>
            </button>
        </div>
        @endforeach
      </div>

      <button type="button" class="btn-add mt-3" id="addParticipant">
        <i class="bi bi-plus-lg me-2"></i> Add Participant
      </button>

      <small id="participantWarning" class="text-danger mt-2 d-none">⚠️ Maksimal 6 peserta diperbolehkan.</small>

      <button type="submit" class="btn btn-danger mt-4 w-100">Save Event</button>
    </form>
  </div>
</div>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
  // ✅ Quill Editor Setup
  const quill = new Quill('#deskripsi', {
    theme: 'snow',
    placeholder: 'Write your description here...',
    modules: {
      toolbar: [
        ['bold', 'italic', 'underline'],
        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'align': [] }],
        ['blockquote', 'code-block'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        ['clean']
      ]
    }
  });

  // Simpan Quill
  document.getElementById('updateEvent').addEventListener('submit', function() {
    document.getElementById('deskripsi_content').value = quill.root.innerHTML;
  });

  document.addEventListener("DOMContentLoaded", function () {
    const addBtn = document.getElementById('addParticipant');
    const container = document.getElementById('participants');
    const warning = document.getElementById('participantWarning');
    const maxParticipants = 6;

    // ============================
    // ⭐ TAMBAH PESERTA BARU
    // ============================
    addBtn.addEventListener('click', () => {
      const count = container.querySelectorAll('.participant').length;
      if (count >= maxParticipants) {
        warning.classList.remove('d-none');
        return;
      }
      warning.classList.add('d-none');

      const div = document.createElement('div');
      div.classList.add('input-group', 'participant', 'mt-2', 'mb-1');

      div.innerHTML = `
        <span class="input-group-text"><i class="bi bi-person"></i></span>

        <input type="hidden" class="participant-id" value="">

        <input type="text" class="form-control p-name" name="participants[]" placeholder="Name" required>
        <input type="text" class="form-control p-role" name="role[]" placeholder="Role" required>

        <button type="button" class="btn btn-outline-danger remove-participant">
            <i class="bi bi-trash"></i>
        </button>
      `;

      container.appendChild(div);

      // ⭐ Tambahkan note “Belum disimpan”
      const note = document.createElement("small");
      note.classList.add("participant-note");
      note.innerText = "Belum disimpan — klik Save Event untuk menyimpan.";
      container.appendChild(note);
    });


    // ============================
    // ⭐ HAPUS PESERTA
    // ============================
    document.addEventListener("click", function (e) {
      if (e.target.closest(".remove-participant")) {
        
        const total = container.querySelectorAll('.participant').length;

        // Tidak boleh kurang dari 1
        if (total <= 1) {
          alert("Tidak dapat menghapus! Minimal harus ada 1 peserta.");
          return;
        }

        const row = e.target.closest(".participant");

        // Konfirmasi bawaan browser
        const confirmDelete = confirm("Apakah Anda yakin ingin menghapus peserta ini?");

        if (!confirmDelete) return;

        // Hapus note jika ada
        if (row.nextElementSibling && row.nextElementSibling.classList.contains("participant-note")) {
          row.nextElementSibling.remove();
        }

        if (row.querySelector('input[name="participant_id[]"]')) {
            row.querySelector('input[name="participant_id[]"]').value = ""; 
        }
        row.remove();
      }
    });


    // ============================
    // ⭐ DETEKSI EDIT PADA PESERTA LAMA
    // ============================
    container.querySelectorAll(".participant").forEach(p => {
      const nameInput = p.querySelector(".form-control[name='participants[]']");
      const roleInput = p.querySelector(".form-control[name='role[]']");

      const addUnsavedNote = () => {
        // Jika note sudah ada → jangan buat lagi
        if (p.nextElementSibling && p.nextElementSibling.classList.contains("participant-note")) {
          return;
        }

        const note = document.createElement("small");
        note.classList.add("participant-note");
        note.innerText = "Perubahan belum disimpan — klik Save Event.";
        p.after(note);
      };

      nameInput.addEventListener("input", addUnsavedNote);
      roleInput.addEventListener("input", addUnsavedNote);
    });

  });
</script>

@endsection
<style>
  body {
    background-color: #fafafa;
    font-family: 'Poppins', sans-serif;
  }

  .event-container {
    margin-left: 2rem; /* Geser ke kiri */
    margin-top: 2rem;
  }

  .event-form {
    width: 100%;
  }

  .event-form .input-box {
    background-color: #f3f3f3;
    border-radius: 6px;
    padding: 16px 18px;
    font-size: 16px;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .event-form .input-box input {
    border: none;
    background: transparent;
    width: 100%;
    outline: none;
    font-size: 16px;
    color: #333;
  }

  .event-form label {
    font-weight: 600;
    margin-top: 15px;
    font-size: 15px;
  }

  .btn-add {
    width: 100%;
    background: transparent;
    border: 1px solid #b5b5b5;
    border-radius: 6px;
    padding: 12px;
    font-weight: 500;
    color: #444;
    transition: all 0.2s ease;
    text-align: center;
  }

  .btn-add:hover {
    background: #f7f7f7;
    border-color: #999;
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

  @media (max-width: 768px) {
    .event-container {
      margin-left: 0;
    }
  }

  .participant-note {
    font-size: 12px;
    margin-top: -8px;
    margin-bottom: 10px;
    color: #d00000;
    font-style: italic;
}
</style>

