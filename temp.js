function addPatient()  //show pop-up
{
    document.getElementById("contactPopUp").style.display="block";
}


$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){
e.preventDefault();

$.ajax({
url: "insert.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
},
error: function(){
alert('going to exception block');
}             
});
$('#contactPopUp').hide();
}));
});


$(function() {
  $('.ad_edit_tabs nav a').on('click', function() {
    show_content($(this).index());
  });
  
  show_content(0);

  function show_content(index) {
    // Make the content visible
    $('.ad_edit_tabs .content.visible').removeClass('visible');
    $('.ad_edit_tabs .content:nth-of-type(' + (index + 1) + ')').addClass('visible');
    $('.butnss').addClass('visible');

    // Set the tab to selected
    $('.ad_edit_tabs nav a.selected').removeClass('selected');
    $('.ad_edit_tabs nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
  }
});

