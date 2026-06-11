<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OTP Verification | CNN Indonesia Community</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Zen+Kaku+Gothic+Antique:wght@400;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: "Inter", sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .left-side {
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      padding: 60px 80px;
      text-align: left;
    }

    .email-icon {
      width: 60px;
      height: 60px;
      background-color: #f3f6ff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }

    .email-icon i {
      color: #cc0000;
      font-size: 26px;
    }

    .left-side h2 {
      font-weight: 700;
      color: #222;
      margin-bottom: 5px;
      font-size: 32px;
    }

    .left-side p {
      color: #4a4a4a;
      font-size: 14px;
      margin-bottom: 30px;
    }

    .otp-section {
      width: 100%;
      max-width: 400px;
    }

    .otp-inputs {
      display: flex;
      justify-content: space-between;
      margin-bottom: 25px;
      width: 100%;
    }

    .otp-inputs input {
      width: 48px;
      height: 48px;
      border: 1.5px solid #d6daf0;
      border-radius: 50%;
      text-align: center;
      font-size: 18px;
      font-weight: 500;
      transition: all 0.2s;
    }

    .otp-inputs input:focus {
      border-color: #cc0000;
      outline: none;
      box-shadow: 0 0 4px rgba(204, 0, 0, 0.4);
    }

    .btn-verify {
      background-color: #cc0000;
      font-family: "Zen Kaku Gothic Antique", sans-serif;
      color: #fff;
      border-radius: 25px;
      border: none;
      padding: 10px;
      font-weight: 600;
      width: 100%;
      box-shadow: 0 4px 10px rgba(204, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    .btn-verify:hover {
      background-color: #b30000;
      transform: translateY(-2px);
    }

    .resend {
      margin-top: 15px;
      font-size: 14px;
      color: #777;
      text-align: center;
      width: 100%;
      display: block;
    }

    #resend-text {
      color: #777;
      cursor: default;
      font-weight: 500;
      color: #cc0000;
    }

    #resend-text.active {
      color: #cc0000;
      cursor: pointer;
      font-weight: 600;
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
      font-family: "Zen Kaku Gothic Antique", sans-serif;
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

      .left-side {
        align-items: center;
        text-align: center;
        padding: 40px 30px;
      }

      .email-icon {
        margin-left: auto;
        margin-right: auto;
      }

      .otp-inputs {
        justify-content: center;
      }

      .left-side h2 {
        font-size: 26px;
      }

      .left-side p {
        font-size: 13px;
      }

      .btn-verify {
        font-size: 15px;
        padding: 10px;
      }

      .resend {
        font-size: 13px;
      }
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

      <div class="col-12 col-md-6 left-side">
        <div class="email-icon">
          <i class="fa-regular fa-envelope"></i>
        </div>
        <Form method="POST" action="/verify-otp" class="container-fluid">
        <h2>OTP Verification</h2>
          <p>Check your email to see the verification code</p>

          <div class="otp-section">
            <div class="otp-inputs">
              <input type="text" maxlength="1" />
              <input type="text" maxlength="1" />
              <input type="text" maxlength="1" />
              <input type="text" maxlength="1" />
              <input type="text" maxlength="1" />
              <input type="text" maxlength="1" />
            </div>

            @csrf
            @if ($errors->any())
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            <input type="hidden" name="otp_code" id="otp_code" />
            <input type="hidden" name="email" id="email" value="{{ session('email') }}">

            <button class="btn btn-verify">Verify</button>

            <p class="resend">
              <span href="/resend-otp" id="resend-text">Resend code in <span id="timer">00:59</span></span>
            </p>
          </div>
        </Form>
      </div>

      <div class="col-md-6 d-none d-md-flex right-side">
        <div>
          <img
            src="https://upload.wikimedia.org/wikipedia/commons/6/66/CNN_International_logo.svg"
            alt="CNN Logo" />
          <h3>Online Community For<br />CNN Indonesia</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt.
          </p>
        </div>
      </div>
    </div>
  </div>

  <script>
    let time = 59;
    const timerDisplay = document.getElementById("timer");
    const resendText = document.getElementById("resend-text");

    function startCountdown() {
      resendText.classList.remove("active");
      resendText.innerHTML = `Resend code in <span id="timer">00:59</span>`;
      time = 59;

      const countdown = setInterval(() => {
        const minutes = String(Math.floor(time / 60)).padStart(2, "0");
        const seconds = String(time % 60).padStart(2, "0");
        document.getElementById(
          "timer"
        ).textContent = `${minutes}:${seconds}`;
        time--;

        if (time < 0) {
          clearInterval(countdown);
          resendText.textContent = "Resend code";
          resendText.classList.add("active");

          resendText.onclick = () => {
            console.log("Kode OTP dikirim ulang!");
            startCountdown();
          };
        }
      }, 1000);
    }

    startCountdown();

    const otpInputs = document.querySelectorAll('.otp-inputs input');
    const otpHidden = document.getElementById('otp_code');

    otpInputs.forEach((input, index) => {
      input.addEventListener('input', () => {
        input.value = input.value.replace(/[^0-9]/g, '');

        if (input.value && index < otpInputs.length - 1) {
          otpInputs[index + 1].focus();
        }

        const otp = Array.from(otpInputs).map(i => i.value).join('');
        otpHidden.value = otp;
        console.log('OTP sekarang:', otpHidden.value);
      });

      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && index > 0) {
          otpInputs[index - 1].focus();
        }
      });
    });
  </script>
</body>

</html>