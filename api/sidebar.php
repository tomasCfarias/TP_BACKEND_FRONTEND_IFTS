    <ul class="sidebar">
        <li><button class="closebtn">X</button></li>
        <li><a href="mostrarProductos.php">Productos</a></li>
        <li><a href="subirProducto.php">Nuevo Producto</a></li>
        <li><a href="#">Ventas</a></li>
        <li><a href="#">Estadisticas</a></li>
        <li class="tiendabtn"><a href="articulos.php"><h3>Ir a la tienda</h3></a></li>
    </ul>


<style>
    .sidebar {
        background-color: whitesmoke;
        height: 100%;
        width: 200px;
        transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
    }

    .sidebar>li {
    padding-left: 15px;
    margin-top: 1rem;
    overflow: hidden;
    }
    .sidebar>li>button {
    padding-left: 15px;
    margin-top: 0;
    overflow: hidden;
    }

    .sidebar>li:hover {
    scale: 1.05; 
    }
    
   .closebtn {
        border: none;
        margin-left: 120px;
        background-color: inherit;

   }
   .closebtn:hover {
    cursor: pointer;

   }
   @media screen and (max-width: 600px) {
    .sidebar {
      width: 0;
    }
    }
</style>