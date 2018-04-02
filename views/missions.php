<?php require 'layouts/header.php' ?>

<div class="navbar">

</div>
<div class="navbar">

</div>
<div class="modal-header container-fluid navbar-fixed-top header_fixed">
  <div class="col-xs-12 col-sm-12 hidden-md hidden-lg show_menu_tool_name">
    <h3 class="modal-title" style="text-align:center;padding:0px 0 30px 0;">Missions</h3>
  </div>
    <div class="col-md-2 col-sm-2 col-xs-1 menu_tools">
      <a href="/web-interface" class="glyphicon glyphicon-align-justify home_button" ></a>
    </div>
    <div class="col-md-4 hidden-xs hidden-sm menu_tool_name">
      <h3 class="modal-title pull-right ">Missions</h3>
    </div>

    <div class="col-md-6 col-sm-10 col-xs-11 menu_tools">
      <ul class="nav nav-tabs pull-right checkpoint_panels">
         <li class="active"><a data-toggle="tab" class="add_checkpoint_button" href="#home">Add missions</a></li>
         <li><a data-toggle="tab" href="#menu1" class="edit_checkpoint_button">Edit missions</a></li>
         <!-- <li><a data-toggle="tab" href="#menu2">Menu 3</a></li> -->
      </ul>
    </div>
</div>

<div id="missions">
  <div class="col-md-6">
    <div class="form-group">
      <input type="button" class='form-control add_checkpoint_for_mission' value='Add Checkpoint' data-button="1" name="button">
      <br>
      <input type="button" class='form-control remove_checkpoint_for_mission' value='Remove Checkpoint' data-button="1" name="button">
    </div>
    <div class="mission_group">

    </div>
  </div>
  <div class="col-md-6">
    <div id="map_for_missions" style="width: 100%;height:500px"></div>
  </div>
  <div class="clearfix"></div>
<br>
  <div class="col-md-6">
    <div class="col-md-12 mission_types questions container-fluid" id="types_">
      <h4>Types</h4>
        <div class="controls span3_mission">
        <label class="checkbox">
            <input type="checkbox" name="point_type" value="Mountain"><i>Mountain</i><span></span></label>
        <label class="checkbox">
            <input type="checkbox" name="point_type" value="Castle"><i>Castle</i><span></span></label>
        <label class="checkbox">
            <input type="checkbox" name="point_type" value="Farm"><i>Farm</i><span></span></label>
        <label class="checkbox">
            <input type="checkbox" name="point_type" value="Palace"><i>Palace</i><span></span></label>
            <label class="checkbox">
                <input type="checkbox" name="point_type" value="Sculpture"><i>Sculpture</i><span></span></label>
            <label class="checkbox">
      </div>
      <div class="controls span3_mission">
        <label class="checkbox">
            <input type="checkbox" name="point_type" value="Opera"><i>Opera</i><span></span></label>
        <label class="checkbox">
            <input type="checkbox" name="point_type" value="Lake"><i>Lake</i><span></span></label>
        <label class="checkbox">
            <input type="checkbox" name="point_type" value="Temple"><i>Temple</i><span></span></label>
            <label class="checkbox">
                <input type="checkbox" name="point_type" value="Concert_hall"><i>Concert hall</i><span></span></label>
            <label class="checkbox">
                <input type="checkbox" name="point_type" value="Sport_complex"><i>Sport complex</i><span></span></label>
      </div>

      <div class="clearfix"></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="countainer">

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#arm_inputs">Arm</a></li>
          <li><a data-toggle="tab" href="#rus_inputs">Rus</a></li>
          <li><a data-toggle="tab" href="#eng_inputs">Eng</a></li>
        </ul>

        <div class="tab-content">
          <div id="arm_inputs" class="tab-pane fade in active title_desc">

              <div class="form-group">
              <input class="form-control" type="text" id="arm_title_mission" placeholder="Վերնագիր">
              </div>
              <div class="form-group">
              <textarea name="" id="arm_desc_mission" placeholder="Նկարագրություն" class="form-control" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div id="rus_inputs" class="tab-pane fade title_desc">
              <div class="form-group">
              <input class="form-control" type="text" id="rus_title_mission" placeholder="Заголовок">
              </div>
              <div class="form-group">
              <textarea name="" id="rus_desc_mission" placeholder="Описание" class="form-control" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div id="eng_inputs" class="tab-pane fade title_desc">
            <div class="form-group">
              <input class="form-control" type="text" id="eng_title_mission" placeholder="Title">
            </div>
            <div class="form-group">
              <textarea name="" id="eng_desc_mission" placeholder="Description" class="form-control" cols="30" rows="10"></textarea>
            </div>
          </div>
        </div>
        </div>
  </div>
  <div class="">

  </div>
  <div class="clearfix">

  </div>
  <div class="col-md-6">
    <div class="col-md-6">
    <div class="form-group">
      <h4>Duration of the mission (minutes)</h4>
      <input type="number" class="form-control" id="mission_time" name="">
    </div>
  </div>
  <div class="form-group col-md-6">

      <h4>Difficulty Level</h4>
       <select name="difficult_val" class="form-control" id="difficulty_missions">
          <option value="1">easy</option>
          <option value="2">normal</option>
          <option value="3">hard</option>
          <option value="4">extrame</option>
       </select>
</div>
<div class="clearfix"></div>

  </div>

<div class="form-group col-md-3">
  <button type="button" id="save_mission" class="form-control" name="button">Save Mission</button>
</div>

<?php require 'layouts/footer.php' ?>
