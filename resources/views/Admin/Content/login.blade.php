<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

      <div class="col-12 col-md-6 left-side">
        <h2>Login</h2>

        <form method="POST" action="/loginuser" class="login-form">
        @csrf
          @if ($errors->any())
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif
          <div class="mb-3">
            <label for="email" class="form-label">Email atau Username</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Email atau Username" required>
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="************" required>
              <button type="button" onclick="togglePassword()">
                <i id="toggleIcon" class="fa-solid fa-eye"></i>
              </button>
            </div>
          </div>

          <button type="submit" class="btn btn-login">LOG IN</button>
        </form>
      </div>

      <div class="col-md-6 d-none d-md-flex right-side">
        <div>
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/CNN_International_logo.svg" alt="CNN Logo">
          <h3>Online Community For<br>CNN Indonesia</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
      </div>

    </div>
  </div>