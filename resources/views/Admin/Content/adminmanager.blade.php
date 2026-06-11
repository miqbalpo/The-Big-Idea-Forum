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
    <h2 class="text-white fw-semibold">Admin Management</h2>
  </div>

  <!-- Form Group -->
  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('account.store') }}">
        @csrf
        @foreach (['success', 'error', 'warning', 'info'] as $msg)
            @if(session($msg))
                <div class="alert alert-{{ $msg }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach



        <!-- Username -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
          </div>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
        </div>

     <div class="mb-3">
            <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter Password" required>
                <span class="input-group-text" style="cursor:pointer;" onclick="toggleInputPassword()">
                    <i id="toggleInputIcon" class="bi bi-eye"></i>
                </span>
            </div>
          </div>


        <!-- Submit -->
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
            <th>Username</th>
            <th>Email</th>
            <th class="text-center"><i class="bi bi-pencil-square"></i> Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ( $users as $u )
          <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td class="text-center">
              <a href="#"
                class="text-primary text-decoration-none me-3"
                data-bs-toggle="modal"
                data-bs-target="#editAccountModal"
                onclick="editAdmin('{{ $u->id }}', '{{ $u->name }}', '{{ $u->email }}')">Edit</a>

              <form action="{{ route('account.delete', $u->id) }}" method="POST" style="display:inline;" 
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data Admin ini?');">
                @csrf
                <button type="submit" class="text-danger text-decoration-none" style="background:none; border:none; padding:0; cursor:pointer;">
                    Delete
                </button>
              </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Modal Edit Admin -->
<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#CC1417; color:white;">
        <h5 class="modal-title fw-semibold" id="editAccountModalLabel">Edit Data Admin</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="editAdminForm" method="post">
          @csrf
          @method('put')

          <input type="hidden" id="editAdminId" name="admin_id">

          <!-- Edit Username -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Username</label>
            <input type="text" class="form-control" id="editUsername" name="username">
          </div>

          <!-- Edit Email -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control" id="editEmail" name="email">
          </div>

          <!-- Edit Password + Eye Icon -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="editPassword" name="password">
                <span class="input-group-text" style="cursor:pointer;" onclick="toggleEditPassword()">
                    <i id="toggleEditIcon" class="bi bi-eye"></i>
                </span>
            </div>
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
  function editAdmin(id, username, email) {
    console.log(id, username, email);
    document.getElementById('editAdminId').value = id;
    document.getElementById('editUsername').value = username;
    document.getElementById('editEmail').value = email;
  }

</script>
<script>
function toggleInputPassword() {
  const passwordField = document.getElementById('inputPassword');
  const toggleIcon = document.getElementById('toggleInputIcon');

  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleIcon.classList.replace("bi-eye", "bi-eye-slash");
  } else {
    passwordField.type = "password";
    toggleIcon.classList.replace("bi-eye-slash", "bi-eye");
  }
}

function toggleEditPassword() {
  const passwordField = document.getElementById('editPassword');
  const toggleIcon = document.getElementById('toggleEditIcon');

  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleIcon.classList.replace("bi-eye", "bi-eye-slash");
  } else {
    passwordField.type = "password";
    toggleIcon.classList.replace("bi-eye-slash", "bi-eye");
  }
}
</script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    // 1. Tangkap form dan tombol submit
    const form = document.getElementById('editAdminForm');
    const saveButton = form.closest('.modal-content').querySelector('.modal-footer button:last-child');

    saveButton.addEventListener('click', function(e) {
      e.preventDefault(); // Mencegah submit form bawaan HTML

      const AdminId = document.getElementById('editAdminId').value;
      const newUsername = document.getElementById('editUsername').value;
      const newEmail = document.getElementById('editEmail').value;

      // Asumsi Route Update Anda adalah 'video.update' yang memerlukan {id}
      // Ganti 'video.update' dengan route aktual Anda dan sesuaikan URL-nya
      const updateUrl = '/admin/update-account/' + AdminId; // Contoh: /video/123

      // Siapkan data
      const formData = new FormData(form);
      // Kita juga bisa mengirim data sebagai JSON:
      /*
      const data = {
          _token: document.querySelector('[name="_token"]').value, // CSRF Token
          _method: 'PUT',
          Username: newTitle,
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
          const modalElement = document.getElementById('editAccountModal');
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
