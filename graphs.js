const ctx = document.getElementById('myChart');
const ctx2 = document.getElementById('myChart2');
const ctx3 = document.getElementById('myChart3');
const ctx4 = document.getElementById('myChart4');
const ropa = ['Remeras','Pantalones','Casacas', 'Buzos'];
const ventas = [3, 5 , 10 , 13];


// nuevo fetch para traer desde la base de datos 

/*document.addEventListener('DOMContentLoaded', function() {
    fetch('estadisticas.php')  // Cambia 'ruta_a_tu_script_php.php' por la ruta correcta a tu script PHP
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.nombre);
            const values = data.map(item => item.total_vendidos);

            const ctx = document.getElementById('productosMasVendidosChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Productos Más Vendidos',
                        data: values,
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
        });
});*/


/*const myChart = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: ropa,
        datasets:[{
            label:'Cantidad de prendas vendidas por unidad' ,
            data: ventas,
            backgroundClor:[
                'rgba(255, 99 ,132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor:[
                'rgba(255, 99 ,132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, )'
            ],
            borderWidth: 1.5

        }]
    }
})

const myChart2 = new Chart(ctx2,{
    type: 'bar',
    data: {
        labels: ropa,
        datasets:[{
            label:'Cantidad de prendas vendidas por unidad' ,
            data: ventas,
            backgroundClor:[
                'rgba(255, 99 ,132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor:[
                'rgba(255, 99 ,132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, )'
            ],
            borderWidth: 1.5

        }]
    }
})

const myChart3 = new Chart(ctx3,{
    type: 'bar',
    data: {
        labels: ropa,
        datasets:[{
            label:'Cantidad de prendas vendidas por unidad' ,
            data: ventas,
            backgroundClor:[
                'rgba(255, 99 ,132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor:[
                'rgba(255, 99 ,132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, )'
            ],
            borderWidth: 1.5

        }]
    }
})

const myChart4 = new Chart(ctx4,{
    type: 'bar',
    data: {
        labels: ropa,
        datasets:[{
            label:'Cantidad de prendas vendidas por unidad' ,
            data: ventas,
            backgroundClor:[
                'rgba(255, 99 ,132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor:[
                'rgba(255, 99 ,132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, )'
            ],
            borderWidth: 1.5

        }]
    }
})*/