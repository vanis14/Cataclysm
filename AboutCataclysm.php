<?php

if (isset($_POST["submit"])) {
  $recipient = "cataclysmresponse@gmail.com  ";
  $subject = "Cataclysm Contact Us Message";
  $sender = $_POST["sender"];
  $senderEmail = $_POST["senderEmail"];
  $message = $_POST["message"];

  $mailBody = "Name: $sender\nEmail: $senderEmail\n\n$message";

  mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

  $thankYou = "<p>Thank you! Your message has been sent.</p>";
  echo $thankYou;
}
?>
<!DOCTYPE html>
<html>

<head>

  <center>
    <img class="maps" src="pictures/logo.png">
  </center>

  <title> About Cataclysm </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" <link href="style.css" rel="stylesheet" type="text/css">


  <!--Inline CSS for the modal-->

  <style>
    body {
      background-image: url("background.jpg");
      background-repeat: no-repeat;
      background-size: 100%;
    }

    .modal {
      color: white;
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: navy;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

  <!--Inline CSS for the collapsable FAQ's-->

  <style>
    .collapsible {
      background-color: navy;
      color: white;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: 10px;
      font-size: 15px;
    }

    .active,
    .collapsible:hover {
      background-color: black;
    }


    .content {
      padding: 0 18px;
      display: none;
      overflow: hidden;
      background-color: black;
    }
  </style>




</head>

<body>
  <font color="white">
    <div id="container">


      <!-- Trigger/Open The Modal -->
      <button id="myBtn">How you can support Cataclysm</button>
      <!-- The Modal -->
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>

          <p> Here is a link to our paypal page where you can donate to us. www.</p>
          <script
    src="https://www.paypal.com/sdk/js?client-id=Acy2GNND7g25QmqPtNC0jpmEfkQapU9kYXlS3yNHKoyuCsTcxzelStO8NudPoLOzLem4bMJ0aQR1GYeh&currency=EUR"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

<div id="paypal-button-container"></div>

<input type="text" placeholder="Donation Amount" id="myInput">

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
    </script></p>
          <p>Your donation can help us better the app facilitating safer travel for you.</p>
        </div>
      </div>

      <div class="About paragraph">
        <div class="row">
          <div class="col-sm-6">
            <h2>About Cataclysm </h2>
            <p> Cataclysm is both a warning system and and a navigational app specificaly designed to tell users about weather conditions and where the closest bunker is in relation to their location. The app also informs users on
              capacity of the bunker and how many occupants are in a bunker at any time. For lesser weather conditions there are guides to how to deal with the weather issues that do not require a bunker.
            </p>
          </div>

          <div class="col-sm-5">
            <p>
              This app is specifcally based in the United States. The states have an abundance of bunkers from WW2 to the cold war era as well as a diverse array of weather conditions
              the would warrant a navigational device to avoid them.
            </p>
          </div>
        </div>

      </div>

      <br></br>

      <p id="test"></p>

      <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      </script>

      <br></br>



      <script>
        var date = new Date();
        document.getElementById("test").innerHTML = date.toString();
      </script>

      <p>Frequently Asked Questions:</p>
      <button type="button" class="collapsible">How does my donation benefit the app?</button>
      <div class="content">
        <p>Donations made to us through the Paypal app supports our team in the time we can dedicate to working on this app. It also allows us to possibly make promotional material in the future to benefit this app.</p>
      </div>
      <button type="button" class="collapsible">Will there be further development in the future?</button>
      <div class="content">
        <p>Our team have spotted a large market within the US for lack of a better term, "Prepper Culture". Our plan is to develop the app to later cover other regions such as Europe and Asia.</p>
      </div>
      <button type="button" class="collapsible">What kind of service are we getting for the app?</button>
      <div class="content">
        <p>As it stands the service we are offering is to locate surrounding bunkers in the area and to warn road users of possible hazards that can arise in these stressful situations.</p>
      </div>

      <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
      </script>
      <center>
        <h4> Contact Us</h4>


        <form id="form" method="post" actions="">
          <div class="contact-form">
            <form id="contact-form" method="post" action="AboutCataclysm.html">
              <input name="sender" type="text" class="form-control" placeholder="your name" required> <br></br>
              <input name="senderEmail" type="text" class="form-control" placeholder="your email" required> <br></br>
              <textarea name="message" class="form-control" placeholder="Message" rows="3" required></textarea> <br></br>
              <input type="submit" name="submit" class="form-control submit" value="Send Message">
            </form>
          </div>
        </form>


        <button type="button">to the App</button>


    </div>
    </center>

    <center>
      <h5> Preview of what are app looks like.</h5>
      <img class="maps" src="map.jpg" border="10" color="navy">
    </center>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.cycle2.js"></script>
    <script src="js/bootstrap.min.js"></script>


    </div>
  </font>
</body>

</html>