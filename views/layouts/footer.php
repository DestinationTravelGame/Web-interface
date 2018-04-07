<script src="../web-interface/views/asset/js/jsLibs/jquery-3.2.0.min.js"></script>
<script src="../web-interface/views/asset/jsLibs/jquery.cookie.js"></script>
<script src="../web-interface/views/asset/appJs/location.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwUKgZqS6GvhXfo-dt2Ewqmr9fIK7aw-w&libraries=places&callback=initMap" async defer></script>

<script>
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
                if (myMarker) {
                    myMarker.addListener('dragend', function() {
                        // auto_fill_reset(); this is commented because it is not the right function
                        myMarker.infowindow_place_search.close();
                        console.log("info window removed");
                    });
                }

            });

            //I think this is not so usefull for now
            // google.maps.event.addListener(map, 'click', function(event) {
            //     myMarker.setPosition(event.latLng);
            // });
            console.log("The code is inside initmap inside if");
        }
        console.log("The code is inside initmap out of if");
        // This part is again for places api autocomplete functionality implementation
        if (document.getElementById('autocomplete')) {
            autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById('autocomplete'))
                // , {
                //     //types: ['(cities)']
                // }
            );
            autocomplete.bindTo('bounds', map);
            console.log("The code works well until here");
            // places = new google.maps.places.PlacesService(map);
            myMarker.infowindow_place_search = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            myMarker.infowindow_place_search.setContent(infowindowContent);
            autocomplete.addListener('place_changed', function() {
                myMarker.infowindow_place_search.close();
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                console.log(place);
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                    myMarker.setPosition(place.geometry.location);
                    myMarker.setVisible(true);
                } else if (place.geometry) {
                    map.panTo(place.geometry.location);
                    map.setCenter(place.geometry.location);
                    map.setZoom(17); // Why 17? Because it looks good!
                    myMarker.setPosition(place.geometry.location);
                    myMarker.setVisible(true);
                } else {
                    document.getElementById('autocomplete').placeholder = 'Enter the name of a place';
                }

                //This part is responsible for filling the info window
                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
                myMarker.infowindow_place_search.open(map, myMarker);

                //This part is responsible for changing the selected country
                for (i = 0; i < place.address_components.length; i++) {
                    if (place.address_components[i].types[0] == 'country' && place.address_components[i].long_name == 'Armenia') {
                        $("#country").val("Armenia");
                        // console.log('the country is found and set');
                        var country_is_set = true
                        break;
                    } else {
                        // console.log('this is not a country name');
                        $("#country").val("defval");
                    }
                }
                //This part is responsible for changing the selected region
                if (country_is_set) {
                    // First clear the lower branches (regions and cities)
                    $(".region_select option").remove();
                    $(".city_select option").remove();
                    // Then set them to default values
                    $(".region_select").append("<option value='defval' selected='selected'>Region</option>");
                    $(".city_select").append("<option value='defval' selected='selected'>City</option>");
                    //Fill in the regions as select options
                    for (var i = 0; i < ArmRegions.length; i++) {
                        $("#country").parent().next().next().find(".region_select").append("<option value=" + ArmRegions[i] + ">" + ArmRegions[i] + "</option>");
                        // console.log(ArmRegions[i]);
                        // console.log("successfully added region " + ArmRegions[i]);
                    }
                    //Find info about region and select it
                    for (i = 0; i < place.address_components.length; i++) {
                        if (region_is_set) {
                            break;
                        }
                        for (j = 0; j < ArmRegions.length; j++) {
                            if (place.address_components[i].types[0] == 'administrative_area_level_1' && place.address_components[i].long_name.includes(ArmRegions[j])) {
                                // console.log(ArmRegions[j]);
                                $("#regions").val(ArmRegions[j]);
                                // console.log('the region is found and set');
                                var region_is_set = true
                                break;
                            } else {
                                // console.log('this is not a region')
                                // $("#region").val("defval");
                            }
                        }
                    }
                }
                //Now search for the city name in the place data from google, if found set it in the city selector
                if (region_is_set) {
                    // First clear the lower branch (cities)
                    $(".city_select option").remove();
                    // Then set it to the default value
                    $(".city_select").append("<option value='defval' selected='selected'>City</option>");
                    //Get cities of the selected region
                    var array_of_cities = eval($("#regions").val());
                    // console.log("This is regions value");
                    // console.log($("#regions").val());
                    // console.log("This is the array of cities of the chosen region");
                    // console.log(array_of_cities);
                    //Fill in the cities as select options
                    for (var i = 0; i < array_of_cities.length; i++) {
                        $("#country").parent().next().next().next().next().find(".city_select").append("<option value=" + array_of_cities[i] + ">" + array_of_cities[i] + "</option>");
                        // console.log(array_of_cities[i]);
                        // console.log("successfully added city " + array_of_cities[i]);
                    }
                    for (i = 0; i < place.address_components.length; i++) {
                        if (city_is_set) {
                            break;
                        }
                        for (j = 0; j < array_of_cities.length; j++) {
                            if (place.address_components[i].types[0] == 'locality' && place.address_components[i].long_name == array_of_cities[j]) {
                                $("#cities").val(array_of_cities[j]);
                                // console.log("The city is found and set");
                                // console.log(array_of_cities[j]);
                                var city_is_set = true
                                break;
                            } else {
                                // console.log("This is not a city, searching in the next address component");
                            }
                        }
                    }
                }
                //Now set the name of the place to the title field (for now in all languages)
                if (place.name) {
                    $("#eng_title").val(place.name);
                    $("#rus_title").val(place.name);
                    $("#arm_title").val(place.name);
                } else {
                    console.log("There is no name for this place in google places databases");
                }
            });
        }
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
        if (document.getElementById('map_for_missions') != null) {
            initMapMissions();
        } else {
            // console.log("There is no map for missions");
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
