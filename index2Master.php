<!-- Modal content -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Google Map</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Styles/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" 
  <?php
  include_once "DB/connect.php";
  ?>
  </head> 
  <body>

  <div class="topnav" id="myTopnav" onclick="location.href='logout.php'">
    <a href="paypal.php">Support Us</a>
    <a href="AboutCataclysm.php">About Us</a>
    <a href="#" class="LOGOUT" onclick="logout.php" style="	box-shadow: 0px 1px 0px 0px #1c1b18;
    	background:linear-gradient(to bottom, #eae0c2 5%, #ccc2a6 100%);
    	background-color:#eae0c2;
      float: right;
    	border-radius:15px;
    	border:2px solid #333029;
    	display:inline-block;
    	cursor:pointer;
    	color:#505739;
    	font-family:Arial;
    	font-size:14px;
    	font-weight:bold;
    	padding:12px 16px;
    	text-decoration:none;
    	text-shadow:0px 1px 0px #ffffff;">logout</a>
    <a href="javascript:void(0);" class="icon" onclick="logout.php">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <style>
    #map {
      height:685px;
      width:100%;
    }
  </style>



  <div id="container">

    <div class="row">



      <div class="col-sm-12">

        <div id="floating-panel">
          <ul style="list-style-type:none;">
            <li><button class="side" id="myBtn" style="background-color: #d2c8ab;
                color: black;">Add Hazard</button></li>
          </ul>
        </div>
        <div id="floating-panel2" style="position: absolute;
      background-color: black;
        left: 42%;
        z-index: 5;
        width: 10%;
        padding: 2px;
        margin-top: 0px;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        color: white;
        padding-left: 16px;">
          <h2>Admin </h2>
        </div>






        <div id="map"></div>

        <div id="myModal" class="modal">

          <!-- Modal content -->


          <div class="modal-content">
            <span class="close">&times;</span>

            <center>
              <h2>HAZARD</h2>
            </center>
            <div class="row-modal">
              <div class="col-sm-3">
                <label for="lat">Latitude:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="lat" class="module1" name="lat">
              </div>
            </div>

            <div class="row-modal">
              <div class="col-sm-3">
                <label for="long">Longitude:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="long" class="module1" name="long">
              </div>
            </div>




            <div class="row-modal">
              <div class="col-sm-3">
                <label for="levels">Chose the level the hazard:</label>
              </div>
              <div class="col-sm-9">
                <select id="levels" name="levels">
                  <option value="0.10">Level 1:Heavy rains, Strong winds, Heavy Fog etc.</option>
                  <option value="0.30">Level 2:Blackice, Floats etc.</option>
                  <option value="0.75">Level 3:Snow Storms, Hail Storms, etc.</option>
                  <option value="1">Level 4:Hurricanes, Tsunamis, Nuclear Activities etc.</option>
                </select>
              </div>
            </div>

            <div class="row-modal">
              <div class="col-sm-3">
                <label for="area">Radius affected by the hazard(Km^2):</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="area" class="module1" name="area">
              </div>
            </div>


            <div class="row-modal">
              <div class="col-sm-3">
                <label for="hazardDescription">Subject</label>
              </div>
              <div class="col-sm-9">
                <textarea id="hazardDescription" rows="5" cols="140"> </textarea>
              </div>
            </div>

            <div class="row-modal">
              <div class="col-sm-3">
                <label for="title">Title:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="title" class="module1" name="title">
              </div>
            </div>


            <div class="row-modal">
              <center>
                <button id="myBtn3" class="hazardButton" onclick="myBtn3()">Add Hazard</button>
                <button id="hidden" class="hazardButton" onclick="hidden()">Find coords</button>

              </center>
            </div>


            <div id="hiddenDiv">
              <div class="row-modal">
                <div class="col-sm-3">
                  <label for="txtautocomplete">location:</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" id="txtautocomplete" class="module1" placeholder="enter the adress" />
                </div>
              </div>
              <div class="row-modal">
                <center><label id="lblresult"></label></center>
              </div>

              <div id="hiddenButtons" class="row-modal">
                <center>
                  <button id="closeHidden" class="hazardButton" onclick="copyCoords()">Copy</button>
                  <button id="Copy" class="hazardButton" onclick="closeHidden()">Cancel</button>
                </center>
              </div>


            </div>
          </div>
        </div>


        <!-- 2nd Modal -->
        <div id="myModal2" class="modal">

          <!-- 2ndModal content -->
          <div class="modal-content">
            <span class="close2">&times;</span>
            <center>
              <h2>Add Safe zone</h2>
            </center>
            <div class="row-modal">
              <div class="col-sm-3">
                <label for="SafeLat">Latitude:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="SafeLat" class="module1" name="SafeLat">
              </div>
            </div>

            <div class="row-modal">
              <div class="col-sm-3">
                <label for="SafeLong">Longitude:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="SafeLong" class="module1" name="SafeLong">
              </div>
            </div>




            <div class="row-modal">
              <div class="col-sm-3">
                <label for="SafeArea">Radius of the safe area:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="SafeArea" class="module1" name="SafeArea">
              </div>
            </div>


            <div class="row-modal">
              <div class="col-sm-3">
                <label for="SafeareaDescription">Subject</label>
              </div>
              <div class="col-sm-9">
                <textarea id="SafeareaDescription" rows="5" cols="140"> </textarea>
              </div>
            </div>

            <div class="row-modal">
              <div class="col-sm-3">
                <label for="SafeTitle">Title:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" id="SafeTitle" class="module1" name="SafeTitle">
              </div>
            </div>


            <div class="row-modal">
              <center>
                <button id="addSafe" class="hazardButton" onclick="addSafe()">Add Safezone</button>
                <button id="hiddenSafe" class="hazardButton" onclick="hiddenSafe()">Find coords</button>
              </center>
            </div>


            <div id="hiddenDivSafe">
              <div class="row-modal">
                <div class="col-sm-3">
                  <label for="txtautocomplete">location:</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" id="txtautocomplete" class="module1" placeholder="enter the adress" />
                </div>
              </div>
              <div class="row-modal">
                <center><label id="lblresult"></label></center>
              </div>

              <div id="hiddenButtonsSafe" class="row-modal">
                <center>
                  <button id="CopySafe" class="hazardButton" onclick="copyCoordsSafe()">Copy</button>
                  <button id="closeHiddenSafe" class="hazardButton" onclick="closeHiddenSafe()">Cancel</button>
                </center>

              </div>
            </div>


          </div>
        </div>
      </div>









      <script>







        window.onload=function(){
          getCircles();
        };

        var map;
        var circ2 = [];
        var circles = [];


        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: 37.0902,
              lng: -95.7129
            },
            minZoom: 1,
            maxZoom: 15,
            zoom: 1,
            restriction: {
              latLngBounds: {
                east: -66.9513812,
                north: 49.3457868,
                south: 24.7433195,
                west: -124.7844079
              },
              strictBounds: false
            },
          });

          var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
          var markers = [
                 {
                   coords:{lat:38.7425,lng:-104.848333},
                   iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                   content:'<h1>Cheyenne Mountain Complex</h1> <br> <p>  The Cheyenne Mountain Complex is a military installation and defensive bunker located in unincorporated El Paso County, Colorado, next to the city of Colorado Springs, at the Cheyenne Mountain Air Force Station, which hosts the activities of several tenant units. Also located in Colorado Springs is Peterson Air Force Base, where the North American Aerospace Defense Command (NORAD) and United States Northern Command (USNORTHCOM) headquarters are located. </p>'
                 },
                 {
                   coords:{lat:38.7425,lng:-77.973761},
                   iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                   content:'<h1>Construction of the Cheyenne Mountain Complex</h1> <br> <p>Construction of the Cheyenne Mountain Complex began with the excavation of Cheyenne Mountain in Colorado Springs, Colorado on May 18, 1961. It was made fully operational on February 6, 1967. It is a military installation and hardened nuclear bunker from which the North American Aerospace Defense Command was headquartered at the Cheyenne Mountain Complex. The United States Air Force has had a presence at the complex since the beginning, the facility is now the Cheyenne Mountain Air Force Station, which hosts other military units, including NORAD.</p>'
                 },
                 {
                   coords:{lat:40.441959,lng:-104.848333},
                   iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                   content:'<h1>National Audio-Visual Conservation Center</h1> <br> <p>The National Audiovisual Conservation Center, also known as the Packard Campus for Audio-Visual Conservation, is the Library of Congress audiovisual archive located inside Mount Pony in Culpeper, Virginia.</p>'
                 },
                 {
                   coords:{lat:28.7335,lng:-97.8297},
                   iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                   content:'<h1>Warrenton Training Center</h1> <br> <p>WTC has served multiple roles, most notably as a Central Intelligence Agency (CIA) signals intelligence facility, numbers station, and communications laboratory. The center also houses at least one underground "relocation" bunker that serves U.S. continuity of government purposes, and is a communications and signals intelligence training school for various federal departments and agencies, including the CIA, National Security Agency (NSA), Department of Defense and Department of State.</p>'
                 }


               ];

               // Loop through markers
               for(var i = 0;i < markers.length;i++){
                 // Add marker
                 addMarker(markers[i]);
               }

               // Add Marker Function
               function addMarker(props){
                 var marker = new google.maps.Marker({
                   position:props.coords,
                   map:map,
                   //icon:props.iconImage
                 });

                 // Check for customicon
                 if(props.iconImage){
                   // Set icon image
                   marker.setIcon(props.iconImage);
                 }

                 // Check content
                 if(props.content){
                   var infoWindow = new google.maps.InfoWindow({
                     content:props.content
                   });

                   marker.addListener('click', function(){
                     infoWindow.open(map, marker);
                   });
                 }
               }






        } //init map
        function addCircle(props) {

          var circle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: props.coords,
            radius: props.radius
          });



          if (props.content) {
            var infoWindow2 = new google.maps.InfoWindow({
              content: "<h3>" + props.title + "</h3>" + "<br>" + props.content
            });

            google.maps.event.addListener(circle, 'click', function(ev) {
              infoWindow2.setPosition(circle.getCenter());
              infoWindow2.open(map);
            });
          }


        }



        function getCircles() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              res = JSON.parse(xhttp.responseText);
              saveData(res);
            }
          };
          xhttp.open("GET", "Hazards/Hazard.php");
          xhttp.send();
        }

        function saveData(res) {
          for (var i = 0; i < res.length; i++) {
            var obj = res[i];
            var circle = {
              coords: {
                lat: parseFloat(obj.Latitude),
                lng: parseFloat(obj.Longitude)
              },
              content: obj.Description,
              radius: parseInt(obj.Area),
              title: obj.Title,
            };
            circles.push(circle);
          }
          for (var i = 0; i < circles.length; i++) {
            // Add marker
            addCircle(circles[i]);
          }
        }






      </script>


      <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        var hiddenDiv = document.getElementById("hiddenDiv");
        hiddenDiv.style.display = "none";
        hiddenButtons.style.display = "none";
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");


        var panel = document.getElementById("floating-panel")

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
          modal.style.display = "block";
          panel.style.display = "none";

        }



        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
          panel.style.display = "block";
          hiddenDiv.style.display = "none";
          document.getElementById("lat").value = '';
          document.getElementById("long").value = '';
          document.getElementById("area").value = '';
          document.getElementById("title").value = '';
          document.getElementById("hazardDescription").value = '';
        }




        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
            modal2.style.display = "none";
            panel.style.display = "block";
            hiddenDiv.style.display = "none";
            document.getElementById("lat").value = '';
            document.getElementById("long").value = '';
            document.getElementById("area").value = '';
            document.getElementById("title").value = '';
            document.getElementById("hazardDescription").value = '';
          }
        }




        function myBtn3() {
          var e = document.getElementById("levels");
          var opacity = e.options[e.selectedIndex].value;
          var x = document.getElementById("lat").value;
          var y = document.getElementById("long").value;
          var z = document.getElementById("area").value;
          var q = document.getElementById("hazardDescription").value;
          var addTitle = document.getElementById("title").value;
          var a = parseInt(x);
          var b = parseInt(y);
          var c = parseInt(z);
          var formdata = new FormData();
          formdata.append("levels", opacity);
          formdata.append("lat", x);
          formdata.append("long", y);
          formdata.append("area", z);
          formdata.append("hazardDescription", q);
          formdata.append("title", addTitle);
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
          };
          xhttp.open("POST", "Hazards/Hazard.php");
          xhttp.send(formdata);
          var copyLat;
          var copyLng;


          var infoWindow = new google.maps.InfoWindow({
            content: "<h3>" + addTitle + "</h3>" + "<br>" + q
          });



          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: opacity,
            map: map,
            center: {
              lat: a,
              lng: b
            },
            radius: c
          });
          modal.style.display = "none";
          panel.style.display = "block";

          google.maps.event.addListener(cityCircle, 'click', function(ev) {
            infoWindow.setPosition(cityCircle.getCenter());
            infoWindow.open(map);
          });

          document.getElementById("lat").value = '';
          document.getElementById("long").value = '';
          document.getElementById("area").value = '';
          document.getElementById("title").value = '';
          document.getElementById("hazardDescription").value = '';




        }



        hidden.onclick = function() {
          hiddenDiv.style.display = "block";
          var autocomplete = new google.maps.places.Autocomplete(document.getElementById("txtautocomplete"));
          google.maps.event.addListener(autocomplete, 'place_changed', function() {

            var place = autocomplete.getPlace();
            var location = "Address: " + place.formatted_address + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            location += "Latitude: " + place.geometry.location.lat() + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            location += "Longitude: " + place.geometry.location.lng();
            document.getElementById('lblresult').innerHTML = location
            hiddenButtons.style.display = "block";
            copyLat = place.geometry.location.lat();
            copyLng = place.geometry.location.lng();

          });

        }




        function closeHidden() {
          hiddenDiv.style.display = "none";
          hiddenButtons.style.display = "none";
          document.getElementById("txtautocomplete").value = '';

        }


        function copyCoords() {
          hiddenDiv.style.display = "none";
          hiddenButtons.style.display = "none";
          document.getElementById("txtautocomplete").value = '';
          document.getElementById("lat").value = copyLat;
          document.getElementById("long").value = copyLng;

        }
      </script>




      <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
      </script>





      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdIRdF3uZcS_Vda95WWnsU2_T3humAKK0&libraries=places&callback=initMap" async defer></script>
      <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <script src="js/jquery.cycle2.js"></script>
      <script src="js/bootstrap.min.js"></script>

      <!-- The core Firebase JS SDK is always required and must be listed first -->
      <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>

      <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
      <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>


      </body>

</html>
