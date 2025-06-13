let prevScrollPos = window.pageYOffset;
const navbar = document.getElementById("mainNavbar");

window.addEventListener("scroll", () => {
  const currentScrollPos = window.pageYOffset;

  if (currentScrollPos > prevScrollPos && currentScrollPos > 100) {
    // Scroll ke bawah => sembunyikan navbar
    navbar.style.top = "-100px";
  } else {
    // Scroll ke atas => tampilkan navbar
    navbar.style.top = "0";
  }

  prevScrollPos = currentScrollPos;
});

