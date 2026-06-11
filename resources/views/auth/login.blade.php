<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | CNN Indonesia Community</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Zen+Kaku+Gothic+Antique:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .left-side {
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px 30px;
    }

    .left-side h2 {
      font-weight: 600;
      text-align: center;
      margin-bottom: 40px;
      color: #222;
      line-height: 1.4;
    }

    .login-form {
      width: 100%;
      max-width: 350px;
    }

    .form-control {
    font-family: 'Poppins', sans-serif;   
    font-size: 15px;                      
    color: #333;                         
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0;
    box-shadow: none !important;
    padding: 10px 0;
    }

    .form-control::placeholder {
    font-family: 'Poppins', sans-serif;  
    font-size: 14px;                     
    color: #aaa;                          
    }

    .form-control:focus {
      border-color: #cc0000;
    }

    .form-label {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      color: #757575;
      font-size: 12.5px;
    }


    .input-group {
      position: relative;
      border-bottom: 1px solid #ccc;
    }

    .input-group:focus-within {
      border-color: #cc0000;
    }

    .input-group .form-control {
      border: none;
      box-shadow: none !important;
    }

    .input-group button {
      border: none;
      background: transparent;
      color: #888;
    }

    .input-group button:hover {
      color: #555;
    }

    .btn-login {
      background-color: #cc0000;
      font-family: 'Zen Kaku Gothic Antique', sans-serif;
      color: #fff;
      border-radius: 25px;
      border: none;
      padding: 10px;
      font-weight: 600;
      width: 100%;
      margin-top: 15px;
      box-shadow: 0 4px 10px rgba(204, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background-color: #b30000;
      transform: translateY(-2px);
    }

    .right-side {
      background-color: #c00;
      color: #fff;
      clip-path: polygon(0 0, 100% 0, 100% 100%, 20% 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 50px 40px;
    }

    .right-side div {
      margin-left: 20%;
    }

    .right-side img {
      width: 350px;
      margin-top: 25px;
      margin-bottom: 0px;
      padding: 10px;
    }

    .right-side h3 {
      font-family: 'Zen Kaku Gothic Antique', sans-serif;
      font-weight: 700;
      font-size: 27px;
      margin-bottom: 10px;
    }

    .right-side p {
      max-width: 350px;
      font-size: 12px;
      opacity: 0.9;
    }

    @media (max-width: 767px) {
      .right-side {
        clip-path: none;
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
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

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
      }
    }
  </script>
</body>
</html>
