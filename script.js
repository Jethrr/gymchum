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
