
const getNotification = async () => {
    const res = await fetch("api/fetchNotifications.php", {
        method: "GET"
    })
    const data = await res.json();

    return data;
}

const notificationsList = document.getElementsByClassName("notifications")[0]
const notificacionCount = document.getElementsByClassName("notif-number")[0]

const loadNotifications = async () => {

  
        const notifications = await getNotification()
        notificationsList.innerHTML = notifications.notification
        notificacionCount.innerHTML = notifications.count
        
        setTimeout(loadNotifications,5000)

    
}

loadNotifications()
