const logo = document.getElementById("img-logo");
const userProfile = document.getElementById("userProf");
const btnBook = document.getElementById("book-button");

logo.addEventListener("click", () => {
  window.location.href = "index.php";
});

function openBookingsTab(firstname) {
  window.location.href = "bookings.php?firstname=" + firstname;
}

function openCancel(coach, appointmentId) {
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

function openDropDown() {
  var dropdown = document.getElementById("#popup");
  dropdown.classList.toggle("hidden");
}

document.addEventListener("click", function (event) {
  var dropdown = document.getElementById("popup");
  if (
    !event.target.matches(".more") &&
    !event.target.matches("#popup") &&
    !event.target.matches("#popup *")
  ) {
    dropdown.classList.add("hidden");
  }
});
