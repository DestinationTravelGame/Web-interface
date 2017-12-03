<script src="../web-interface/views/asset/js/jsLibs/jquery-3.2.0.min.js"></script>
<script src="../web-interface/views/asset/jsLibs/jquery.cookie.js"></script>
<script src="../web-interface/views/asset/appJs/location.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB45uCs9ukCMUL8Usi2r0i3rVigL73UJ3Q"></script>
<script>


function draw_circle() {
  var marker_circle_radius = Number($("#marker_radius").val());

  if(isNaN(marker_circle_radius)){
    marker_circle_radius = 50;
  }
  marker_circle.setRadius(marker_circle_radius);
}

$(window).ready(function(){
if (document.getElementById('map') != null) {
  var uluru = {lat: 40.202033, lng: 44.518471};



  var map = new google.maps.Map(document.getElementById('map'), {

    center: {lat: -34.397, lng: 150.644},
    zoom: 8,
    center: uluru
  });

  myMarker = new google.maps.Marker({
    position: uluru,
    map: map,
    draggable:true,
  });

  // Get the DOM Element
  var myElement = document.getElementById('map');
  // Create a random property that reference the map object
  myElement.gMap = map;

  marker_circle = new google.maps.Circle({
    map: map,
    radius: 50,    // 10 miles in metres
    fillColor: '#AA0000'
  });
 marker_circle.bindTo('center', myMarker, 'position');

  $(document).ready(function() {

    google.maps.event.addListener(map, "idle", function(){
      google.maps.event.trigger(map, 'resize');
    });

  });
  google.maps.event.addListener(map, 'click', function(event) {

     myMarker.setPosition(event.latLng);

  });

}
})
</script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../web-interface/views/asset/js/bootstrap.min.js"></script>

<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBY9EFiVrxbNRbZdNxQB2F4rzPuIuVlH_I",
    authDomain: "store-491ea.firebaseapp.com",
    databaseURL: "https://store-491ea.firebaseio.com",
    projectId: "store-491ea",
    storageBucket: "store-491ea.appspot.com",
    messagingSenderId: "718046674824"
  };

  firebase.initializeApp(config);
</script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
      <script src="../web-interface/views/asset/functions.js"></script>
      <script src="../web-interface/views/asset/script.js"></script>
      <script src="../web-interface/views/asset/script2.js"></script>
      <script src="../web-interface/views/asset/update.js"></script>

      <script src="../web-interface/views/asset/appJs/questions.js"></script>
   </body>
</html>
