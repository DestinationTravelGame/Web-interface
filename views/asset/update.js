
var edit_title_arm = $("#arm_title_edit").val();
$("#arm_title_edit").on("keyup", function(){
	var val = $( this ).val();
	if ( val == 0 ){
		$( this ).css("border-color","red");
	}else{
		$( this ).css("border-color","#1e87f0");
	}
})
$("#arm_title_edit").focusout(function(){
	var val = $( this ).val();
	if(val != ""){
		$( this ).css("border-color","#ccc");
	}else{
		$( this ).attr("placeholder","Fill the blank");
		$( this ).css("border-color","red");
	}
})

filer_2 = [];
numPhotos_edit = 0;

var fileButton_edit = document.getElementById('fileButton_edit');
$("#fileButton_edit").on("click", function(){
		fileButton_edit.addEventListener('change', function(e) {
				$('.point_pics_edit > *').remove();

        filer_2 = e.target.files;

				numPhotos_edit = e.target.files.length;
				uploader=[];

				for(i = 0; i < numPhotos_edit; i++){
					var uploaderID='uploader'+i;

					var myid = "myimg"+(i+numPhotos);
					$(".point_pics_edit").append("<div class='col-xs-6 col-md-3'><a class='thumbnail'><img src='' id="+myid+" alt='uploading'></a></div>")
					document.getElementById(myid).src = URL.createObjectURL(event.target.files[i]);

					uploader[i+numPhotos] = document.getElementById(uploaderID);

				}
			})  // Listener end
})

$(".update_checkpoints").on("click", function(){

	var edit_marker_radius = parseFloat($("#marker_radius").val());
	if(isNaN(edit_marker_radius)){
		$.alert({
		title: 'Alert!',
		content: 'Fill the marker radius !',
		});
		return;
	}

	var edit_title_arm = $("#arm_title_edit").val();
	if(edit_title_arm == ""){
		$.alert({
		title: 'Alert!',
		content: 'Fill the arm title !',
		});
		return;
	}
	var edit_title_rus = $("#rus_title_edit").val();
	if(edit_title_rus == ""){
		$.alert({
		title: 'Alert!',
		content: 'Fill the rus title !',
		});
		return;
	}
	var edit_title_eng = $("#eng_title_edit").val();
	if(edit_title_eng == ""){
		$.alert({
		title: 'Alert!',
		content: 'Fill the eng title !',
		});
		return;
	}
	var edit_desc_arm = $("#arm_desc_edit").val();
	if(edit_desc_arm == ""){
		$.alert({
		title: 'Alert!',
		content: 'Fill the arm desc !',
		});
		return;
	}
	var edit_desc_rus = $("#rus_desc_edit").val();
	if(edit_desc_rus == ""){
		$.alert({
		title: 'Alert!',
		content: 'Fill the rus desc !',
		});
		return;
	}
	var edit_desc_eng = $("#eng_desc_edit").val();
	if(edit_desc_eng == ""){
		$.alert({
		title: 'Alert!',
		content: 'Fill the eng desc !',
		});
		return;
	}
	var edit_score_1 = parseFloat($("#score_edit").val());
	if(isNaN(edit_score_1)){
		$.alert({
		title: 'Alert!',
		content: 'Fill the score !',
		});
		return;
	}

  var edit_marker_url = $("#marker_url_edit").val();
  var edit_difficulty = Number($("#difficulty_edit").val());
  var edit_point_type = [];
    $.each($("input[name='point_type_edit']:checked"), function(){
        edit_point_type.push($(this).val());
    });


  country = $("#country2").val().toLowerCase().slice(0,3);
  region = $("#regions2").val().toLowerCase().slice(0,3);
  city = $("#cities2").val().toLowerCase().slice(0,3);
  id = $("#hidden_input").val();

  var firebaseLongRef = firebaseRef.child("checkpoints").child(country).child(region).child(city).child(id);

  firebaseLongRef.child("scores").child("score_type_1").set(edit_score_1);
  firebaseLongRef.child('marker_url').set(edit_marker_url);
  firebaseLongRef.child('marker_radius').set(edit_marker_radius);
  firebaseLongRef.child('difficulty').set(edit_difficulty);
  firebaseLongRef.child('checkpoints_type').set(edit_point_type);

  // Add title
  firebaseLongRef.child("title").child("arm_title").set(edit_title_arm);
  firebaseLongRef.child("title").child("rus_title").set(edit_title_rus);
  firebaseLongRef.child("title").child("eng_title").set(edit_title_eng);

  // Add desc

  firebaseLongRef.child("description").child("arm_desc").set(edit_desc_arm);
  firebaseLongRef.child("description").child("rus_desc").set(edit_desc_rus);
  firebaseLongRef.child("description").child("eng_desc").set(edit_desc_eng);


  var storageRef = [];
  // var filer=[];
  // var numPhotos = e.target.files.length;

  for(i = 0; i < numPhotos_edit; i++){
        storageRef[i] = firebase.storage().ref('checkpoints/' + id + "_" + (i+numPhotos));
        storageRef[i].put(filer_2[i]);
  }
  numPhotos += numPhotos_edit;
	var idNameRef = firebaseRef.child("checkpoints_id").child(id);
	idNameRef.once("value", function(snapshot) {
		var id_name_num = snapshot.val();
		if(id_name_num == 0){
			firebaseRef.child("checkpoints_id").child(id).set(1);
		}else{
			firebaseRef.child("checkpoints_id").child(id).set(0);
		}
	})

  firebaseRef.child("checkpoints").child(country).child(region).child(city).child(id).child('numphotos').set(numPhotos);
  $(".point_pics_edit > *").remove();
  document.getElementById("edit_checkpoint_form").reset();
  $.alert({
  title: 'Alert!',
  content: 'Changes Saved!!',
  });
})
