
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


        notificacionCount.innerHTML = newSalesNotifications.count + lowStockNotifications.count
        notificationsList.innerHTML = ""
        newSalesNotifications.notification.forEach(element => {
            
            const div = document.createElement("div")
            div.innerHTML = element
            notificationsList.prepend(div)
        });

        lowStockNotifications.notification.forEach(e => {
            const div = document.createElement("div")
            div.innerHTML = e
            notificationsList.prepend(div)
        })

        setTimeout(loadNotifications,7000)

    
}

loadNotifications()
