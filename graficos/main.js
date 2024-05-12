const ctx = document.getElementById('myChart');
const ctx2 = document.getElementById('myChart2');
const ctx3 = document.getElementById('myChart3');
const ropa = ['Remeras','Pantalones','Casacas', 'Buzos'];
const ventas = [3, 5 , 10 , 13];


const myChart = new Chart(ctx,{
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