const logo = document.getElementById("img-logo");
const userProfile = document.getElementById("userProf");
const btnBook = document.getElementById("book-button");

logo.addEventListener("click", () => {
  window.location.href = "index.php";
});

TweenMax.staggerFrom(
  ".form-group",
  1,
  {
    delay: 0.2,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut,
  },
  0.2
);

TweenMax.staggerFrom(
  ".contact-info-container > *",
  1,
  {
    delay: 0,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut,
  },
  0.1
);

document.addEventListener("DOMContentLoaded", function () {
  TweenMax.staggerFrom(
    ".about-us-info-container > *",
    1,
    {
      delay: 0,
      opacity: 0,
      y: 20,
      ease: Expo.easeInOut,
    },
    0.1
  );
});

function toggleDropdown() {
  var dropdownMenu = document.getElementById("dropdownMenu");
  dropdownMenu.classList.toggle("show");
}

function openBookingsTab(firstname) {
  window.location.href = "bookings.php?firstname=" + firstname;
}
