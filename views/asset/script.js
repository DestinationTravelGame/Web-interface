	const ArmRegions = ['Lori','Tavush','Shirak','Gegharkunik','Kotayk','Armavir','Ararat','Aragatsotn','Vayots_Dzor','Syunik','Arcax','Yerevan'];
// Defining Locations
    const Lori = ['Vanadzor','Alaverdi','Stepanavan','Spitak','Axtala','Shamlux','Tashir'];
    const Tavush = ['Ijevan','Dilijan','Berd','Noyemberyan','Ayrum'];
    const Shirak = ['Gyumri','Artik','Maralik']
    const Gegharkunik = ['Sevan','Chambarak','Vardenis','Martuni','Gavar']
    const Kotayk = ['Hrazdan','Abovyan','Tsaxkadzor','Charencavan','Nor_Hachin','Byureghavan']
    const Armavir = ['Armavir','Vagharshapat']
    const Ararat = ['Artashat','Ararat','Vedi','Masis']
    const Aragatsotn = ['Ashtarak','Aparan','Talin']
    const Vayots_Dzor = ['Yeghegnadzor','Vayq','Jermuk',]
    const Syunik = ['Kapan','Goris','Qajaran','Sisian','Megri','Dastakert']
// End Locations

$('.country_select').on('change', function () {
	//$( ".country_select option" ).remove();
	var country = $( this ).val();
    switch(country){
		case 'Armenia':
		// Create an array containing regions of Armenia
		regions = ArmRegions;

		break;
		case 'defval':
		break;
		default:
		$.alert({
		title: 'Alert!',
		content: 'Specify the country !',
		});
	}

	// Find country location using predefined function
	if($(this).data('type') == 'add_checkpoint'){
		findMyLocation(country,1);
	}

	for (var i = 0; i < regions.length; i++){
    	$(this).parent().next().next().find(".region_select").append("<option value="+regions[i]+">"+regions[i]+"</option>");
	}
})

$(".country_select").change(function(){
	var countrydef = $( this ).val();
	if (countrydef == "defval") {
		$( ".region_select option" ).remove();
		$( ".city_select option" ).remove();
		$(".region_select").append("<option value='defval' selected='selected'>Region</option>");
		$(".city_select").append("<option value='defval' selected='selected'>City</option>");
	}
})

// Choose a region in <<add new checkpoint>> section
$('.region_select').on('change', function() {
	$(this).parent().next().next().find( "option" ).remove();
	var region = $(this).val();
	// //Get google maps from maps div by accessing the divs gMap custom property created by me
	// gmap = document.getElementById('map').gMap;

	// //Start geocoder to focus the map by country name
	// var geocoder = new google.maps.Geocoder();

	// Get Regions
    switch(region){
		case 'Lori':
		city = Lori;
		break;
		case 'Tavush':
		city = Tavush;
		break;
		case 'Shirak':
		city = Shirak;
		break;
		case 'Gegharkunik':
		city = Gegharkunik;
		break;
		case 'Kotayk':
		city = Kotayk;
	    break;
	    case 'Armavir':
		city = Armavir;
	    break;
	    case 'Ararat':
		city = Ararat;
	    break;
	    case 'Aragatsotn':
		city = Aragatsotn;
	    break;
	    case 'Vayots_Dzor':
		city = Vayots_Dzor;
	    break;
	    case 'Syunik':
		city = Syunik;
		break;
		case 'defval':
		break;
		default:
		$.alert({
			title: 'Alert!',
			content: 'Error 404 NOT FOUND !',
		});
	}

	if($(this).data('type') == 'add_checkpoint'){
		findMyLocation(region,2);
	}

	var regdef = $(".region_select").val();
	if (regdef === "defval") {
		$( ".city_select option" ).remove();
	}
	$(".city_select").append("<option value='defval' selected='selected'>City</option>");
	for(var i = 0; i < city.length; i++){
    	$(".city_select").append("<option value="+city[i]+">"+city[i]+"</option>");
	}
})




$(".region_select").change(function(){
	var regdef = $( this ).val();
	if (regdef == "defval") {
		$( ".city_select option" ).remove();
		$(".city_select").append("<option value='defval' selected='selected'>City</option>");
	}
})

// End choose a region

// Choose a city in <<add new checkpoint>> section
$('.city_select').on('change', function () {
	//Get the name of chosen city
	var city = $(".city_select").val();

	// Find country location using predefined function
	if($(this).data('type') == 'add_checkpoint'){
		findMyLocation(city,3);
	}

});

    // File Transfer
	filer = [];
	var numPhotos;
    var fileButton = document.getElementById('fileButton');

    // Listen for file selection
	$("#fileButton").on("click", function(){
	  	fileButton.addEventListener('change', function(e) {
			$('#progress > *').remove();
			$('#upload_pics > *').remove();

			// Get files
			filer=e.target.files;

			numPhotos = e.target.files.length;
			var uploader=[];

			for(i = 0; i < numPhotos; i++){
				var uploaderID='uploader'+i;

				var myid = "myimg"+i;
				$("#upload_file #upload_pics").append("<div class='col-xs-6 col-md-3'><a class='thumbnail'><img src='' id="+myid+" alt='uploading'></a></div>")
				document.getElementById(myid).src = URL.createObjectURL(event.target.files[i]);

				uploader[i] = document.getElementById(uploaderID);
			}
		})




	})  // End File Selection


	// Listen for file selection
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.diff_origin_photo_viewer img').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#diff_origin_photo").change(function() {
  readURL(this);
});


var task = [];

// Add Checkpoint
var firebaseRef = firebase.database().ref();
$("#send_data").click(function(){

	//getting values
  var fields = getValues();

	// Validation
	validate(fields);

	// Get identified path
	idPath = "checkpoints/" + fields.country + "/" + fields.region + "/" + fields.city + "/" + fields.id;

	// Getting Json tree to firebase
    var JsonToFirebase = {
	    location: fields.location_array,
			checkpoints_type: fields.type,
			scores: {
				score_type_1:fields.score
			},
			marker_url: fields.marker_url,
			marker_radius: fields.marker_radius,
			difficulty: fields.difficulty,
			numphotos: numPhotos,
			title: {
				arm_title: fields.arm_title,
				rus_title: fields.rus_title,
				eng_title: fields.eng_title,
			},
			description: {
				arm_desc: fields.arm_desc,
				rus_desc: fields.rus_desc,
				eng_desc: fields.eng_desc,
			},
    }

    // Inserting to firebase DB
    firebaseRef.child(idPath).set(JsonToFirebase);
    //
    // firebaseRef.child(idPath + "/location").set(fields.location_array);
    // firebaseRef.child(idPath + "/checkpoints_type").set(fields.type);
    // firebaseRef.child(idPath + "/scores").child("score_type_1").set(fields.score);
    // firebaseRef.child(idPath + '/marker_url').set(fields.marker_url);
    // firebaseRef.child(idPath + '/marker_radius').set(marker_radius);
    // firebaseRef.child(idPath + '/difficulty').set(fields.difficulty);
    // firebaseRef.child(idPath + '/numphotos').set(numPhotos);
    // firebaseRef.child(idPath + "/title/arm_title").set(fields.arm_title);
    // firebaseRef.child(idPath + "/title/rus_title").set(fields.rus_title);
    // firebaseRef.child(idPath + "/title/eng_title").set(fields.eng_title);
    // firebaseRef.child(idPath + "/description/arm_desc").set(fields.arm_desc);
    // firebaseRef.child(idPath + "/description/rus_desc").set(fields.rus_desc);
    // firebaseRef.child(idPath + "/description/eng_desc").set(fields.eng_desc);

	// Put Images To Storage
	var storageRef = [];
	for(i = 0; i < numPhotos; i++){
		storageRef[i] = firebase.storage().ref('checkpoints/' + fields.country + "/" + fields.region + "/" + fields.city + "/" + fields.id + "_" + i);
		task[i] = storageRef[i].put(filer[i]);
		firebaseRef.child("checkpoints").child(fields.country + "/" + fields.region + "/" + fields.city + "/" + fields.id + "/photos/" + i).set(i);
	}

	$("#upload_pics > *").remove();
	firebaseRef.child("checkpoints_id").child(fields.id).set(0);

	document.getElementById("add_checkpoint").reset();
	$.alert({
    	title: 'Alert!',
    	content: 'Checkpoint added succesfully!',
	});

}) // End send data

/* Get data from DB */
$('#cities2').on('change', function() {
     $( ".point_row_in" ).remove();
    var country2 = $("#country2").val().toLowerCase().slice(0,3);
    var region2 = $("#regions2").val().toLowerCase().slice(0,3);
    city2 = $("#cities2").val().toLowerCase().slice(0,3);
    const cityRef = firebaseRef.child("checkpoints/" + country2 +"/"+ region2 +"/"+ city2 +"/");
    idRef = cityRef.orderByKey().limitToFirst(1000);
})

$(".questions_table").on("change", function(){
	idRef.on("value", function(snapshot){
		$( ".point_row_in" ).remove();
		var allCheckpointsInCity = snapshot.val();
		var checkpointIds = Object.getOwnPropertyNames(allCheckpointsInCity);
		var num_checkpoints = checkpointIds.length;
		for(i = 0; i <= num_checkpoints-1; i++) {      //object-i mej mi hat avel detal ka, vor@ id chi===>-1
			var checkpointIdss = Object.getOwnPropertyNames(allCheckpointsInCity);
			var checkpointName=checkpointIds[i];
			temporary_checkpoint_object = allCheckpointsInCity[checkpointName];
			var temporary_title = temporary_checkpoint_object.title.eng_title;
			var temporary_titledesc = temporary_checkpoint_object.description.eng_desc;
			var temporary_desc = temporary_checkpoint_object.description.eng_desc;
			temporary_desc = temporary_desc.substring(0, 185) + " ...";
			var head_pic_name = temporary_checkpoint_object.head_pic_name;
			$("#quest").append("<div class='col-md-3 col-sm-6 col-sm-offset-0 point_row_in' style='padding:10px;'><div class='point_row'><p class='image_block'><img src='"+head_pic_name+"' alt='image.jpg' onerror='this.remove(this);' /></p><h3>"+temporary_title+"</h3><p class='description_block'>" + temporary_desc + "</p><p class='tool_block'><input class='btn btn-default table_button add_question' value='Add Question' type='button' data-toggle='modal' data-target='#myModal4' data-id='"+checkpointIdss[i]+"''></p></div></div>");
		}
	})
})

$(".checkpoints_table").on("change", function(){

	idRef.on("value", function(snapshot){
		$( ".point_row_in" ).remove();
			var allCheckpointsInCity = snapshot.val();
			var checkpointIds = Object.getOwnPropertyNames(allCheckpointsInCity);
			var num_checkpoints = checkpointIds.length;
			var clearfix = 0;
			for(i = 0; i <= num_checkpoints-1; i++) {
				var checkpointIdss = Object.getOwnPropertyNames(allCheckpointsInCity);
				var checkpointName=checkpointIds[i];
				temporary_checkpoint_object = allCheckpointsInCity[checkpointName];
				var temporary_title = temporary_checkpoint_object.title.eng_title;
				var temporary_desc = temporary_checkpoint_object.description.eng_desc;
				temporary_desc = temporary_desc.substring(0, 185) + " ...";
				var head_pic_name = temporary_checkpoint_object.head_pic_name;

				if (clearfix == 4) {
					$("#check").append("<div class='clearfix'></div>")
					clearfix = 0;
				}

				$("#check").append("<div class='col-md-3 col-sm-6 col-sm-offset-0 point_row_in' style='padding:10px;'><div class='point_row'><p class='image_block'><img src='"+head_pic_name+"' alt='image.jpg' onerror='this.remove(this);' /><h3>"+temporary_title+"</h3><p class='description_block'>" + temporary_desc + "</p><p class='tool_block'><input class='aass btn btn-default table_button' value='Edit' onclick='get_point_fields(this);' type='button' data-toggle='modal' data-target='#myModal3' data-id='"+checkpointIdss[i]+"''><input class='btn btn-default table_button' type='button' data-id='"+checkpointIdss[i]+"'' onclick='remove_checkpoint(this)' value='Remove' /></p></div></div>");
				clearfix ++;
			}
	})
})

$('#country2').on('change',function() {
    $( ".point_row_in" ).remove();
})
$('#regions2').on('change', function() {
    $( ".point_row_in" ).remove();
})
