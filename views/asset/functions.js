// Initialize Firebase
var config = {
    apiKey: "AIzaSyDXvXwAt0VoXPqR8szuBeXg1Zj-wYRNEvE",
    authDomain: "temporal-works-161414.firebaseapp.com",
    databaseURL: "https://temporal-works-161414.firebaseio.com",
    projectId: "temporal-works-161414",
    storageBucket: "temporal-works-161414.appspot.com",
    messagingSenderId: "470743733083"
};
firebase.initializeApp(config);

var infoWindows = [];


// focus marker onChange location
function findMyLocation(choosedLocation, type) {
    if (type == 1) {
        choosedLocation += " country";
    } else if (type == 2) {
        choosedLocation += " province";
    } else if (type == 3) {
        var country = $("#country").val();
        choosedLocation += " city, ";
        choosedLocation += country;
    }
    //Get google maps from maps div by accessing the divs gMap custom property created by me
    gmap = document.getElementById('map').gMap;

    //Start geocoder to focus the map by country name
    var geocoder = new google.maps.Geocoder();

    //Find coordinates of the country using google geocoder service and center map around it
    geocoder.geocode({
        'address': choosedLocation
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            gmap.setCenter(results[0].geometry.location);
            gmap.fitBounds(results[0].geometry.bounds);
            myMarker.setPosition(results[0].geometry.location);
        } else {
            console.log("Geocode was not successful for the following reason: " + status);
        }
        return; // The function returns nothing
    });
};

// AutoFill for testing
function auto_fill() {
    var fake_text = "Maecenas maximus libero id diam ultricies, ut tristique felis  Integer nulla elit, egestas id risus hendrerit, posuere eleifend est. Vivamus imperdiet neque quis dictum molestie. Aenean sem leo, pretium ac volutpat maximus, rhoncus placerat diam. Etiam bibendum, elit ut ornare semper, est urna laoreet lectus, sit amet tincidunt augue ex id est. Sed est quam, facilisis pulvinar aliquet in, congue vel augue. Donec suscipit nunc dui, vel gravida nulla ornare ac. Aliquam euismod ullamcorper nunc, ac vestibulum velit condimen aliqua In ac mollis quam  elementum erat Fusce at lorem vitae mi sollicitudin "
    var fake_title = "Maximus";
    $("#arm_title").val(fake_title);
    $("#arm_desc").val(fake_text);
    $("#rus_title").val(fake_title);
    $("#rus_desc").val(fake_text);
    $("#eng_title").val(fake_title);
    $("#eng_desc").val(fake_text);
    $("#score").val("300");
    $("#types_ input[value='Mountain']").attr("checked", "checked");
    $("#types_ input[value='Cinema']").attr("checked", "checked");
}

// AutoFill for testing(Reset)
function auto_fill_reset() {
    document.getElementById('add_checkpoint').reset();
    $("#types_ input[value='Mountain']").removeAttr("checked");
    $("#types_ input[value='Cinema']").removeAttr("checked");

    $('#upload_pics > *').remove();
}

// AutoFill for testing(Reset)
function reset_second_part() {
	document.getElementById('second_part').reset();
	// $("#second_part").reset();
}

// remove photos onReset
function remove_add_checkpoint_photos() {
    $("#upload_pics > *").remove();
}


// Edit checkpoints
function get_point_fields(d) {
    $(".point_pics > *").remove();
    var country2 = $("#country2").val().toLowerCase().slice(0, 3);
    var region2 = $("#regions2").val().toLowerCase().slice(0, 3);
    city2 = $("#cities2").val().toLowerCase().slice(0, 3);
    var id = $(d).data("id");
    var get_for_edit = firebaseRef.child("checkpoints/" + country2 + "/" + region2 + "/" + city2 + "/" + id + "/");
    get_for_edit = get_for_edit.orderByKey().limitToFirst(1000);

    get_for_edit.on("value", function(snapshot) { //snapshot
        var current_point = snapshot.val();

        // Getting Point Object
        var pointObj = {
            type: current_point.checkpoints_type,
            difficulty: current_point.difficulty,
            marker_radius: current_point.marker_radius,
            score_1: current_point.scores.score_type_1,
            marker_url: current_point.marker_url,
            eng_title: current_point.title.eng_title,
            rus_title: current_point.title.rus_title,
            arm_title: current_point.title.arm_title,
            eng_desc: current_point.description.eng_desc,
            rus_desc: current_point.description.rus_desc,
            arm_desc: current_point.description.arm_desc,
        }
        numPhotos = current_point.numphotos;
        head_pic = current_point.head_pic_name;

        // Set Values in selectors
        $("#arm_title_edit").val(pointObj.arm_title);
        $("#rus_title_edit").val(pointObj.rus_title);
        $("#eng_title_edit").val(pointObj.eng_title);
        $("#arm_desc_edit").val(pointObj.arm_desc);
        $("#rus_desc_edit").val(pointObj.rus_desc);
        $("#eng_desc_edit").val(pointObj.eng_desc);
        $("#marker_radius_edit").val(pointObj.marker_radius);
        $("#score_edit").val(pointObj.score_1);
        $("#marker_url_edit").val(pointObj.marker_url);
        $("#hidden_input").val(id);
        $("#difficulty_edit").val(pointObj.difficulty);

        for (var i = 0; i < pointObj.type.length; i++) {
            var my_tag = document.getElementById(pointObj.type[i]);
            my_tag.checked = true;
        }

    }) // end snapshot

    for (i = 0; i < numPhotos; i++) {
        (function(num) {
            var adaRef = firebase.storage().ref("checkpoints/" + country2 + "/" + region2 + "/" + city2 + "/" + id + "_" + i);

            adaRef.getDownloadURL().then(function(url) {

                if (url) {
                    if (url == head_pic) {
                        $(".point_pics").append("<div class='col-xs-6 col-md-3' id='block_" + id + '_' + num + "'><a href='#' class='thumbnail del_effect'><p class='set_head_photo' data-uniqe='eff_" + id + '_' + num + "' onclick='remove_headPhoto_icon(this);set_head_photo(this);' style='display:none;' data-photoname='" + url + "'><span class='glyphicon glyphicon-picture' ></span></p><img src='" + url + "' alt='...'><i class='remove_pic' type='button' data-name='" + id + "_" + num + "' onclick='remove_file(this)'><span class='glyphicon glyphicon-remove'></span></i></a></div>");
                    } else {
                        $(".point_pics").append("<div class='col-xs-6 col-md-3' id='block_" + id + '_' + num + "'><a href='#' class='thumbnail del_effect'><p class='set_head_photo' data-uniqe='eff_" + id + '_' + num + "' onclick='remove_headPhoto_icon(this);set_head_photo(this);' data-photoname='" + url + "'><span class='glyphicon glyphicon-picture'></span></p><img src='" + url + "' alt='...'><i class='remove_pic' type='button' data-name='" + id + "_" + num + "' onclick='remove_file(this)'><span class='glyphicon glyphicon-remove'></span></i></a></div>");
                    }
                }
            }).catch(function(error) {
                alert("Uh-oh, an error occurred");
                return;
            });
        })(i);
    }
}

// remove main photo icon
function remove_headPhoto_icon(d) {
    var id = $(d).data("uniqe");
    $(".point_pics > div > a > p").css('display', 'block');
    $(".point_pics p[data-uniqe='" + id + "']").css('display', 'none');
}

// reset form
function reset_1() {
    document.getElementById("edit_checkpoint_form").reset();
    $(".point_pics_edit > *").remove();
}

// Remove File
function remove_file(d) {
    var pic_name = $(d).data("name");
    var storageRef = firebase.storage().ref('checkpoints/' + pic_name);

    // Delete the file
    storageRef.delete().then(function() {
        $("#block_" + pic_name).remove();

    }).catch(function(error) {
        alert("Uh-oh, an error occurred");
    });
}

// Remove Checkpoint
function remove_checkpoint(d) {
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function() {

                // Removing data from DB
                var checkpoint_id = $(d).data("id");
                country = $("#country2").val().toLowerCase().slice(0, 3);
                region = $("#regions2").val().toLowerCase().slice(0, 3);
                city = $("#cities2").val().toLowerCase().slice(0, 3);
                firebaseRef.child("checkpoints").child(country).child(region).child(city).child(checkpoint_id).remove();

                // Removing photos from Storage
                var numref = firebaseRef.child("checkpoints").child(country).child(region).child(city).child(checkpoint_id).child("numphotos").orderByKey();
                numref.once("value", function(snapshot) {
                    var numPhostos_for_delete = snapshot.val();
                    for (i = 0; i < numPhostos_for_delete; i++) {
                        var del_pics = firebase.storage().ref('checkpoints/' + checkpoint_id + '_' + i);
                        del_pics.delete().then(function() {}).catch(function(error) {
                            alert("Uh-oh, an error occurred");
                        });
                    } // Delete all checkpoint's files
                });

                $.alert('Delete succesfully!');
            },
            cancel: function() {
                $.alert('Canceled!');
            },
        }
    });
}




// Choose Checkpoint's main photo
function set_head_photo(d) {
    country = $("#country2").val().toLowerCase().slice(0, 3);
    region = $("#regions2").val().toLowerCase().slice(0, 3);
    city = $("#cities2").val().toLowerCase().slice(0, 3);
    id = $("#hidden_input").val();
    const cityRef = firebaseRef.child("checkpoints/" + country + "/" + region + "/" + city + "/");
    idRef = cityRef.orderByKey().limitToFirst(1000);
    var photoName = $(d).data("photoname");
    firebaseRef.child("checkpoints").child(country).child(region).child(city).child(id).child('head_pic_name').set(photoName);
}

// Getting values for insert
function getValues() {
    var point_type = [];
    $.each($("input[name='point_type']:checked"), function() {
        point_type.push($(this).val());
    });

    var positions = myMarker.getPosition();
    var id_part = positions.lat().toString().replace(".", ",") + "_" + positions.lng().toString().replace(".", ",");

    // Make Object
    var fields = {
        country: $("#country").val().slice(0, 3).toLowerCase(),
        region: $("#regions").val().slice(0, 3).toLowerCase(),
        city: $("#cities").val().slice(0, 3).toLowerCase(),
        arm_title: $("#arm_title").val(),
        rus_title: $("#rus_title").val(),
        eng_title: $("#eng_title").val(),
        arm_desc: $("#arm_desc").val(),
        rus_desc: $("#rus_desc").val(),
        eng_desc: $("#eng_desc").val(),
        score: parseInt(parseFloat($("#score").val())),
        marker_url: $("#marker_url").val(),
        marker_radius: parseInt($("#marker_radius").val()),
        difficulty: Number($("#difficulty").val()),
        type: point_type,
        id: $("#country").val().slice(0, 3).toLowerCase() + "_" + $("#regions").val().slice(0, 3).toLowerCase() + "_" + $("#cities").val().toLowerCase().slice(0, 3) + "_" + id_part,
        location_array: [positions.lat(), positions.lng()],
    }
    return fields;
}

// Validating values
function validate(fields) {
    var inputs = {
        arm_title: fields.arm_title,
        rus_title: fields.rus_title,
        eng_title: fields.eng_title,
        arm_desc: fields.arm_desc,
        rus_desc: fields.rus_desc,
        eng_desc: fields.eng_desc,
    }
    var selects = {
        country: fields.country,
        region: fields.region,
        city: fields.city,
    };
    var numbers = {
        score: fields.score,
        marker_radius: parseFloat($("#marker_radius").val()),
    };

    $.each(selects, function(index, value) {
        if (value == null || value === "def") {
            $.alert({
                title: 'Alert!',
                content: 'Choose the ' + index + ' !',
            });
            stopPropagation();
        }
    });

    $.each(inputs, function(index, value) {
        if (value == "") {
            $.alert({
                title: 'Alert!',
                content: 'Fill the ' + index + ' !',
            });
            stopPropagation();
        }
    });

    $.each(numbers, function(index, value) {
        if (isNaN(value)) {
            $.alert({
                title: 'Alert!',
                content: 'Fill the ' + index + ' !',
            });
            stopPropagation()
        }
    });

    if (numPhotos == undefined) {
        $.alert({
            title: 'Alert!',
            content: 'Insert pictures !',
        });
        stopPropagation();
    }

    if (fields.type.length == 0) {
        $.alert({
            title: 'Alert!',
            content: 'Choose the type !',
        });
        stopPropagation();
    }
}

function closeAllInfoWindows() {
    for (var i = 0; i < infoWindows.length; i++) {
        infoWindows[i].close();
    }
}

function get_checkpoints(map) {
    var firebaseRef = firebase.database().ref();
    var ref = firebaseRef.child("checkpoints_id");
    ref.on("value", function(snapshot) {
        var allCheckpoints = snapshot.val();
        console.log("this is what the snapshot is");
        console.log(allCheckpoints);
        var checkpointIds = Object.getOwnPropertyNames(allCheckpoints);
        var num_checkpoints = checkpointIds.length;
        for (i = 0; i <= num_checkpoints - 1; i++) {
            var checkpointName = checkpointIds[i];
            console.log("this is checkpoint name");
            console.log(checkpointName);
            console.log(i);
            var checkpoint_id_array = checkpointName.split('_')
            var checkpointRef = firebaseRef.child("checkpoints");
            for (let j = 0; j < checkpoint_id_array.length - 2; j++) {
                checkpointRef = checkpointRef.child(checkpoint_id_array[j]);
            }

            checkpointRef = checkpointRef.child(checkpointName);
            console.log("this is checkpoint ref");
            console.log(checkpointRef);


            checkpointRef.on("value", function(snapshot, i) {
                var currentCheckpointInfo = snapshot.val();

                var uluru = {
                    lat: currentCheckpointInfo.location[0],
                    lng: currentCheckpointInfo.location[1]
                };

                var contentString = currentCheckpointInfo.title.arm_title;

                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 200
                });

                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    content: contentString,
                    id: snapshot.key,
                });
                // google.maps.event.addListener(marker, 'click', function() {
                //     //alert(selected_checkpoint);
                // });
                marker.addListener('click', function() {
                    closeAllInfoWindows();
                    infowindow.open(map, marker);
                    infoWindows.push(infowindow);
                    mission_checkpoints_final[selected_checkpoint - 1] = this.id;
                    $('#checkpoint_title_' + selected_checkpoint).val(this.content);
                });
            });
            // 	temporary_checkpoint_object = allCheckpointsInCity[checkpointName];
            // 	var temporary_title = temporary_checkpoint_object.title.eng_title;
            // 	var temporary_desc = temporary_checkpoint_object.description.eng_desc;
        }
    })
}
var num_checkpoints_in_mission = 0;
var mission_checkpoints_final = [];

$(document).on("click", ".add_checkpoint_for_mission", function(checkpoint_number = 0) {
    if (num_checkpoints_in_mission == 0) {
        $('.remove_checkpoint_for_mission').removeAttr('disabled');
    }
    mission_checkpoints_final.push(NaN);
    num_checkpoints_in_mission++;
    var current_checkpoint_name = "<div id='checkpoint_group_" + num_checkpoints_in_mission + "'><div class='col-md-6'><input type='button' data-mission='' value=Checkpoint" + num_checkpoints_in_mission + " class='form-control current_checkpoint_select' id='checkpoint_" + num_checkpoints_in_mission + "'></div><div class='col-md-6'><input type='text' id='checkpoint_title_" + num_checkpoints_in_mission + "' readonly class='form-control'></div><div class='clearfix'></div></div>";
    $(".mission_group").append(current_checkpoint_name);

})
$(document).on("click", ".remove_checkpoint_for_mission", function() {
    if (num_checkpoints_in_mission > 0) {
        $(".mission_group #checkpoint_group_" + num_checkpoints_in_mission).remove();
        //$('#attached_docs [value=123]').remove();
        mission_checkpoints_final.pop();
        num_checkpoints_in_mission--;
        if (num_checkpoints_in_mission == 0) {
            $('.remove_checkpoint_for_mission').attr('disabled', 'disabled');
        }
    }
})
var selected_checkpoint = 0;
$(document).on('click', '.current_checkpoint_select', function() {
    selected_checkpoint = $(this).attr('id').split('_')[1];
})

// $('.mission_group > div input[type="button"]').focusout(function(){
// 	alert('sadasda');
// 	selected_checkpoint = 0;
// })

$(document).on('click', '#save_mission', function() {
    alert(mission_checkpoints_final);
    for (i = 0; i < mission_checkpoints_final.length; i++) {
        if (mission_checkpoints_final[i] == NaN) {
            alert('nshel bolor@');
            return false;
        }
    }
    var mission_point_type = [];
    $.each($(".mission_types input[name='point_type']:checked"), function() {
        mission_point_type.push($(this).val());
    });

    var JsonToFirebase = {
        checkpoints: mission_checkpoints_final,
        duration: $("#mission_time").val(),
        difficulty: Number($("#difficulty_missions").val()),
        title: {
            arm_title: $("#arm_title_mission").val(),
            rus_title: $("#rus_title_mission").val(),
            eng_title: $("#eng_title_mission").val(),
        },
        description: {
            arm_desc: $("#arm_desc_mission").val(),
            rus_desc: $("#rus_desc_mission").val(),
            eng_desc: $("#eng_desc_mission").val(),
        },
    }

    var mission_id = mission_checkpoints_final[0] + '%' + $.now();

    var countryRef = mission_checkpoints_final[0].split('_')
    var ref = firebaseRef.child('missions');
    for (i = 0; i < countryRef.length - 2; i++) {
        ref = ref.child(countryRef[i])
    }
    ref.child(mission_id).set(JsonToFirebase);
    firebaseRef.child('missions_id').child(mission_id).set(0);

})
