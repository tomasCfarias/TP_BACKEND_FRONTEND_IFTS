const add = document.getElementById("add-btn")
const stock = document.getElementById("stock")


add.addEventListener("click", (e) => {
    e.preventDefault()
    
    
    const form = Array.from(document.forms["carrito"])
    const formData = new FormData()
    
    console.log(form[0].value)
    if(Number(form[0].value) <= Number(stock.max) || Number(form[0].value) > 0) {
    formData.append("quantity",form[0].value)
    formData.append("id",form[1].value)
    formData.append("price",form[2].value)
    formData.append("name",form[3].value)


    fetch("./api/acarrito.php", {
        method : "post",
        body : formData,
    })
    }
})