<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>New Password | CNN Community</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Zen+Kaku+Gothic+Antique:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
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
    .form-control {
      border: none;
      border-bottom: 1px solid #ccc;
      border-radius: 0;
      padding: 10px 0;
      font-size: 14px;
      box-shadow: none !important;
    }
    .form-control:focus {
      border-color: #CC1417;
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

    .modal-content {
      border-radius: 20px;
      text-align: left;
      padding: 30px;
    }

    .modal-content p {
      font-size: 14px;
      line-height: 100%;
    }

    .modal-content button {
      font-size: 14px;
      font-weight: 500;
    }

    .check-circle {
      color: #CC1417;
      width: 64px;
      height: 64px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;     
      margin: 0 0 20px 0;     
      font-size: 60px;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">
      <!-- LEFT SIDE (unchanged) -->
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

      <!-- RIGHT SIDE (Forgot Password section) -->
      <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center bg-white p-4 p-md-5">
        <div class="mb-4 w-100" style="max-width:500px;">
          <div class="d-flex flex-column align-items-start text-start mb-5">
          <div class="mb-3">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="60" height="60" rx="30" fill="#F1F6FF"/>
              <g clip-path="url(#clip0_485_1300)">
                <path d="M36.6666 24.6667H35.3333V22.1467C35.3333 20.7322 34.7714 19.3756 33.7712 18.3755C32.771 17.3753 31.4145 16.8134 30 16.8134C28.5855 16.8134 27.2289 17.3753 26.2287 18.3755C25.2285 19.3756 24.6666 20.7322 24.6666 22.1467V24.6667H23.3333C22.2724 24.6667 21.255 25.0881 20.5049 25.8383C19.7547 26.5884 19.3333 27.6058 19.3333 28.6667V39.3334C19.3333 40.3942 19.7547 41.4116 20.5049 42.1618C21.255 42.9119 22.2724 43.3334 23.3333 43.3334H36.6666C37.7275 43.3334 38.7449 42.9119 39.4951 42.1618C40.2452 41.4116 40.6666 40.3942 40.6666 39.3334V28.6667C40.6666 27.6058 40.2452 26.5884 39.4951 25.8383C38.7449 25.0881 37.7275 24.6667 36.6666 24.6667ZM27.3333 22.1467C27.3154 21.4204 27.5859 20.7166 28.0857 20.1894C28.5855 19.6621 29.2738 19.3543 30 19.3334C30.7262 19.3543 31.4145 19.6621 31.9143 20.1894C32.414 20.7166 32.6846 21.4204 32.6666 22.1467V24.6667H27.3333V22.1467ZM38 39.3334C38 39.687 37.8595 40.0261 37.6095 40.2762C37.3594 40.5262 37.0203 40.6667 36.6666 40.6667H23.3333C22.9797 40.6667 22.6406 40.5262 22.3905 40.2762C22.1405 40.0261 22 39.687 22 39.3334V28.6667C22 28.3131 22.1405 27.9739 22.3905 27.7239C22.6406 27.4738 22.9797 27.3334 23.3333 27.3334H36.6666C37.0203 27.3334 37.3594 27.4738 37.6095 27.7239C37.8595 27.9739 38 28.3131 38 28.6667V39.3334Z" fill="#CC1417"/>
                <path d="M30 30C29.2089 30 28.4355 30.2346 27.7777 30.6741C27.1199 31.1136 26.6072 31.7384 26.3045 32.4693C26.0017 33.2002 25.9225 34.0044 26.0769 34.7804C26.2312 35.5563 26.6122 36.269 27.1716 36.8284C27.731 37.3878 28.4437 37.7688 29.2196 37.9231C29.9956 38.0775 30.7998 37.9983 31.5307 37.6955C32.2616 37.3928 32.8864 36.8801 33.3259 36.2223C33.7654 35.5645 34 34.7911 34 34C34 32.9391 33.5786 31.9217 32.8284 31.1716C32.0783 30.4214 31.0609 30 30 30ZM30 35.3333C29.7363 35.3333 29.4785 35.2551 29.2592 35.1086C29.04 34.9621 28.8691 34.7539 28.7682 34.5102C28.6672 34.2666 28.6408 33.9985 28.6923 33.7399C28.7437 33.4812 28.8707 33.2437 29.0572 33.0572C29.2437 32.8707 29.4812 32.7437 29.7399 32.6923C29.9985 32.6408 30.2666 32.6672 30.5102 32.7682C30.7539 32.8691 30.9621 33.04 31.1086 33.2592C31.2551 33.4785 31.3333 33.7363 31.3333 34C31.3333 34.3536 31.1929 34.6928 30.9428 34.9428C30.6928 35.1929 30.3536 35.3333 30 35.3333Z" fill="#CC1417"/>
              </g>
              <defs>
                <clipPath id="clip0_485_1300">
                  <rect width="32" height="32" fill="white" transform="translate(14 14)"/>
                </clipPath>
              </defs>
            </svg>
            </div>
              <h3 class="fw-bold mb-1" style="font-family:'Zen Kaku Gothic Antique', sans-serif;">Set New Password</h3>
              <p class="text-secondary mb-1">Enter your new password to complete the reset process</p>
            </div>
          <form method="POST" action="/reset-password" id="passwordForm" class="w-100">
            @csrf
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="mb-4">
            <label for="password" class="form-label">New Password</label>
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="New Password" required>
                  </div>
            </div>
            <div class="mb-4">
              <label for="confirmpassword" class="form-label">Confirm New Password</label>
              <div class="input-group">
                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm New Password" required>
              </div>
            </div>
            <input type="hidden" name="email" id="email" value="{{ session('email') }}">
            <button type="submit" class="btn btn-red w-100 py-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="check-circle">
        <i class="fa-solid fa-circle-check"></i>
      </div>
      <h4 class="fw-bold mb-2">Your Password<br>Successfully Changed</h4>
      <p class="text-secondary mb-4">Sign in to your account with your new password</p>
      <a style="color: #fff; text-decoration: none;" href="{{ route('login') }}"><button class="btn btn-red w-100" data-bs-dismiss="modal">Sign In</button></a>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   @if(session('show_success_modal'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('successModal'));
            modal.show();
        });
    </script>
  @endif

</body>
</html>
