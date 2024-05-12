let btn = document.getElementsByClassName("openbtn")[0]
let closebutton = document.getElementsByClassName("closebtn")[0]
let notification = document.getElementsByClassName("notif")[0]
const notificationNumber = document.getElementsByClassName("notif-number")[0]

btn.addEventListener("click", openNav)
closebutton.addEventListener("click",closeNav)
notification.addEventListener("click",toggleNotificationVisibility)

function openNav() {
    document.getElementsByClassName("sidebar")[0].style.width = "200px";
  }
  

  function closeNav() {
    document.getElementsByClassName("sidebar")[0].style.width = "0";
  }


 
function toggleNotificationVisibility() {
  document.getElementsByClassName("notif-menu")[0].classList.toggle("hideNotif")

  if (Number(notificationNumber.textContent > 0)) {
    setNotified()
  }

}


const setNotified = () => {
  fetch("api/setNotified.php", {
    method: "POST",
    headers: {
      'Access-Control-Allow-Origin': '*'
    }
  }).then(() => 
    notificationNumber.textContent = 0
  )
}