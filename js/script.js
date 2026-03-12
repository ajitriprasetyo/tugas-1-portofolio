document.addEventListener("DOMContentLoaded", () => {
  console.log("Website Portofolio Siap!");

  // Smooth scroll statis navigation
  const navLinks = document.querySelectorAll("nav ul li a");
  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href").substring(1);
      const targetElement = document.getElementById(targetId);
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 70, // 70px offset for fixed header
          behavior: "smooth",
        });
      }
    });
  });

  // 1. AJAX Form Submit untuk Form Kontak
  const contactForm = document.getElementById("contact-form");
  const formResponse = document.getElementById("form-response");

  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault(); // Mencegah form reload halaman

      // Ambil data dari input field
      const formData = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value,
      };

      // Tampilkan tulisan sending
      formResponse.innerHTML = '<p class="loading">Mengirim pesan...</p>';

      // Kirim via AJAX Post (Fetch API)
      fetch("php/contact.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      })
        .then((response) => response.json())
        .then((result) => {
          if (result.status === "success") {
            formResponse.innerHTML = `<p class="success">${result.message}</p>`;
            contactForm.reset(); // Kosongkan form setelah sukses
          } else {
            formResponse.innerHTML = `<p class="error">${result.message}</p>`;
          }
        })
        .catch((error) => {
          formResponse.innerHTML = `<p class="error">Terjadi kesalahan pada server.</p>`;
        });
    });
  }
});
