const add = document.getElementById("add-btn")

add.addEventListener("click", (e) => {
    e.preventDefault()


    const form = Array.from(document.forms["carrito"])
    const formData = new FormData()
    formData.append("id",form[1].value)
    formData.append("quantity",form[0].value)
    formData.append("name",form[2].value)

    fetch("./api/acarrito.php", {
        method : "post",
        body : formData,
    })
})