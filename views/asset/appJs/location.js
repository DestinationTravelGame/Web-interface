$(document).ready(function(){
$($.cookie('locations')).click();
$('.edit_checkpoint_button').on('click', function(){
    $.cookie('locations', '.edit_checkpoint_button');
})
$('.add_checkpoint_button').on('click', function(){
    $.cookie('locations', '.add_checkpoint_button');
})



})