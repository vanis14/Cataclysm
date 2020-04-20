<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
<input type="text" placeholder="Donation Amount" id="myInput">


  <script
    src="https://www.paypal.com/sdk/js?client-id=Acy2GNND7g25QmqPtNC0jpmEfkQapU9kYXlS3yNHKoyuCsTcxzelStO8NudPoLOzLem4bMJ0aQR1GYeh&currency=EUR"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

<div id="paypal-button-container"></div>



<script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: parseInt(document.getElementById("myInput").value)
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>

</body>
</html>


