
const cards = document.getElementsByName("product-card")
cards.forEach(card => {
    card.addEventListener("click",  (e) => {
        const productId = (e.currentTarget.id)
        window.location.href = `product.php?id=${productId}` 
        
    })
});


formButton = document.getElementById("form_btn")
formButton.addEventListener("click", (e) => {
    e.preventDefault()
    const form = Array.from(document.getElementsByName("categoria")).filter( cat => cat.checked)
    const categorias = form.map(e => e.defaultValue)
    const url = window.location.href
    const newUrl = createUrl(url,categorias)
    window.location.href = newUrl
})



const createUrl = (url,categorias) => {
        
        if(url.includes("&ca") || url.includes("?ca")) {
            newUrl =  url.replace(/ria=.*/g,`ria=${categorias}`) 
        }
        
        else if(url.includes("?page"))  {
            console.log("HERE")
            newUrl = url.slice(0, url.indexOf(`?page`)) + `?categoria=${categorias}`
        }
        else if(url.includes("&page"))  {
            newUrl = url.slice(0,url.indexOf(`&page`)) + `&categoria=${categorias}`
        }
        else {
            newUrl = url.includes("?q") ? url.concat(`&categoria=${categorias}`) : url.concat(`?categoria=${categorias}`) 
        }    
    return newUrl
}
