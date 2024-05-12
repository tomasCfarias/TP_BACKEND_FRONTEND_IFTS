const botonesMarcarEnvio = document.querySelectorAll(".marcar-envio");
const botonesMarcarRecibido = document.querySelectorAll(".marcar-recibido");
const botonesMarcarNoEnvio = document.querySelectorAll(".marcar-no-enviado");
const botonesMarcarNoRecibido = document.querySelectorAll(".marcar-no-recibido");

function generarFecha(){
    const ahora = new Date();
    const dia = String(ahora.getDate()).padStart(2, '0');
    const mes = String(ahora.getMonth() + 1).padStart(2, '0');
    const anio = ahora.getFullYear();
    return `${anio}-${mes}-${dia}`;
}

function guardarFecha(fila, columna, fecha) {
    fetch("./api/guardarFechaVentas.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ fila: fila, columna: columna, fecha: fecha })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Error al guardar la fecha");
        }
        console.log("Fecha guardada exitosamente ", fila, columna, fecha);
        setTimeout(() => { //recarga la pagina automaticamente
            location.reload();
        }, 1000);
    })
    .catch(error => {
        console.error("Error:", error);
    });
}


botonesMarcarEnvio.forEach(boton => {
    boton.addEventListener('click', () => {
        const fila = boton.closest('tr').dataset.id; // Obtener el ID de la fila padre del botón
        const fechaActual = generarFecha();
        guardarFecha(fila, 'fechaEnvio', fechaActual); // Guardar la fecha de envío en la base de datos
    });
});

botonesMarcarRecibido.forEach(boton => {
    boton.addEventListener('click', () => {
        const fila = boton.closest('tr').dataset.id; // Obtener el ID de la fila padre del botón
        const fechaActual = generarFecha();
        guardarFecha(fila, 'fechaEntrega', fechaActual); // Guardar la fecha de entrega en la base de datos
    });
});


botonesMarcarNoEnvio.forEach(boton => {
    boton.addEventListener('click', () => {
        const fila = boton.closest('tr').dataset.id; // Obtener el ID de la fila padre del botón
        const nuevaFecha = "0000-00-00";
        guardarFecha(fila, 'fechaEnvio', nuevaFecha); // Guardar la fecha de entrega en la base de datos
    });
});

botonesMarcarNoRecibido.forEach(boton => {
    boton.addEventListener('click', () => {
        const fila = boton.closest('tr').dataset.id; // Obtener el ID de la fila padre del botón
        const nuevaFecha = "0000-00-00";
        guardarFecha(fila, 'fechaEntrega', nuevaFecha); // Guardar la fecha de entrega en la base de datos
    });
});

function filtrarVentas(categoria) {

    var filas = document.querySelectorAll('tr[data-id]');
    filas.forEach(function(fila) {
        fila.style.display = 'none';
    });

    
    if (categoria === 'todas') {
        filas.forEach(function(fila) {
            fila.style.display = 'table-row';
        });
    } else {
        var filasCategoria = document.querySelectorAll('.venta-' + categoria);
        filasCategoria.forEach(function(fila) {
            fila.style.display = 'table-row';
        });
    }
}