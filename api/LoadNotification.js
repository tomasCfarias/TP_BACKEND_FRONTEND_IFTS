const notificationMenu = document.getElementsByClassName("notif-menu")[0]

const getNewSalesNotifications = async () => {
    const res = await fetch("api/fetchNewSales.php", {
        method: "GET"
    })
    const data = await res.json();

    return data;
}

const getLowStockNotifications = async () => {
    const res = await fetch("api/fetchLowStockProducts.php", {
        method: "GET"
    })
    const data = await res.json();

    return data;
}

const notificationsList = document.getElementsByClassName("notifications")[0]
const notificacionCount = document.getElementsByClassName("notif-number")[0]

const loadNotifications = async () => {

  
        const newSalesNotifications = await getNewSalesNotifications()
        const lowStockNotifications = await getLowStockNotifications()

        if (notificationMenu.classList.contains("hideNotif")) {
        if (newSalesNotifications.count == 0 && lowStockNotifications.count == 0) {
            notificationsList.innerHTML = '<li>No hay nuevas notificaciones.</li>'
        }

        else {
            notificationsList.innerHTML = ""
            newSalesNotifications.count > 0 && newSalesNotifications.notification.forEach(element => {
                
                const div = document.createElement("div")
                div.innerHTML = element
                notificationsList.prepend(div)
            });
            
            lowStockNotifications.count > 0 && lowStockNotifications.notification.forEach(e => {
                const div = document.createElement("div")
                div.innerHTML = e
                notificationsList.prepend(div)
            })
            notificacionCount.innerHTML = notificationsList.children.length
        }
    }
        setTimeout(loadNotifications,7000)

    
}

loadNotifications()
