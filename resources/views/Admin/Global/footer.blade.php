<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Toggle Password Functions (untuk login & change password)
  function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(iconId);
    if (passwordInput && toggleIcon) {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
      }
    }
  }

  // Password Validation (untuk change password)
  const newPassword = document.getElementById('new_password');
  const confirmPassword = document.getElementById('confirm_password');
  const iconNew = document.getElementById('iconNew');
  const iconConfirm = document.getElementById('iconConfirm');

  if (newPassword) {
    newPassword.addEventListener('input', validatePassword);
  }

  if (confirmPassword) {
    confirmPassword.addEventListener('input', validateConfirmPassword);
  }

  function validatePassword() {
    const password = newPassword.value;
    const wrapper = newPassword.closest('.input-wrapper');
    const lengthCheck = password.length >= 8;
    const upperCheck = /[A-Z]/.test(password);
    const lowerCheck = /[a-z]/.test(password);
    const specialCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    const numberCheck = /[0-9]/.test(password);

    const lengthEl = document.getElementById('lengthCheck');
    const upperEl = document.getElementById('upperCheck');
    const lowerEl = document.getElementById('lowerCheck');
    const specialEl = document.getElementById('specialCheck');
    const numberEl = document.getElementById('numberCheck');

    if (lengthEl) lengthEl.classList.toggle('text-success', lengthCheck);
    if (upperEl) upperEl.classList.toggle('text-success', upperCheck);
    if (lowerEl) lowerEl.classList.toggle('text-success', lowerCheck);
    if (specialEl) specialEl.classList.toggle('text-success', specialCheck);
    if (numberEl) numberEl.classList.toggle('text-success', numberCheck);

    const allValid = lengthCheck && upperCheck && lowerCheck && specialCheck && numberCheck;

    if (wrapper && iconNew) {
      wrapper.style.borderBottomColor = allValid ? '#28a745' : '#dc3545';
      iconNew.style.color = allValid ? '#28a745' : '#dc3545';
    }

    validateConfirmPassword();
  }

  function validateConfirmPassword() {
    if (!confirmPassword || !newPassword) return;
    
    const wrapperConfirm = confirmPassword.closest('.input-wrapper');
    const confirmVal = confirmPassword.value;
    const newVal = newPassword.value;

    if (wrapperConfirm && iconConfirm) {
      if (confirmVal && confirmVal === newVal) {
        wrapperConfirm.style.borderBottomColor = '#28a745';
        iconConfirm.style.color = '#28a745';
      } else if (confirmVal && confirmVal !== newVal) {
        wrapperConfirm.style.borderBottomColor = '#dc3545';
        iconConfirm.style.color = '#dc3545';
      } else {
        wrapperConfirm.style.borderBottomColor = '#ccc';
        iconConfirm.style.color = '#000';
      }
    }
  }

  // Sidebar Navigation
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.sidebar .nav-link');

    navLinks.forEach(link => {
      link.addEventListener('click', function () {
        // Remove active class from all links
        navLinks.forEach(l => l.classList.remove('active'));
        
        // Add active class to clicked link
        this.classList.add('active');

        // Get page name
        const page = this.dataset.page;
        
        // Simple alert for demo (ganti dengan routing nanti)
        if (page === 'logout') {
          if (confirm('Apakah Anda yakin ingin logout?')) {
            alert('Logout berhasil!');
            // window.location.href = '/logout'; // uncomment untuk routing
          }
        } else {
          console.log('Navigate to:', page);
          // window.location.href = '/' + page; // uncomment untuk routing
        }
      });
    });

    // Set active based on current URL (optional)
    const currentUrl = window.location.pathname;
    navLinks.forEach(link => {
      const page = link.dataset.page;
      if (currentUrl.includes(page)) {
        navLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
      }
    });
  });
</script>
</body>
</html>