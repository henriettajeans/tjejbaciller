/** @format */

jQuery(document).ready(function () {
  jQuery(".toggle-nav").click(function (e) {
    jQuery("#menu-primary-menu").slideToggle(500);
    jQuery(".close-nav").addClass("active-close");

    e.preventDefault();
  });
  //Close
  jQuery(".close-nav").click(function (e) {
    jQuery("#menu-primary-menu").slideToggle(500);
    jQuery(".close-nav").removeClass("active-close");

    e.preventDefault();
  });
});
