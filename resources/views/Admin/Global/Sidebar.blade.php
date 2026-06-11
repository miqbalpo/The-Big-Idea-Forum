<!-- SIDEBAR -->
<div class="sidebar">
  <div class="sidebar-header text-center py-3">
    <img src="{{ asset('uploads/assets/IDEA.png') }}" alt="Sidebar Logo" class="sidebar-logo img-fluid">
  </div>

  <div class="sidebar-section">
    <p class="sidebar-section-title">CONTENT</p>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="{{ route('event.index') }}" class="nav-link" data-tooltip="Event">
          <i class="bi bi-calendar-event"></i>
          <span>Event Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('moderator.index') }}" class="nav-link {{ Request::is('admin/moderator') ? 'active' : '' }}" data-tooltip="Event">
          <i class="bi bi-mic"></i>
          <span>Moderator & Founder</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('gallery.index') }}" class="nav-link {{ Request::is('admin/gallery') ? 'active' : '' }}" data-tooltip="MediaGallery">
          <i class="bi bi-images"></i>
          <span>Media Gallery</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('videos.index') }}" class="nav-link {{ Request::is('admin/videos') ? 'active' : '' }}" data-tooltip="Videos">
          <i class="bi bi-play-btn-fill"></i>
          <span>Videos</span>
        </a>
      </li>
      @if(Auth::check() && Auth::user()->email === 'superadmin')
      <li class="nav-item">
        <a href="{{ route('adminmanager.index') }}" class="nav-link {{ Request::is('admin/adminmanager') ? 'active' : '' }}" data-tooltip="Admin">
          <i class="bi bi-person-circle"></i>
          <span>Admin</span>
        </a>
      </li>
      @endif
    </ul>
  </div>

  <div class="sidebar-section">
    <p class="sidebar-section-title">ACCOUNT</p>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link" data-tooltip="Profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-tooltip="Settings">
          <i class="bi bi-gear"></i>
          <span>Settings</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" data-tooltip="Logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- STYLE -->
<style>
/* Sidebar Container */
.sidebar {
  background-color: #CC1417;
  height: 100vh;
  width: 80px;
  position: fixed;
  left: 0;
  top: 0;
  padding: 20px 10px;
  color: white;
  z-index: 1000;
  transition: width 0.3s ease;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow-y: auto; /* ✅ Tambahkan scroll vertikal */
  overflow-x: hidden;
  scrollbar-width: thin; /* Firefox */
  scrollbar-color: rgba(255,255,255,0.3) transparent;
}

/* Scrollbar untuk Chrome, Edge, dan Safari */
.sidebar::-webkit-scrollbar {
  width: 6px;
}
.sidebar::-webkit-scrollbar-thumb {
  background-color: rgba(255,255,255,0.3);
  border-radius: 10px;
}
.sidebar::-webkit-scrollbar-thumb:hover {
  background-color: rgba(255,255,255,0.5);
}

/* Sidebar hover */
.sidebar:hover {
  width: 250px;
}

/* Logo di sidebar */
.sidebar-logo {
  width: 50px;
  height: auto;
  border-radius: 10px;
  transition: all 0.3s ease;
}
.sidebar:hover .sidebar-logo {
  width: 120px;
  transform: translateX(0);
}

.sidebar-header {
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.3s ease;
  margin-bottom: 20px;
}

/* Section title */
.sidebar-section-title {
  color: rgba(255, 255, 255, 0.6);
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1px;
  margin-bottom: 10px;
  margin-top: 20px;
  padding-left: 15px;
  opacity: 0;
  transition: opacity 0.2s ease;
}
.sidebar:hover .sidebar-section-title {
  opacity: 1;
  transition-delay: 0.1s;
}

.nav-link {
  padding: 12px 15px;
  border-radius: 8px;
  transition: all 0.3s ease;
  color: white;
  display: flex;
  align-items: center;
  text-decoration: none;
}
.nav-link:hover {
  background-color: rgba(255, 255, 255, 0.1);
}
.nav-link.active {
  background-color: rgba(255, 255, 255, 0.2);
  font-weight: 600;
}

.nav-link i {
  min-width: 24px;
  margin-right: 12px;
  font-size: 20px;
}

.nav-link span {
  opacity: 0;
  transition: opacity 0.2s ease;
}
.sidebar:hover .nav-link span {
  opacity: 1;
}

/* Tooltip saat sidebar collapsed */
.nav-link::after {
  content: attr(data-tooltip);
  position: absolute;
  left: 70px;
  background-color: #000;
  color: white;
  padding: 8px 12px;
  border-radius: 6px;
  font-size: 13px;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.2s ease;
}
.sidebar:not(:hover) .nav-link:hover::after {
  opacity: 1;
}
.sidebar:hover .nav-link::after {
  display: none;
}
</style>
