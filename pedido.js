const form = document.getElementsByClassName("product-list")[0]
const newProduct = document.getElementById("AgregarProducto")

const deleteProduct = document.getElementsByClassName("QuitarProducto")[0]
const options = Array.from(document.getElementsByTagName("option")).map((option) => option.innerHTML)

const idProveedor = document.getElementById("proveedor").value
const submitBtn = document.getElementById("user_form_btn")


const addDeleteButton = () => {
    const delButtons = Array.from(document.getElementsByClassName("QuitarProducto"))
    delButtons.forEach( button => {
        button.addEventListener("click", (e) => {
            e.preventDefault()
            button.parentNode.remove()
        })
    });
    }

addDeleteButton(deleteProduct)

let count = 1

newProduct.addEventListener("click", (e) => {
    e.preventDefault()

    
    form.innerHTML += `<div class="product">

    <input type="hidden" name="list_id" id="${count}">
    <label for="nombre">Nombre</label>
    <select id="nombre">
    
    ${options.map((option) => `<option value${option}>${option}</option>`)}
    </select>
    <label for="cantidad">Cantidad</label>
    <input type="text" name="cantidad" id="cantidad">
    <button class="QuitarProducto" id = p-${count}>Quitar Producto</button>
</div>`

    addDeleteButton(document.getElementById(`p-${count}`))
    count++
})

const guardarPedido = async () => {

    const productName = Array.from(document.getElementsByTagName("select"))
    const productQuantity = document.getElementsByName("cantidad")
    
    let listaPedido = []
    
    if (!Array.from(productQuantity).some(p => p.value == "")) {

        productName.map((product) => {
            listaPedido.push({'producto' : (product.selectedOptions[0].innerText)})
        }) 
        
        let i = 0
        productQuantity.forEach(p => {
            listaPedido[i] = {...listaPedido[i], 'cantidad': p.value}
            i++
        })
        
        
        await fetch(`./api/guardarPedido.php?id=${idProveedor}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(listaPedido)
        }).then(
            window.location.href ="proveedores.php"
        )
        
    }
    else {
        alert("Complete todos los campos.")
    }
    }


submitBtn.addEventListener("click", (e) => {
    e.preventDefault()
    guardarPedido()
})