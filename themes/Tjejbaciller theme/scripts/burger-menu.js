/** @format */

jQuery(document).ready(function () {
  jQuery(".toggle-nav").click(function (e) {
    jQuery("#menu-primary-menu").slideToggle(500);

    e.preventDefault();
  });
});
