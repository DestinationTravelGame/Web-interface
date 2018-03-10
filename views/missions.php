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



</div>
<script type="text/javascript">
</script>
<?php require 'layouts/footer.php' ?>
