
const cards = document.getElementsByName("product-card")
cards.forEach(card => {
    card.addEventListener("click",  (e) => {
        const productId = (e.currentTarget.id)
        window.location.href = `product.php?id=${productId}` 
        
    })
});