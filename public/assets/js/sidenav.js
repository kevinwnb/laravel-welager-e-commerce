/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.left = "0px";
    document.getElementById("body").classList.add("overflow-hidden");
    document.getElementById("absoluter").style.display = "block";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.left = "-300px";
    document.getElementById("body").classList.remove("overflow-hidden");
    document.getElementById("absoluter").style.display = "none";
}
