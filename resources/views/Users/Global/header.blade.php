<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'CNN Indonesia Universe' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <link rel="shortcut icon" href="{{ asset('uploads/assets/favicon.ico') }}" type="image/x-icon">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2E003E, #0F0F0F);
      color: #fff;
      overflow-x: hidden;
    }

    footer i {
      transition: transform 0.2s ease, color 0.2s ease;
    }

    footer i:hover {
      transform: scale(1.2);
      color: #ff0044;
    }
  </style>
</head>
<body>
