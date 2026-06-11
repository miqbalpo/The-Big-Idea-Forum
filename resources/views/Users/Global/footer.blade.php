
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function animateValue(el, start, end, duration) {
    let startTime = null;
    const step = (timestamp) => {
      if (!startTime) startTime = timestamp;
      const progress = Math.min((timestamp - startTime) / duration, 1);
      const value = (progress * (end - start) + start).toFixed(end % 1 === 0 ? 0 : 1);
      el.querySelector('.number').textContent = value;
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = parseFloat(counter.getAttribute('data-target'));
        if (!counter.classList.contains('counted')) {
          animateValue(counter, 0, target, 1800);
          counter.classList.add('counted');
        }
      }
    });
  }, { threshold: 0.3 });

  document.querySelectorAll('.stat').forEach(el => observer.observe(el));
</script>

</body>
</html>
