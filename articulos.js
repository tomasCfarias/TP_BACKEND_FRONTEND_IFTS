
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
    const newUrl = url.includes("?q") ? 
        url.includes("&") ? url.replace(/ria=.*/g,`ria=${categorias}`) : url.concat(`&categoria=${categorias}`) 
        : url.concat(`?categoria=${categorias}`)
    return newUrl
}
