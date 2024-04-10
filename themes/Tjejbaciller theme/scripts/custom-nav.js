/**
 * Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon
 *
 * @format
 */

function myFunction() {
  var x = document.getElementById("menu-primary-menu");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
