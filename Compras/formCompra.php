<?php
session_start();
if(!isset($_SESSION["Usuario"])){  
  echo "<script>window.location.href='../cart.php?error=1'</script>";
}else{
?>
<!doctype html>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../EstiloRegistro.css">
    <link rel="icon" href="../imgs/logoGrafikGames.png">

    <style>
      .input-box{
        width:500px;
      }
      .StripeElement {
        background-color: white;
        height: 40px;
        padding: 10px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
      }

      .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
      }

      .StripeElement--invalid {
        border-color: #fa755a;
      }

      .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
      }
      #cuenta{
      color: rgba(255, 255, 255, 0.9);
      font-size: 20px;
      font-weight: 500;
      padding: 0.5em 1.2em;
      background: linear-gradient(45deg, #2196f3, #ff4685);
      border: none;
      position: relative;
      }
      #cuenta:hover {
          color: rgba(255, 255, 255, 1);
          box-shadow: 0 4px 16px rgba(49, 138, 172, 1);
          transition: all 0.2s ease;
      }
      a{
      display: flex;
      justify-content: center;
      text-decoration: none;
      }

      #parrafo{
        position: relative;
        margin-top: -12em;
        color: white;
      }
      #imagenGrafikGames1{
        margin-top:7em;
        margin-bottom: -2em;
        width: 25%;
      }
      input::placeholder{
        color: white;
      }
    </style>

    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 imagenGrafik1">
          <a href="../home.php"><img src="../imgs/logoGrafikGames.png"  id="imagenGrafikGames1" alt="Logo de la Pagina"></a>
      </div>
    </div>
        <form action="CreateCharge.php" method="post" id="payment-form">
            <div class="form">
                <h1>
                    <span>Tarjeta de Credito o Debito</span>
                    <i></i>
                </h1>
                
                <div id="card-element" class="col-12 input-box">
                </div>
                <button class="col-6" id="botonEnviar" name="send" type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <script>
      // Create a Stripe client.
      var stripe = Stripe('pk_test_51N1lg1ExqbW9LhStl3j9ZZnF1lZAkd0ly0qdlTdNlsPmhyWFPtCythvGwcTRyhnaBKXRDUoseAvXMVJuAszY9XwP004z8fEONK');

      // Create an instance of Elements.
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
        base: {
          color: '#32325d',
          lineHeight: '18px',
          fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
          fontSmoothing: 'antialiased',
          fontSize: '16px',
          '::placeholder': {
            color: '#aab7c4'
          }
        },
        invalid: {
          color: '#fa755a',
          iconColor: '#fa755a'
        }
      };

      // Create an instance of the card Element.
      var card = elements.create('card', {style: style});

      // Add an instance of the card Element into the `card-element` <div>.
      card.mount('#card-element');

      // Handle real-time validation errors from the card Element.
      card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
      });

      // Handle form submission.
      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
          if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
          }
        });
      });

      function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
      }
    </script>
  </body>
</html>
<?php
}
?>