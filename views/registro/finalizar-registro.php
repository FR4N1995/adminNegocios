<main class="registro">

  <h2 class="registro__heading"><?php echo $titulo; ?></h2>
  <p class="registro__descripcion">Compara los paquetes y adquiere el que se acople mejor a tus necesidades</p>

  <div class="registro__contenedorFreeDays <?php echo ($bandera === true) ? 'btondisablet' : '';?>">
      <a class="<?php echo ($bandera === true) ? 'btondisablet' : '';?>"  href="/finalizar-registro/freedays">15 Dias de prueba</a>
  </div>

  <nav class="paquetes__tabs">
    <button type="button" class="actual" data-paquetes="1">Mensual</button>
    <button type="button" data-paquetes="2">Anual</button>
  </nav>

  <div class="paquetes__grid" id="paquetes-1">
    <div class="paquete">
      <h3 class="paquete__nombre">Paquete Basico</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">- Dar de alta hasta 20 Productos/servicios</li>
        <li class="paquete__elemento">- Registrar hasta 60 citas</li>
        <li class="paquete__elemento">- Registrar hasta 60 ventas</li>
        <li class="paquete__elemento">- Dar de alta a 1 Empleado</li>
        <li class="paquete__elemento">- Visualizacion de todas las ventas realizadas </li>
        <li class="paquete__elemento">- Visualizacion de los productos vendidos dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Visualizacion de la cantidad total vendido dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Manejo y control de cantidad de productos existentes</li>
        <li class="paquete__elemento">- Graficas</li>
      </ul>
      <p class="paquete__precio">$200</p>
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container"></div>
        </div>
      </div>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Paquete Completo</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">- Dar de alta a mas de 100 Productos/Servicios</li>
        <li class="paquete__elemento">- Registrar mas de 300 citas</li>
        <li class="paquete__elemento">- Registrar mas de 300 ventas</li>
        <li class="paquete__elemento">- Dar de alta hasta 10 empleados</li>
        <li class="paquete__elemento">- Visualizacion de todas las ventas realizadas </li>
        <li class="paquete__elemento">- Visualizacion de los productos vendidos dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Visualizacion de la cantidad total vendido dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Manejo y control de cantidad de productos existentes</li>
        <li class="paquete__elemento">- Graficas</li>
      </ul>
      <p class="paquete__precio">$600</p>
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container-completoMensual"></div>
        </div>
      </div>
    </div>
    <div class="paquete">
      <h3 class="paquete__nombre">Paquete Normal</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">- Dar de alta hasta 50 Productos/Servicios</li>
        <li class="paquete__elemento">- Registrar hasta 150 citas</li>
        <li class="paquete__elemento">- Registrar hasta 150 ventas</li>
        <li class="paquete__elemento">- Dar de alta hasta 5 empleados</li>
        <li class="paquete__elemento">- Visualizacion de todas las ventas realizadas </li>
        <li class="paquete__elemento">- Visualizacion de los productos vendidos dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Visualizacion de la cantidad total vendido dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Manejo y control de cantidad de productos existentes</li>
        <li class="paquete__elemento">- Graficas</li>
      </ul>
      <p class="paquete__precio">$400</p>
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container-normalMensual"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="paquetes__grid" id="paquetes-2">
    <div class="paquete">
      <h3 class="paquete__nombre">Paquete Basico</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">- Dar de alta hasta 20 Productos/servicios</li>
        <li class="paquete__elemento">- Registrar hasta 60 citas</li>
        <li class="paquete__elemento">- Registrar hasta 60 ventas</li>
        <li class="paquete__elemento">- Dar de alta a 1 Empleado</li>
        <li class="paquete__elemento">- Visualizacion de todas las ventas realizadas </li>
        <li class="paquete__elemento">- Visualizacion de los productos vendidos dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Visualizacion de la cantidad total vendido dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Manejo y control de cantidad de productos existentes</li>
        <li class="paquete__elemento">- Graficas</li>
      </ul>
      <p class="paquete__precio">$2,000</p>
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container-basicoAnual"></div>
        </div>
      </div>
    </div>

    <div class="paquete">
      <h3 class="paquete__nombre">Paquete Completo</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">- Dar de alta a mas de 100 Productos/Servicios</li>
        <li class="paquete__elemento">- Registrar mas de 300 citas</li>
        <li class="paquete__elemento">- Registrar mas de 300 ventas</li>
        <li class="paquete__elemento">- Dar de alta hasta 10 empleados</li>
        <li class="paquete__elemento">- Visualizacion de todas las ventas realizadas </li>
        <li class="paquete__elemento">- Visualizacion de los productos vendidos dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Visualizacion de la cantidad total vendido dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Manejo y control de cantidad de productos existentes</li>
        <li class="paquete__elemento">- Graficas</li>
      </ul>
      <p class="paquete__precio">$6,500</p>
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container-completoAnual"></div>
        </div>
      </div>
    </div>
    <div class="paquete">
      <h3 class="paquete__nombre">Paquete Normal</h3>
      <ul class="paquete__lista">
        <li class="paquete__elemento">- Dar de alta hasta 50 Productos/Servicios</li>
        <li class="paquete__elemento">- Registrar hasta 150 citas</li>
        <li class="paquete__elemento">- Registrar hasta 150 ventas</li>
        <li class="paquete__elemento">- Dar de alta hasta 5 empleados</li>
        <li class="paquete__elemento">- Visualizacion de todas las ventas realizadas </li>
        <li class="paquete__elemento">- Visualizacion de los productos vendidos dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Visualizacion de la cantidad total vendido dependiendo del dia que elijas</li>
        <li class="paquete__elemento">- Manejo y control de cantidad de productos existentes</li>
        <li class="paquete__elemento">- Graficas</li>
      </ul>
      <p class="paquete__precio">$4,400</p>
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container-normalAnual"></div>
        </div>
      </div>
    </div>
  </div>

</main>


<!-- script de desarrollo de paypal -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AeJtH-gxzTSoECNMVJP4r4KlJmXioq90QhfZfi-ls5MBNWOk61s4RQhjcmcotbardfwjkN2j5xvrcAyx&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script> -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AeJtH-gxzTSoECNMVJP4r4KlJmXioq90QhfZfi-ls5MBNWOk61s4RQhjcmcotbardfwjkN2j5xvrcAyx&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script> -->
<!-- script real de peypal -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
<script>
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'buynow',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            "description": "1",
            "amount": {
              "currency_code": "MXN",
              "value": 200
            }
          }]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          // Show a success message within this page, e.g.
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '';
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');

          const datos = new FormData();

          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
          datos.append('tiempo_id', 1);

          fetch('https://admindenegocios.com/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            }).then(respuesta => respuesta.json())
            .then(resultado => {
              if (resultado.resultado) {
                console.log(resultado);
                actions.redirect('https://admindenegocios.com/admin/dashboard');
              }

            })
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');

    //normal mensual
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'buynow',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            "description": "2",
            "amount": {
              "currency_code": "MXN",
              "value": 400
            }
          }]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          const datos = new FormData();

          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id)
          datos.append('tiempo_id', 1);

          fetch('https://admindenegocios.com/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            }).then(respuesta => respuesta.json())
            .then(resultado => {
              if (resultado.resultado) {
                actions.redirect('https://admindenegocios.com/admin/dashboard');
              }
            })

        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container-normalMensual');

    //completo Mensual
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'buynow',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            "description": "3",
            "amount": {
              "currency_code": "MXN",
              "value": 600
            }
          }]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          const datos = new FormData();
          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
          datos.append('tiempo_id', 1);

          fetch('https://admindenegocios.com/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            }).then(respuesta => respuesta.json())
            .then(resulutado => {
              if (resulutado.resultado) {
                actions.redirect('https://admindenegocios.com/admin/dashboard');
              }
            })
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container-completoMensual');

    //basico Anual
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'buynow',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            "description": "1",
            "amount": {
              "currency_code": "MXN",
              "value": 2000
            }
          }]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          const datos = new FormData();

          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
          datos.append('tiempo_id', 2);

          fetch('https://admindenegocios.com/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            }).then(respuesta => respuesta.json())
            .then(resultado => {
              if (resultado.resultado) {
                actions.redirect('https://admindenegocios.com/admin/dashboard');
              }
            })

        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container-basicoAnual');

    //normal anual

    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'buynow',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            "description": "2",
            "amount": {
              "currency_code": "MXN",
              "value": 4400
            }
          }]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          const datos = new FormData();

          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
          datos.append('tiempo_id', 2);

          fetch('https://admindenegocios.com/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            }).then(respuesta => respuesta.json())
            .then(resultado => {
              if (resultado.resultado) {
                actions.redirect('https://admindenegocios.com/admin/dashboard');
              }
            })
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container-normalAnual');

    //completo Anual

    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'buynow',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            "description": "3",
            "amount": {
              "currency_code": "MXN",
              "value": 6500
            }
          }]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          const datos = new FormData();

          datos.append('paquete_id', orderData.purchase_units[0].description);
          datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
          datos.append('tiempo_id', 2);

          fetch('https://admindenegocios.com/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            }).then(respuesta => respuesta.json())
            .then(resultado => {
              if (resultado.resultado) {
                actions.redirect('https://admindenegocios.com/admin/dashboard');
              }
            })
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container-completoAnual');

  }
  initPayPalButton();
</script>




<!-- <script src="https://www.paypal.com/sdk/js?client-id=AeJtH-gxzTSoECNMVJP4r4KlJmXioq90QhfZfi-ls5MBNWOk61s4RQhjcmcotbardfwjkN2j5xvrcAyx&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"normal","amount":{"currency_code":"MXN","value":400}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script> -->

<!-- Completo mensual -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AeJtH-gxzTSoECNMVJP4r4KlJmXioq90QhfZfi-ls5MBNWOk61s4RQhjcmcotbardfwjkN2j5xvrcAyx&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"completo","amount":{"currency_code":"MXN","value":600}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script> -->

<!-- basico Anual -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AeJtH-gxzTSoECNMVJP4r4KlJmXioq90QhfZfi-ls5MBNWOk61s4RQhjcmcotbardfwjkN2j5xvrcAyx&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"basico-anual","amount":{"currency_code":"MXN","value":2000}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script> -->

<!-- normal Anual -->


<!-- <script src="https://www.paypal.com/sdk/js?client-id=AeJtH-gxzTSoECNMVJP4r4KlJmXioq90QhfZfi-ls5MBNWOk61s4RQhjcmcotbardfwjkN2j5xvrcAyx&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"normal-anual","amount":{"currency_code":"MXN","value":4400}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script> -->

<!-- completo Anual -->

<!-- <script src="https://www.paypal.com/sdk/js?client-id=AeJtH-gxzTSoECNMVJP4r4KlJmXioq90QhfZfi-ls5MBNWOk61s4RQhjcmcotbardfwjkN2j5xvrcAyx&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"completo-anual","amount":{"currency_code":"MXN","value":6500}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script> -->
