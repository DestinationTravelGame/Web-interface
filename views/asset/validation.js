    var country = $("#country").val();
		if(country == null || country === "defval"){

			$.alert({
	    title: 'Alert!',
	    content: 'Choose the country !',
			});
			return;
		}else{
			country = country.slice(0,3);
			country = country.toLowerCase();
		}
    var reg = $("#regions").val();
		if(reg == null || reg === "defval"){

			$.alert({
	    title: 'Alert!',
	    content: 'Choose the region !',
			});
			return;
		}else{
			reg = reg.slice(0,3);
			reg = reg.toLowerCase();
		}
    var city = $("#cities").val();

		if(city == null || city === "defval"){
			$.alert({
	    title: 'Alert!',
	    content: 'Choose the city !',
			});
			return;
		}else{
			city = city.slice(0,3);
			city = city.toLowerCase();
		}
		var marker_radius = parseFloat($("#marker_radius").val());
		if(isNaN(marker_radius)){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the marker radius !',
			});
			return;
		}
    var arm_title = $("#arm_title").val();
		if(arm_title == ""){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the arm title !',
			});
			return;
		}
    var rus_title = $("#rus_title").val();
		if(rus_title == ""){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the rus title !',
			});
			return;
		}
    var eng_title = $("#eng_title").val();
		if(eng_title == ""){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the eng title !',
			});
			return;
		}
		var arm_desc = $("#arm_desc").val();
		if(arm_desc == ""){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the arm desc !',
			});
			return;
		}
		var rus_desc = $("#rus_desc").val();
		if(rus_desc == ""){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the rus desc !',
			});
			return;
		}

		var eng_desc = $("#eng_desc").val();
		if(eng_desc == ""){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the eng desc !',
			});
			return;
		}

    var score = parseFloat($("#score").val());
		if(isNaN(score)){
			$.alert({
	    title: 'Alert!',
	    content: 'Fill the score !',
			});
			return;
		}

		if( numPhotos == undefined ){
			$.alert({
			title: 'Alert!',
			content: 'Insert pictures !',
			});
			return;
		}

    var marker_url = $("#marker_url").val();

    var difficulty = Number($("#difficulty").val());

    // id

  var test_pos = myMarker.getPosition();
	var test_lat = test_pos.lat();
	var test_lng = test_pos.lng();
    var location_array = [test_lat, test_lng];
    var test_lat_str = test_lat.toString().replace(".",",");
    var test_lng_str = test_lng.toString().replace(".",",");
	var id_name = test_lat_str + "_" + test_lng_str;
    id_name = country.slice(0,3) + "_" + reg.slice(0,3) + "_" + city.slice(0,3) + "_" +  id_name;


    // Get Checkpoint Type

    var point_type = [];
    $.each($("input[name='point_type']:checked"), function(){
        point_type.push($(this).val());
    });
		if( point_type.length  == 0){
			$.alert({
	    title: 'Alert!',
	    content: 'Choose the type !',
			});
			return;
		}
		if( point_type.length  == 0){
			$.alert({
	    title: 'Alert!',
	    content: 'Choose the type !',
			});
			return;
		}