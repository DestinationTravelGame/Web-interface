<script src="../web-interface/views/asset/js/jsLibs/jquery-3.2.0.min.js"></script>
<script src="../web-interface/views/asset/jsLibs/jquery.cookie.js"></script>
<script src="../web-interface/views/asset/appJs/location.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW70tI05G-W21b-Tt9JXHyBDCmPugz-38"></script>
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

if(document.getElementById('map_for_missions') != null) {
  initMap();
}
else{
    console.log("There is no map for missions");
}
})


// Map for missions
function initMap() {
  var map_missions = new google.maps.Map(document.getElementById('map_for_missions'), {
    zoom: 8,
    center: {lat: 40.202033, lng: 44.518471}
  })
  google.maps.event.addListener(map_missions, 'click', function() {
    closeAllInfoWindows();
  });
  get_checkpoints(map_missions);
}




</script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../web-interface/views/asset/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
      <script src="../web-interface/views/asset/script.js"></script>
      <script src="../web-interface/views/asset/script2.js"></script>
      <script src="../web-interface/views/asset/update.js"></script>

      <script src="../web-interface/views/asset/appJs/questions.js"></script>
   </body>
</html>
