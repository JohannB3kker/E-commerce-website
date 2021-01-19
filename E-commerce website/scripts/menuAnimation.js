/* this function allows the user to toggle between hiding and 
showing the drop-down menu links when the drop-down icon is clicked */
function menuToggle() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "inline-block") {
    x.style.display = "none";
  } else {
    x.style.display = "inline-block";
    x.style.height = "400px";
  }
}
