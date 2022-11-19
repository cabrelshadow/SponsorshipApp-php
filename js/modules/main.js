const FrontMain = () => {
  /*=============== LINK ACTIVE ===============*/
  const linkColor = document.querySelectorAll(".nav__link");

  function colorLink() {
    linkColor.forEach((l) => l.classList.remove("active-link"));
    this.classList.add("active-link");
  }

  linkColor.forEach((l) => l.addEventListener("click", colorLink));

  /*=============== SHOW HIDDEN MENU ===============*/
  const showMenu = (toggleId, navbarId) => {
    const toggle = document.getElementById(toggleId),
      navbar = document.getElementById(navbarId);

    if (toggle && navbar) {
      toggle.addEventListener("click", () => {
        /* Show menu */
        navbar.classList.toggle("show-menu");
        /* Rotate toggle icon */
        toggle.classList.toggle("rotate-icon");
      });
    }
  };
  showMenu(
    "nav-toggle",
    "nav"
  )(
    // slider container

    function () {
      var slideContainer = $(".slide-container");

      slideContainer.slick();

      $(".clash-card__image img").hide();
      $(".slick-active").find(".clash-card img").fadeIn(200);

      // On before slide change
      slideContainer.on(
        "beforeChange",
        function (event, slick, currentSlide, nextSlide) {
          $(".slick-active").find(".clash-card img").fadeOut(1000);
        }
      );

      // On after slide change
      slideContainer.on("afterChange", function (event, slick, currentSlide) {
        $(".slick-active").find(".clash-card img").fadeIn(200);
      });
    }
  )();

  // slider container
};

export default FrontMain;
