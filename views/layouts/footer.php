<script src="../web-interface/views/asset/js/jsLibs/jquery-3.2.0.min.js"></script>
<script src="../web-interface/views/asset/jsLibs/jquery.cookie.js"></script>
<script src="../web-interface/views/asset/appJs/location.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW70tI05G-W21b-Tt9JXHyBDCmPugz-38"></script> -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwUKgZqS6GvhXfo-dt2Ewqmr9fIK7aw-w&libraries=places"></script> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwUKgZqS6GvhXfo-dt2Ewqmr9fIK7aw-w&libraries=places&callback=initMap" async defer></script>

<script>
    // Create the autocomplete object and associate it with the UI input control.
    // Restrict the search to the default country, and to place type "cities".
    var map, places, infoWindow;
    var markers = [];
    var autocomplete;
    var countryRestrict = {
        'country': 'us'
    };
    var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
    var hostnameRegexp = new RegExp('^https?://.+?/');


    // Map for checkpoints and the rest is for places api
    function initMap() {
        if (document.getElementById('map') != null) {
            var uluru = {
                lat: 40.202033,
                lng: 44.518471
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: uluru
            });
            myMarker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true,
            });
            // Get the DOM Element
            var myElement = document.getElementById('map');
            // Create a random property that reference the map object
            myElement.gMap = map;
            marker_circle = new google.maps.Circle({
                map: map,
                radius: 50, // 10 miles in metres
                fillColor: '#AA0000'
            });
            marker_circle.bindTo('center', myMarker, 'position');
            $(document).ready(function() {
                google.maps.event.addListener(map, "idle", function() {
                    google.maps.event.trigger(map, 'resize');
                });
            });
            google.maps.event.addListener(map, 'click', function(event) {
                myMarker.setPosition(event.latLng);
            });
        }



        // This part is again for places api
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (
                document.getElementById('autocomplete')), {
                types: ['(cities)']
            });
        places = new google.maps.places.PlacesService(map);

        autocomplete.addListener('place_changed', onPlaceChanged);
    }

    // When the user selects a city, get the place details for the city and
    // zoom the map in on the city.
    function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (place.geometry) {
            map.panTo(place.geometry.location);
            map.setZoom(15);
            search();
        } else {
            document.getElementById('autocomplete').placeholder = 'Enter the name of a place';
        }
    }

    // Search for hotels in the selected city, within the viewport of the map.
    function search() {
        var search = {
            bounds: map.getBounds()
        };

        places.nearbySearch(search, function(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                clearResults();
                clearMarkers();
                // Create a marker for each place found, and
                // assign a letter of the alphabetic to each marker icon.
                for (var i = 0; i < results.length; i++) {
                    var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
                    var markerIcon = MARKER_PATH + markerLetter + '.png';
                    // Use marker animation to drop the icons incrementally on the map.
                    markers[i] = new google.maps.Marker({
                        position: results[i].geometry.location,
                        animation: google.maps.Animation.DROP,
                        icon: markerIcon
                    });


                    // If the user clicks a place marker, show the details of that hotel
                    // in an info window.
                    console.log('it should show the results in the info window');
                    // markers[i].placeResult = results[i];
                    // google.maps.event.addListener(markers[i], 'click', showInfoWindow);
                    // setTimeout(dropMarker(i), i * 100);
                    // addResult(results[i], i);

                }
            }
        });
    }

    // Get the place details for a hotel. Show the information in an info window,
    // anchored on the marker for the hotel that the user selected.
    function showInfoWindow() {
        var marker = this;
        places.getDetails({
                placeId: marker.placeResult.place_id
            },
            function(place, status) {
                if (status !== google.maps.places.PlacesServiceStatus.OK) {
                    return;
                }
                infoWindow.open(map, marker);
                buildIWContent(place);
            });
    }


    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            if (markers[i]) {
                markers[i].setMap(null);
            }
        }
        markers = [];
    }

    function dropMarker(i) {
        return function() {
            markers[i].setMap(map);
        };
    }

    // Map for missions
    function initMapMissions() {
        var map_missions = new google.maps.Map(document.getElementById('map_for_missions'), {
            zoom: 8,
            center: {
                lat: 40.202033,
                lng: 44.518471
            }
        })
        google.maps.event.addListener(map_missions, 'click', function() {
            closeAllInfoWindows();
        });
        get_checkpoints(map_missions);
    }

    // Draw circle on map for checkpoints by this function
    function draw_circle() {
        var marker_circle_radius = Number($("#marker_radius").val());

        if (isNaN(marker_circle_radius)) {
            marker_circle_radius = 50;
        }
        marker_circle.setRadius(marker_circle_radius);
    }

    $(window).ready(function() {
        if (document.getElementById('map') != null) {
            console.log('The map will hopefully be rendered after callback of places api');
        } else {
            console.log("There is no map for checkpoints");
        }

        if (document.getElementById('map_for_missions') != null) {
            initMapMissions();
        } else {
            console.log("There is no map for missions");
        }
    });
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
