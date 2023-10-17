let button = document.getElementsByClassName("openbtn")[0]
let closebutton = document.getElementsByClassName("closebtn")[0]

button.addEventListener("click", openNav)
closebutton.addEventListener("click",closeNav)

function openNav() {
    document.getElementsByClassName("sidebar")[0].style.width = "200px";
  }
  

  function closeNav() {
    document.getElementsByClassName("sidebar")[0].style.width = "0";
  }