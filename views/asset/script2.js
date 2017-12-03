






$("#question_type").on("change", function(){
  var quest_type = $(this).val();
  $(".question-type-field div").removeClass("display_block");
  switch(quest_type){

       case '1': $(".quest-type-1").addClass("display_block"); break;
       case '2': $(".quest-type-2").addClass("display_block"); break;
       case '3': $(".quest-type-3").addClass("display_block"); break;
       case '4': $(".quest-type-4").addClass("display_block"); break;
       case '5': $(".quest-type-5").addClass("display_block"); break;
       case '6': $(".quest-type-6").addClass("display_block"); break;
       case '7': $(".quest-type-7").addClass("display_block"); break;
       case '8': $(".quest-type-8").addClass("display_block"); break;
       case '9': $(".quest-type-9").addClass("display_block"); break;
       case '10': $(".quest-type-10").addClass("display_block"); break;

       default: alert("no");

   }
})
