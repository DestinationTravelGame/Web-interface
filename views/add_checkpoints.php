<?php require 'layouts/header.php' ?>
<div class="navbar">

</div>
<div class="navbar">

</div>
<div class="modal-header container-fluid navbar-fixed-top header_fixed">
  <div class="col-xs-12 col-sm-12 hidden-md hidden-lg show_menu_tool_name">
    <h3 class="modal-title" style="text-align:center;padding:0px 0 30px 0;">Checkpoint</h3>
  </div>
    <div class="col-md-2 col-sm-2 col-xs-1 menu_tools">
      <a href="/web-interface" class="glyphicon glyphicon-align-justify home_button" ></a>
    </div>
    <div class="col-md-4 hidden-xs hidden-sm menu_tool_name">
      <h3 class="modal-title pull-right ">Checkpoint</h3>
    </div>

    <div class="col-md-6 col-sm-10 col-xs-11 menu_tools">
      <ul class="nav nav-tabs pull-right checkpoint_panels">
         <li class="active"><a data-toggle="tab" class="add_checkpoint_button" href="#home">Add checkpoints</a></li>
         <li><a data-toggle="tab" href="#menu1" class="edit_checkpoint_button">Edit checkpoints</a></li>
         <!-- <li><a data-toggle="tab" href="#menu2">Menu 3</a></li> -->
      </ul>
    </div>
</div>
<div class="modal-body">
   <div class="container">
      <div class="tab-content">
         <div id="home" class="tab-pane fade in active">
            <form id="add_checkpoint">

              <div class="container-fluid" style="paddin-top:20px;">





      <div class="leftmap col-md-6" style="padding-left:0;">
         <h4>Country / Страна / Երկիր</h4>
         <div class="form-group">
            <select data-type='add_checkpoint' class="form-control country_select" id="country">
               <option selected="selected" value="defval">Country</option>
                  <option class="test3" value="Armenia">Armenia</option>
            </select>
            <script></script>
         </div>
         <h4>Region / Округ / Մարզ</h4>
         <div class="form-group">
            <select data-type='add_checkpoint' class="form-control region_select" id="regions">
              <option selected="selected" value="defval">Regions</option>
            </select>
         </div>
         <h4>City / Город / Քաղաք</h4>
         <div class="form-group">
            <select data-type='add_checkpoint' class="form-control city_select" id="cities">
              <option selected="selected" value="defval">Cities</option>
            </select>
         </div>



                      <div class="countainer">

                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#arm_inputs">Arm</a></li>
                        <li><a data-toggle="tab" href="#rus_inputs">Rus</a></li>
                        <li><a data-toggle="tab" href="#eng_inputs">Eng</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="arm_inputs" class="tab-pane fade in active title_desc">

                            <div class="form-group">
                            <input class="form-control" type="text" id="arm_title" placeholder="Վերնագիր">
                            </div>
                            <div class="form-group">
                            <textarea name="" id="arm_desc" placeholder="Նկարագրություն" class="form-control" cols="30" rows="10"></textarea>
                          </div>
                        </div>
                        <div id="rus_inputs" class="tab-pane fade title_desc">
                            <div class="form-group">
                            <input class="form-control" type="text" id="rus_title" placeholder="Заголовок">
                            </div>
                            <div class="form-group">
                            <textarea name="" id="rus_desc" placeholder="Описание" class="form-control" cols="30" rows="10"></textarea>
                          </div>
                        </div>
                        <div id="eng_inputs" class="tab-pane fade title_desc">
                          <div class="form-group">
                            <input class="form-control" type="text" id="eng_title" placeholder="Title">
                          </div>
                          <div class="form-group">
                            <textarea name="" id="eng_desc" placeholder="Description" class="form-control" cols="30" rows="10"></textarea>
                          </div>
                        </div>
                      </div>
                      </div>

                  </div>
                  <div  class="col-md-6">
                    <div class="form-group">
                      <h4>Marker Radius</h4>
                         <input type="number" id="marker_radius" value="50" onfocusout="draw_circle();" name="marker_radius" class="form-control">
                      </div>
                      <h4>Change Location</h4>
                    <div id="map">

                    </div>

                  </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="col-md-12 questions container-fluid" id="types_">
                    <h4>Types</h4>
                      <div class="controls span3">
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Mountain"><i>Mountain</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Castle"><i>Castle</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Farm"><i>Farm</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Palace"><i>Palace</i><span></span></label>

                    </div>
                    <div class="controls span3">
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Sculpture"><i>Sculpture</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Historical_event"><i>Historical event</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Museum"><i>Museum</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="River"><i>River</i><span></span></label>


                    </div>
                    <div class="controls span3">
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Concert_hall"><i>Concert hall</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Sport_complex"><i>Sport complex</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Cinema"><i>Cinema</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Theater"><i>Theater</i><span></span></label>


                    </div>
                    <div class="controls span3">
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Opera"><i>Opera</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Lake"><i>Lake</i><span></span></label>
                      <label class="checkbox">
                          <input type="checkbox" name="point_type" value="Temple"><i>Temple</i><span></span></label>
                    </div>

                    <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="container-fluid foot_part">
                     <div class="col-md-12">
                       <div class="form-group col-md-4">
                         <h4>Difficulty Level</h4>
                          <select name="difficult_val" class="form-control" id="difficulty">
                             <option value="1">easy</option>
                             <option value="2">normal</option>
                             <option value="3">hard</option>
                             <option value="4">extrame</option>
                          </select>
                       </div>

                        <div class="form-group col-md-4">
                          <h4>Score</h4>
                           <input type="number" id="score" name="score" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                          <h4>Marker URL</h4>
                           <input type="text" id="marker_url" name="marker_url" class="form-control">
                        </div>


                     </div>
                     <div class="container">
                       <label for="fileButton">Add Pictures</label>
                       <input type="file" style='display:none;' id="fileButton" multiple="multiple">
                     </div>
                     <div class="clearfix">

                     </div>
                      <div id="upload_file" class="container-fluid">
                          <div id="upload_pics" style="min-height:200px;">

                          </div>
                      </div>
                  </div>
                        <div class="modal-footer">
                          <input type="reset" class="btn btn-default" onclick="remove_add_checkpoint_photos();" value="Reset">
                          <button type="button" id="send_data" class="btn btn-default">Save new checkpoint</button>
                      </div>
                    </form>
                    <div class="auto_fill">
                      <i class="glyphicon glyphicon-pencil" onclick="auto_fill();" name="" value=""></i>
                      <i class="glyphicon glyphicon-remove" onclick="auto_fill_reset();" name="" value=""></i>
                    </div>

            </div>
                 <div id="menu1" class="tab-pane fade">

                   <div class="container-fluid edit_checkpoints">






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
                       <select name="" class="form-control checkpoints_table city_select" id="cities2">
                        <option selected="selected" value="defval">City</option>
                       </select>
                    </div>






                  </div>
                         <!-- <table class="table table-bordered" id="get_all_checkpoints">
                           <thead>
                           <tr>
                             <th>N</th>
                             <th>Title</th>
                             <th>Description</th>
                             <th>#</th>
                           </tr>
                           </thead>
                           <tbody id="check">

                           </tbody>
                         </table> -->
                         <div id="check" class="container-fluid">

                         </div>

          </div>
         <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
         </div>
         <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
         </div>
         </div>

      </div>
   </div>
<div class="clearfix"></div>


<!-- Edit checkpoint modal dialog -->
<div class="container-fluid edit_checkpoint">

  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Edit</h3>
        </div>
        <div class="container">


        <form id="edit_checkpoint_form">
        <div class="modal-body">
          <div class="col-md-6">
            <div id="tab_style">
              <ul class="nav nav-tabs ">
                <li class="active"><a data-toggle="tab" href="#arm_inputs2">Arm</a></li>
                <li><a data-toggle="tab" href="#rus_inputs2">Rus</a></li>
                <li><a data-toggle="tab" href="#eng_inputs2">Eng</a></li>
              </ul>
            </div>
          <div class="tab-content">
            <div id="arm_inputs2" class="tab-pane fade in active title_desc">

                <div class="form-group">
                <input class="form-control" type="text" id="arm_title_edit" placeholder="Վերնագիր">
                </div>
                <div class="form-group">
                <textarea name="" id="arm_desc_edit" placeholder="Նկարագրություն" class="form-control" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div id="rus_inputs2" class="tab-pane fade title_desc">
                <div class="form-group">
                <input class="form-control" type="text" id="rus_title_edit" placeholder="Заголовок">
                </div>
                <div class="form-group">
                <textarea name="" id="rus_desc_edit" placeholder="Описание" class="form-control" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div id="eng_inputs2" class="tab-pane fade title_desc">
              <div class="form-group">
                <input class="form-control" type="text" id="eng_title_edit" placeholder="Title">
              </div>
              <div class="form-group">
                <textarea name="" id="eng_desc_edit" placeholder="Description" class="form-control" cols="30" rows="10"></textarea>
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-6" style="padding-top:17px;">
            <h4>Score</h4>
            <div class="form-group">
               <input type="number" id="score_edit" name="score" class="form-control">
            </div>
            <h4>Marker URL</h4>
            <div class="form-group">
               <input type="text" id="marker_url_edit" name="marker_url" class="form-control">
            </div>
            <div class="form-group">
              <h4>Marker Radius</h4>
               <input type="number" placeholder="Marker Radius" id="marker_radius_edit" name="marker_radius" class="form-control">
            </div>
            <h4>Difficulty Level</h4>
            <div class="form-group">
               <select name="difficult_val_edit" class="form-control" id="difficulty_edit">
                  <option value="1">easy</option>
                  <option value="2">normal</option>
                  <option value="3">hard</option>
                  <option value="4">extrame</option>
               </select>
            </div>
            <input type="hidden" id='hidden_input' value="">
          </div>
        </div>

            <div class="clearfix"></div>

            <div class="col-md-12 questions container-fluid" id="types_edit">
              <h4>Types</h4>
                <div class="controls span3">
                <label class="checkbox">
                    <input type="checkbox" id="Mountain" name="point_type_edit" value="Mountain"><i>Mountain</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Castle" name="point_type_edit" value="Castle"><i>Castle</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Farm" name="point_type_edit" value="Farm"><i>Farm</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Palace" name="point_type_edit" value="Palace"><i>Palace</i><span></span></label>

              </div>
              <div class="controls span3">
                <label class="checkbox">
                    <input type="checkbox" id="Sculpture" name="point_type_edit" value="Sculpture"><i>Sculpture</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Historical_event" name="point_type_edit" value="Historical_event"><i>Historical event</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Museum" name="point_type_edit" value="Museum"><i>Museum</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="River" name="point_type_edit" value="River"><i>River</i><span></span></label>


              </div>
              <div class="controls span3">
                <label class="checkbox">
                    <input type="checkbox" id="Concert_hall" name="point_type_edit" value="Concert_hall"><i>Concert hall</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Sport_complex" name="point_type_edit" value="Sport_complex"><i>Sport complex</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Cinema" name="point_type_edit" value="Cinema"><i>Cinema</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Theater" name="point_type_edit" value="Theater"><i>Theater</i><span></span></label>

              </div>
              <div class="controls span3">
                <label class="checkbox">
                    <input type="checkbox" id="Opera" name="point_type_edit" value="Opera"><i>Opera</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Lake" name="point_type_edit" value="Lake"><i>Lake</i><span></span></label>
                <label class="checkbox">
                    <input type="checkbox" id="Temple" name="point_type_edit" value="Temple"><i>Temple</i><span></span></label>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="container-fluid foot_part">
              <div class="col-md-12">
                <label for="fileButton_edit">Add Pictures</label>
                <input type="file" style='display:none;' id="fileButton_edit" multiple="multiple">
              </div>
              <div class="clearfix"></div>
              <div class="row col-md-12 point_pics_edit">

              </div>
               <div class="row col-md-12 point_pics">

               </div>
               <div class="clearfix">

               </div>
             </div>
           </form>
           </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default update_checkpoints" data-dismiss="modal">Save changes</button>
          <button type="button" onclick='reset_1();' class="btn btn-default close_reset_edit" data-dismiss="modal">Close</button>
        </div>
      </div>

</form>

    </div>
  </div>

</div>


<?php require 'layouts/footer.php' ?>