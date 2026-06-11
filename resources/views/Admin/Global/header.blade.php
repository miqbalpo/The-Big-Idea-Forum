<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event | CNN Indonesia Community</title>
  <link rel="shortcut icon" href="{{ asset('uploads/assets/favicon.ico') }}" type="image/x-icon">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Zen+Kaku+Gothic+Antique:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
    font-family: 'Inter', sans-serif;
    background: url('/uploads/assets/CNNBG.png') center/cover no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-color: #f5f5f5; /* fallback color kalau gambar gagal load */
    overflow-x: hidden;
  }

  /* Optional overlay efek halus biar tulisan tetap jelas */
  

    /* MAIN CONTENT */
    .main-content {
      margin-left: 80px;
      padding: 30px;
      min-height: 100vh;
      transition: margin-left 0.3s ease;
    }

    .content-header {
      
      padding: 25px 30px;
      border-radius: 12px;
      
      margin-bottom: 30px;
    }

    .content-header h2 {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      color: #222;
      margin: 0;
      font-size: 28px;
    }

    .event-container {
      background-color: #f1f1f1;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      padding: 30px;
    }

    .section-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .section-title h5 {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      color: #333;
      margin: 0;
    }

    .btn-add-event {
      background-color: #CC1417;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-add-event:hover {
      background-color: #b51215;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(204, 20, 23, 0.3);
    }

    .table {
      font-family: 'Poppins', sans-serif;
    }

    .table thead {
      background-color: #f1f1f1;
    }

    .table thead th {
      font-weight: 600;
      color: #495057;
      border-bottom: 2px solid #dee2e6;
      padding: 15px;
    }

    .table tbody td {
      padding: 15px;
      vertical-align: middle;
    }

    .table tbody tr {
      transition: all 0.2s ease;
    }

    .table tbody tr:hover {
      background-color: #f8f9fa;
    }

    .badge {
      padding: 6px 12px;
      border-radius: 6px;
      font-weight: 500;
      font-size: 12px;
    }

    .btn-sm {
      padding: 6px 12px;
      border-radius: 6px;
      transition: all 0.2s ease;
    }

    .btn-sm:hover {
      transform: scale(1.05);
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: #999;
    }

    .empty-state i {
      font-size: 64px;
      margin-bottom: 20px;
      opacity: 0.3;
    }

    @media (max-width: 768px) {
      .main-content {
        margin-left: 200px;
        padding: 15px;
      }
    }

    @media (max-width: 576px) {
      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>