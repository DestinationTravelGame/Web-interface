<?php require 'layouts/header.php' ?>

<div class="navbar">

</div>
<div class="navbar">

</div>
	<div class="modal-header container-fluid navbar-fixed-top">
    <a href="/web-interface" class="glyphicon glyphicon-align-justify home_button" ></a>
    <h3 style="position:absolute;left:45%;top:20%;" class="modal-title pull-left">Add Question</h3>
  </div>

<div class="container">
  <div class="container">
    <div class="modal fade" id="add_question" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
	</div>
    <div class="form-group">



<!--           <div class="form-group col-md-4 ">
							<h4>Country / Страна / Երկիր</h4>
              <select name="" class="form-control" id="country2">
                 	<option selected="selected" value="defval">Country</option>
                	<option class="test3" value="Armenia">Armenia</option>
              </select>
              <script></script>
           </div>

          <div class="form-group col-md-4">
						<h4>Region / Округ / Մարզ</h4>
            <select name="" class="form-control" id="regions2">
							<option selected="selected" value="defval">Region</option>
            </select>
          </div>

         <div class="form-group col-md-4">
					 <h4>City / Город / Քաղաք</h4>
					 <select name="" class="form-control questions_table" id="cities2">
						 <option selected="selected" value="defval">City</option>
					 </select>
         </div> -->


                     <p></p>
            <div class="form-group col-md-4">
              <h4>Country / Страна / Երկիր</h4>
               <select name="" class="form-control country_select" id="country2">
                  <option selected="selected" value="defval">Country</option>
                     <option class="test3" value="Armenia">Armenia</option>
               </select>
            </div>
            <p></p>
            <div class="form-group col-md-4">
              <h4>Region / Округ / Մարզ</h4>
               <select name="" class="form-control region_select" id="regions2">
                 <option selected="selected" value="defval">Region</option>
               </select>
            </div>
            <p></p>
            <div class="form-group col-md-4">
              <h4>City / Город / Քաղաք</h4>
               <select name="" class="form-control questions_table city_select" id="cities2">
                <option selected="selected" value="defval">City</option>
               </select>
            </div>




  	 </div>
<div id="quest"></div>
</div>
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
				<input type="hidden" id="hidden_input_question">
				<select name="" class="form-control" id="question_type">
						<option selected='selected' disabled>Choose Question Type</option>
						<option value="1">Multiple choice - 1 correct answers</option>
						<option value="2">Multiple choice - many correct answers</option>
						<option value="3">Find the difference from original photo</option>
						<option value="4">Is the photo original</option>
						<option value="5">NumericalQuestion</option>
						<option value="6">MatchingWithPhotos</option>
						<option value="7">MultipleChoiceWithOneTruePhoto</option>
						<option value="8">SliderQuestion</option>
						<option value="9">ShakeQuestion</option>
						<option value="10">ClickQuestion</option>
				</select>
				<div class="container question-type-field">
					<form class="" id="question_form" action="" method="">

					<!-- Question types -->
					<div class="quest-type-1 quest-types">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#arm_quest_text_type_1">Arm</a></li>
							<li><a data-toggle="tab" href="#rus_quest_text_type_1">Rus</a></li>
							<li><a data-toggle="tab" href="#eng_quest_text_type_1">Eng</a></li>
						</ul>
						<div class="tab-content">
							<div id="arm_quest_text_type_1" class="tab-pane fade in active title_desc">
									<div class="form-group">
									<textarea id="type_1_quest_text_arm" placeholder="Question text arm" class="form-control" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div id="rus_quest_text_type_1" class="tab-pane fade title_desc">
									<div class="form-group">
									<textarea id="type_1_quest_text_rus" placeholder="Question text rus" class="form-control" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div id="eng_quest_text_type_1" class="tab-pane fade title_desc">
								<div class="form-group">
									<textarea id="type_1_quest_text_eng" placeholder="Question text eng" class="form-control" cols="30" rows="10"></textarea>
								</div>
							</div>
						</div>

							<div class="form-group">
								<input type="button" class='form-control add_answer_1_2' value='Add Answer' data-button="1" name="button">
								<input type="button" class='form-control remove_answer_1_2' value='Remove Answer' data-button="1" name="button">
							</div>
							<div class="answer_group_type_1">

							</div>
							<div class="form-group">
								<input type="button" class="form-control" id="save_data_1" value="Save">
							</div>
					</div>
					<div class="quest-type-2 quest-types">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#arm_quest_text_type_2">Arm</a></li>
							<li><a data-toggle="tab" href="#rus_quest_text_type_2">Rus</a></li>
							<li><a data-toggle="tab" href="#eng_quest_text_type_2">Eng</a></li>
						</ul>
						<div class="tab-content">
							<div id="arm_quest_text_type_2" class="tab-pane fade in active title_desc">
									<div class="form-group">
									<textarea id="type_2_quest_text_arm" placeholder="Question text arm" class="form-control" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div id="rus_quest_text_type_2" class="tab-pane fade title_desc">
									<div class="form-group">
									<textarea id="type_2_quest_text_rus" placeholder="Question text rus" class="form-control" cols="30" rows="10"></textarea>
								</div>
							</div>
							<div id="eng_quest_text_type_2" class="tab-pane fade title_desc">
								<div class="form-group">
									<textarea id="type_2_quest_text_eng" placeholder="Question text eng" class="form-control" cols="30" rows="10"></textarea>
								</div>
							</div>
						</div>

							<div class="form-group">
								<input type="button" class='form-control add_answer_1_2' value='Add Answer' data-button="2" name="button">
								<input type="button" class='form-control remove_answer_1_2' value='Remove Answer' data-button="2" name="button">
							</div>
							<div class="answer_group_type_2">

							</div>
							<div class="form-group">
								<input type="button" class="form-control" id="save_data_2" value="Save">
							</div>
					</div>
					<div class="quest-type-3 quest-types">
							my type 3
					</div>
					<div class="quest-type-4 quest-types">
							my type 4
					</div>
					<div class="quest-type-5 quest-types">
							my type 5
					</div>
					<div class="quest-type-6 quest-types">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#arm_quest_text_type_6">Arm</a></li>
							<li><a data-toggle="tab" href="#rus_quest_text_type_6">Rus</a></li>
							<li><a data-toggle="tab" href="#eng_quest_text_type_6">Eng</a></li>
						</ul>
						<div class="tab-content">
							<div id="arm_quest_text_type_6" class="tab-pane fade in active title_desc">
									<div class="form-group">
									<textarea id="type_6_quest_text_arm_1" placeholder="Question text arm 1" class="form-control" cols="30" rows="4"></textarea>
									<textarea id="type_6_quest_text_arm_2" placeholder="Question text arm 2" class="form-control" cols="30" rows="4"></textarea>
									<textarea id="type_6_quest_text_arm_2" placeholder="Question text arm 3" class="form-control" cols="30" rows="4"></textarea>
								</div>
							</div>
							<div id="rus_quest_text_type_6" class="tab-pane fade title_desc">
									<div class="form-group">
									<textarea id="type_6_quest_text_rus_1" placeholder="Question text rus 1" class="form-control" cols="30" rows="4"></textarea>
									<textarea id="type_6_quest_text_rus_2" placeholder="Question text rus 2" class="form-control" cols="30" rows="4"></textarea>
									<textarea id="type_6_quest_text_rus_3" placeholder="Question text rus 3" class="form-control" cols="30" rows="4"></textarea>
								</div>
							</div>
							<div id="eng_quest_text_type_6" class="tab-pane fade title_desc">
								<div class="form-group">
									<textarea id="type_6_quest_text_eng_1" placeholder="Question text eng 1" class="form-control" cols="30" rows="4"></textarea>
									<textarea id="type_6_quest_text_eng_2" placeholder="Question text eng 2" class="form-control" cols="30" rows="4"></textarea>
									<textarea id="type_6_quest_text_eng_3" placeholder="Question text eng 3" class="form-control" cols="30" rows="4"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
						<label class='label_for_type_6' for="type_6_photo_1">Add Photo For Text 1</label>
						<input style='display:none;' type="file" id="type_6_photo_1" class='form-control' value="">
						</div>
						<div class="form-group">
						<label class='label_for_type_6' for="type_6_photo_2">Add Photo For Text 2</label>
						<input style='display:none;' type="file" id="type_6_photo_2" class='form-control' value="">
						</div>
						<div class="form-group">
						<label class='label_for_type_6' for="type_6_photo_3">Add Photo For Text 3</label>
						<input style='display:none;' type="file" id="type_6_photo_3" class='form-control' value="">
						</div>
					</div>
					<div class="quest-type-7 quest-types">
							my type 7
					</div>
					<div class="quest-type-8 quest-types">
							my type 8
					</div>
					<div class="quest-type-9 quest-types">
							my type 9
					</div>
					<div class="quest-type-10 quest-types">
							my type 10
					</div>
					</form>
				</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php require 'layouts/footer.php' ?>