
const cards = Array.from(document.getElementsByClassName("product-card"))
const cardNames =Array.from(document.getElementsByClassName("product-name")).map(card => card.textContent )


cards.forEach(card => {
    card.addEventListener("click",  (e) => {

        const productId = (e.currentTarget.id)
        window.location.href = `sql/product.php?id=${productId}` 
        
    })
});