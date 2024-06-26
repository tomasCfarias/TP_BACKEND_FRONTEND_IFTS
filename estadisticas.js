document.addEventListener("DOMContentLoaded", function() {
    fetch('estadisticas.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta de la red');
            }
            return response.json();
        })
        .then(data => {

            if (!data.topVentas || !data.topClientes || !data.ventasPorDiaDeMayo || !data.prodMasVisitados || !data.ventasPorCategoria) {
                throw new Error('Formato de datos incorrecto');
            }

            // Procesar datos para el gráfico de productos más vendidos
            const productosLabels = data.topVentas.map(item => item.nombreProducto);
            const productosValues = data.topVentas.map(item => item.total_vendidos);

            // Crear gráfico de productos más vendidos
            const ctxProductos = document.getElementById('productosMasVendidosChart').getContext('2d');
            new Chart(ctxProductos, {
                type: 'bar',
                data: {
                    labels: productosLabels,
                    datasets: [{
                        label: 'Productos más vendidos',
                        data: productosValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Procesar datos para el gráfico de los mejores clientes
            const clientesLabels = data.topClientes.map(item => item.email);
            const clientesValues = data.topClientes.map(item => item.total_compras);

            // Crear gráfico de los mejores clientes
            const ctxClientes = document.getElementById('topClientesChart').getContext('2d');
            new Chart(ctxClientes, {
                type: 'bar',
                data: {
                    labels: clientesLabels,
                    datasets: [{
                        label: 'Total Compras de Clientes',
                        data: clientesValues,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
            const month = new Date().getMonth() + 1
            const ventasLabels = data.ventasPorDiaDeMayo.map(item => item.dia + `/${month}/2024`);
            const ventasValues = data.ventasPorDiaDeMayo.map(item => item.total_ventas);

            // Crear gráfico de ventas por día en el mes
            const ctxVentas = document.getElementById('ventasPorDiaDeMesChart').getContext('2d');
            new Chart(ctxVentas, {
                type: 'bar',
                data: {
                    labels: ventasLabels,
                    datasets: [{
                        label: 'Dinero Recibido por Día en Mes Actual',
                        data: ventasValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const prodMasVisit = data.prodMasVisitados.map(item => item.Name);
            const productosValuesMasVisit = data.prodMasVisitados.map(item => item.visitas);

            // Crear gráfico de productos más visitados
            const ctxProductosMasVisit = document.getElementById('productosMasVisitadosChart').getContext('2d');
            new Chart(ctxProductosMasVisit, {
                type: 'bar',
                data: {
                    labels: prodMasVisit,
                    datasets: [{
                        label: 'Productos más visitados',
                        data: productosValuesMasVisit,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const categoriasLabels = data.ventasPorCategoria.map(item => item.Categoría);
            const categoriasValues = data.ventasPorCategoria.map(item => item.total_vendidos);

            // Crear gráfico de ventas por categoria
            const ctxCategorias = document.getElementById('ventasPorCategoriaChart').getContext('2d');
            new Chart(ctxCategorias, {
                type: 'bar',
                data: {
                    labels: categoriasLabels,
                    datasets: [{
                        label: 'Ventas por Categoria',
                        data: categoriasValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        })
        .catch(error => console.error('Error al obtener datos:', error));
});