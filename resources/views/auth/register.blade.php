<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up | CodeSquid</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Zen+Kaku+Gothic+Antique:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      background-color: #fff;
    }
    .left-side {
      background-color: #CC1417;
      color: #fff;
      clip-path: polygon(0 0, 70% 0, 100% 100%, 0% 100%);
      box-shadow: 8px 0 30px rgba(0, 0, 0, 0.15);
      position: relative;
      z-index: 1;
    }
    .left-side h1 {
      font-family: 'Zen Kaku Gothic Antique', sans-serif;
      font-weight: 700;
      font-size: 31px;
      line-height: 1.3;
    }
    .left-side p {
      font-size: 16px;
      line-height: 28px;
      opacity: 0.9;
    }
    .signup-form {
      background-color: #fff;
      border-radius: 15px;
      padding: 50px;
      /* box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); */
      width: 100%;
      max-width: 500px;
    }
    .form-label {
      font-weight: 500;
      color: #333;
    }
    .form-control {
      border: none;
      border-bottom: 1px solid #ccc;
      border-radius: 0;
      padding: 10px 0;
      font-size: 14px;
      box-shadow: none !important;
    }
    .form-control:focus {
      border-color: #7A5BF8;
    }
    .btn-purple {
      background-color: #7A5BF8;
      color: #fff;
      border: none;
      border-radius: 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0px 6px 15px rgba(122, 91, 248, 0.3);
    }
    .btn-purple:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }
    .btn-red {
      background-color: #CC1417;
      color: #fff;
      border: none;
      border-radius: 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0px 6px 15px rgba(204, 20, 23, 0.3);
    }
    .btn-red:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">
      <div class="col-md-7 d-none d-md-flex flex-column justify-content-center align-items-start text-center left-side p-5 gap-5">
        <div class="flex-column d-flex justify-content-end px-5 mx-5">
          <div class="logo mb-5">
            <img src="{{ asset('assets/image 2.png') }}" alt="Logo" width="512px" height="229px">
          </div>
          <div class="title mb-3">
            <h1>Online Community For <br> CNN Indonesia</h1>
          </div>
          <div class="subtitle">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing <br> elit, sed do eiusmod tempor incididun.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center bg-white p-4 p-md-5">
        <div class="text-center mb-4 mb-md-5">
        <h1 style="font-family: 'Zen Kaku Gothic Antique', sans-serif; 
           font-weight: bold; 
           font-size: 31.25px; 
           line-height: 37.5px; 
           letter-spacing: -0.5px;">
        Register
      </h1>
        </div>
        <form method="POST" action="/registeruser" class="signup-form">
          @csrf
          @if ($errors->any())
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="username" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="email" required>
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="********" required>
            </div>
          </div>
          <div class="mb-4">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
            <div class="input-group">
              <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="********" required>
            </div>
          </div>
          <button type="submit" class="btn btn-red w-100 py-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
  </script>
</body>
</html>
