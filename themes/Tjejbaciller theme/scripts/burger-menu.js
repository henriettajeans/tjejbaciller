/** @format */

jQuery(document).ready(function () {
  // Function to turn on the overlay
  function on() {
    jQuery(".close-nav").css("display", "block");
  }

  // Function to turn off the overlay
  function off() {
    jQuery(".close-nav").css("display", "none");
  }

  // Open menu
  jQuery(".toggle-nav").click(function (e) {
    jQuery("#menu-primary-menu").slideToggle(500);
    jQuery(".close-nav").addClass("active-close");
    on(); // Turn on overlay when menu opens
    e.preventDefault();
  });

  // Close menu
  jQuery(".close-nav").click(function (e) {
    jQuery("#menu-primary-menu").slideToggle(500);
    jQuery(".close-nav").removeClass("active-close");
    off(); // Turn off overlay when menu closes
    e.preventDefault();
  });
});
