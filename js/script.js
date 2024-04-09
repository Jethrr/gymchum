const logo = document.getElementById("img-logo");

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

window.onclick = function (event) {
  if (!event.target.matches(".user-profile")) {
    var dropdownMenus = document.getElementsByClassName("dropdown-menu");
    for (var i = 0; i < dropdownMenus.length; i++) {
      var openDropdownMenu = dropdownMenus[i];
      if (openDropdownMenu.classList.contains("show")) {
        openDropdownMenu.classList.remove("show");
      }
    }
  }
};
