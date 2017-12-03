var type_1_answer_id = 0;
var type_2_answer_id = 0;
  $(".add_answer_1_2").on("click", function(){
    if($(this).data("button") == "2"){
      var answers_id_2 = "type_2_answer_id_" + type_2_answer_id;
      console.log(answers_id_2);
      console.log(type_2_answer_id);
      $(".answer_group_type_2").append("<div id='answer_group_"+type_2_answer_id+"'><label for='true_2_" + type_2_answer_id + "'>Answer " + (type_2_answer_id + 1) + "<input type='checkbox' id='true_2_" + type_2_answer_id + "' value='" + answers_id_2 + "' name='type_2'><span></span></label><input name='type_2' type='text' class='form-control arm_answer_2' placeholder='Arm answer'><input type='text' placeholder='Rus answer' class='form-control rus_answer_2'><input name='type_2' type='text' class='form-control eng_answer_2' placeholder='Eng answer' ></div>")
      type_2_answer_id ++;
      console.log(type_2_answer_id);
    }
    if($(this).data("button") == "1"){
      var answers_id_1 = "type_1_answer_id_" + type_1_answer_id;
      $(".answer_group_type_1").append("<div id='answer_group_"+type_1_answer_id+"'><label for='true_1_"+type_1_answer_id+"'>Answer "+(type_1_answer_id + 1) + "<input type='radio' id='true_1_"+type_1_answer_id+"' value='"+answers_id_1+"' name='type_1'><span></span></label><input name='type_1' type='text' class='form-control arm_answer_1' placeholder='Arm answer'><input type='text' placeholder='Rus answer' class='form-control rus_answer_1'><input name='type_1' type='text' class='form-control eng_answer_1' placeholder='Eng answer' ></div>")
      type_1_answer_id ++;
    }
  })
$(".remove_answer_1_2").on("click", function(){
  if($(this).data("button") == "2"){
    console.log(type_2_answer_id);
    if (type_2_answer_id > 0) {
      $(".answer_group_type_2 #answer_group_"+(type_2_answer_id-1)).remove();
      type_2_answer_id --;
    }else{
      alert("Here are no answer for delete!");
    }
  }
  if($(this).data("button") == "1"){
    if (type_1_answer_id > 0) {
      $(".answer_group_type_1 #answer_group_"+(type_1_answer_id-1)).remove();
      type_1_answer_id --;
    }else{
      alert("Here are no answer for delete!");
    }
    console.log(type_1_answer_id);
  }
})

$("#question_type").on("change", function(){
  document.getElementById("question_form").reset();
})

var numtrueanswer = 0;
$("#save_data_1").on("click", function(){
  if(type_1_answer_id < 2){
    $.alert({
      title: 'Alert!',
      content: 'Must be at least two answers !',
    });
    return;
  }
  var id = $("#hidden_input_question").val();
  var checked_radio_id = $('input[name=type_1]:checked').val();
  console.log(checked_radio_id);
  if (checked_radio_id === undefined) {
    $.alert({
      title: 'Alert!',
      content: 'Check the true answer !',
    });
    return;
  }else{
    var true_id = checked_radio_id.split("_");
    true_id = true_id[4];
  }

  var newQuestionKey = firebase.database().ref().push().key;
  var arm_text_type_1 = $("#type_1_quest_text_arm").val();
  var rus_text_type_1 = $("#type_1_quest_text_rus").val();
  var eng_text_type_1 = $("#type_1_quest_text_eng").val();

  var arm_answer_true = $(".answer_group_type_1 #answer_group_"+true_id+" input.arm_answer_1").val();
  var rus_answer_true = $(".answer_group_type_1 #answer_group_"+true_id+" input.rus_answer_1").val();
  var eng_answer_true = $(".answer_group_type_1 #answer_group_"+true_id+" input.eng_answer_1").val();
  console.log(arm_text_type_1);
  if(arm_answer_true == "" || rus_answer_true == "" || eng_answer_true == ""){
    $.alert({
      title: 'Alert!',
      content: 'Was found empty fields !',
    });
    return;
  }
  if(arm_text_type_1 == "" || rus_text_type_1 == "" || eng_text_type_1 == ""){
    $.alert({
      title: 'Alert!',
      content: 'Fill question text !',
    });
    return;
  }

  firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/question_text/arm").set(arm_text_type_1);
  firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/question_text/rus").set(rus_text_type_1);
  firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/question_text/eng").set(eng_text_type_1);
  firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/answers/true_answer/arm").set(arm_answer_true);
  firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/answers/true_answer/rus").set(rus_answer_true);
  firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/answers/true_answer/eng").set(eng_answer_true);

  for (var i = 0; i < type_1_answer_id; i++) {

    if (i == true_id) continue;

      var arm_answer_type_1 = $("#answer_group_" + i + " input.arm_answer_1").val();
      var rus_answer_type_1 = $("#answer_group_" + i + " input.rus_answer_1").val();
      var eng_answer_type_1 = $("#answer_group_" + i + " input.eng_answer_1").val();
      if(arm_answer_type_1 == "" || rus_answer_type_1 == "" || eng_answer_type_1 == ""){
        $.alert({
          title: 'Alert!',
          content: 'Was found empty fields !',
        });
        return;
      }
      firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/answers/false_answer_"+i+"/arm").set(arm_answer_type_1);
      firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/answers/false_answer_"+i+"/rus").set(rus_answer_type_1);
      firebaseRef.child("questions").child("mul_one_true&" + newQuestionKey + "/answers/false_answer_"+i+"/eng").set(eng_answer_type_1);
  }
  $.alert({
    title: 'Alert!',
    content: 'Question added successfully !',
  });
  $("div.answer_group_type_1 > div").remove();
  document.getElementById("question_form").reset();
  type_1_answer_id = 0;
}) // End question typr 1





// Question type 2
$("#save_data_2").on("click", function(){
  if(type_2_answer_id < 2){
    $.alert({
      title: 'Alert!',
      content: 'Must be at least two answers !',
    });
    return;
  }
  var id = $("#hidden_input_question").val();
  var checked_checkbox_id = [];

  $.each($("input[name=type_2]:checked"), function(){
      checked_checkbox_id.push($(this).val());
  });


    // Insert question texts

    var newQuestionKey = firebase.database().ref().push().key;
    var arm_text_type_2 = $("#type_2_quest_text_arm").val();
    var rus_text_type_2 = $("#type_2_quest_text_rus").val();
    var eng_text_type_2 = $("#type_2_quest_text_eng").val();

    if(arm_text_type_2 == "" || rus_text_type_2 == "" || eng_text_type_2 == ""){
      $.alert({
        title: 'Alert!',
        content: 'Fill question text !',
      });
      return;
    }



    firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/question_text/arm").set(arm_text_type_2);
    firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/question_text/rus").set(rus_text_type_2);
    firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/question_text/eng").set(eng_text_type_2);

    //end insert question text

  var true_count = checked_checkbox_id.length;
  if (true_count == 0) {
    $.alert({
      title: 'Alert!',
      content: 'Check the true answer !',
    });
    return;
  }else{
    var true_id_num = [];
    for(i = 0; i < true_count; i++){
        var true_id = checked_checkbox_id[i].split("_");
        true_id_num.push(true_id[4]);

        console.log(i);
        console.log("checkbox value");
        console.log(true_id);
        console.log(true_id_num);
    }
    var true_num_count = true_id_num.length;
  }


  // Insert true answers

  for(i = 0; i < true_num_count; i++){
    var answer_group_num = true_id_num[i];
    console.log("answer group id na");
    console.log("#answer_group_" + answer_group_num);
    console.log(answer_group_num);
    var arm_answer_true = $(".answer_group_type_2 #answer_group_" + answer_group_num + " input.arm_answer_2").val();
    var rus_answer_true = $(".answer_group_type_2 #answer_group_" + answer_group_num + " input.rus_answer_2").val();
    var eng_answer_true = $(".answer_group_type_2 #answer_group_" + answer_group_num + " input.eng_answer_2").val();


    if(arm_answer_true == "" || rus_answer_true == "" || eng_answer_true == ""){
      $.alert({
        title: 'Alert!',
        content: 'Was found empty fields !',
      });
      return;
    }

    firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/answers/true_answer_"+i+"/arm").set(arm_answer_true);
    firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/answers/true_answer_"+i+"/rus").set(rus_answer_true);
    firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/answers/true_answer_"+i+"/eng").set(eng_answer_true);
  }

  // Insert false answers
  for (var i = 0; i < type_2_answer_id; i++) {
    alert(i);
    for(var j = 0; j < true_num_count; j++){
      if (i == true_id_num[j]) {
        continue;
        alert("yes");
      }
    }
      var arm_answer_type_2 = $(".answer_group_type_2 #answer_group_" + i + " input.arm_answer_2").val();
      var rus_answer_type_2 = $(".answer_group_type_2 #answer_group_" + i + " input.rus_answer_2").val();
      var eng_answer_type_2 = $(".answer_group_type_2 #answer_group_" + i + " input.eng_answer_2").val();
      if(arm_answer_type_2 == "" || rus_answer_type_2 == "" || eng_answer_type_2 == ""){
        $.alert({
          title: 'Alert!',
          content: 'Was found empty fields !',
        });
        return;
      }
      firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/answers/false_answer_"+i+"/arm").set(arm_answer_type_2);
      firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/answers/false_answer_"+i+"/rus").set(rus_answer_type_2);
      firebaseRef.child("questions").child("man_cor_true&" + newQuestionKey + "/answers/false_answer_"+i+"/eng").set(eng_answer_type_2);
  }
  $.alert({
    title: 'Alert!',
    content: 'Question added successfully !',
  });
$("div.answer_group_type_2 > div").remove();
  document.getElementById("question_form").reset();
  type_2_answer_id = 0;
})
