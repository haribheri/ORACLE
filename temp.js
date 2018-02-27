  function addPatient()  //show pop-up
        {
            document.getElementById("contactPopUp").style.display="block";
        }


function hi()
{
alert("hello");
}

$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){
alert("hello");
e.preventDefault();
$.ajax({
url: "insert.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
//alert(data);
},
error: function(){
alert('some thing wrong');
}             
});
$('#contactPopUp').hide();
}));
});
