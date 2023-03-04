(function(){

    const grafica = document.querySelector('#regalos-grafica');
        if (grafica) { 
            
            obtenerDatos()
            async function obtenerDatos(){
                 const url = "/api/graficas/productos";
                 const respuesta = await fetch(url);
                 const resultado = await respuesta.json();
                 console.log(resultado);
    
                const ctx = document.getElementById('regalos-grafica').getContext('2d');
                const myChart = new Chart(ctx, {
                type: 'bar',
                 data: {
                     labels: resultado.map(producto => producto.nombre),
                     datasets: [{
                     label: '',
                     data: resultado.map(producto => producto.disponible),
                     backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
            }
    
    
    
        
        }
    })();