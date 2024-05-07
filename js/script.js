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

function openBookingsTab(firstname) {
  window.location.href = "bookings.php?firstname=" + firstname;
}

function openCancel(coach) {
  window.location.href = "bookings-data.php?coach=" + coach;
}

document.addEventListener("DOMContentLoaded", function () {
  var profileImage = document.getElementById("userImage");
  var dropdown = document.getElementById("dropdown");

  profileImage.addEventListener("click", function (event) {
    dropdown.classList.toggle("hidden");
    event.stopPropagation();
  });

  document.addEventListener("click", function (event) {
    if (!event.target.matches(".user-profile")) {
      dropdown.classList.add("hidden");
    }
  });
});

let popUp = document.getElementById("popup");

function openPopUpBtn() {
  popUp.classList.add("openPopUp");
}

function closePopUpBtn() {
  popUp.classList.remove("openPopUp");
}
