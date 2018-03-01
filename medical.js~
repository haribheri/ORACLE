//code for left list
$(document).ready(function(){
        
        $.ajax({
            url:'http://localhost/murali/list.php',//listing php url
            method: 'post',
            dataType: 'json',
            success: function (data) 
                {
                         content = '';
                        val='';
                        $.each(data, function(key,value)
                    {
//                        alert(value.pat_name);
                    //val=value.pat_name
                        //content += '<li id=list-'+key +' onclick=get_deatils("'+value.pat_name+'");>';
                        content += '<li id=list-'+key +' onclick=get_deatils("'+value.pid+'");>';
                        content += '<a href=javascript:void(0); class=tabopen tab-id=1 ripple=ripple ripple-color=#FFF>';
                        content += '<table cellpadding=0 cellspacing=0 width=100% id=bheri_tbl>';
                        content += '<tbody>';

                        content += '<tr>';
                        content +='<td width=100%>';
                        content += '<div class=mailList>';
                        content += '<div class=userContent>';
                        content += '<h1>'+value.pat_name+'</h1>';
                        content += '<p>'+value.disease+'</p>';
            
                        content += '</div>';
                        content += '<div id=pid  style="display: none;">';
                        content += '<p>'+value.pid+'</p>';
                        content += '</div>';
        
                        content += '</div>';

                        /*content += '</div>';
                        content += '<div class=location>';
                        content += '<p>'+value.last_visit+'</p>';
                        content += '</div>';
                        */


                        content += '</td>';
                        content += '</tr>';
                        content +='</tbody>';
                        content +='</table>';
                        content +='</a>'
                        content +='</li>' 
                        });
                    $('#fetch_list').html(content);
                }
            });
            });
//code for left list

    function get_deatils(id)
    {    
        var obj ={};
        obj.pid=id;    
        //alert("value is "+obj.pid);
        $.ajax({
            type: "POST",
            url:'http://localhost/murali/detail.php',  //detail pge url
            data: JSON.stringify(obj),
            dataType: 'json',
            success: function (data) 
                {

                    content1= '';
                    $.each(data, function(key,value)
                    {
                        if(typeof value.pat_name!= 'undefined')                        
                        {
                        content1 += '<div>';
                            content1 +='<table style=width:100%; class=chattbl>';
                                content1 += '<tbody>';
                                    content1 +='<tr><td calss=pat_name>'+value.pat_name+'</td></tr>';
                                content1 +='</tbody>';    
                            content1 +='</table>';
                        content1 +='</div>';
                        content1 +='<div style=float:left>';
                            content1 +='<table style=width:100%; class=chattbl>';
                                content1 +='<tbody>';
                                    content1 +='<tr class=table-row bo_m2 cp>';
                                        content1 +='<td class=td_sub>';
                                            content1 +='<table class=chattbl_in>';
                                                content1 +='<tbody>';
                                                    content1 +='<tr>';
                                                    content1 +='<td> Last visited on : '+value.latest_visit+'</td>';
                                                    content1 +='</tr>';
                                                    content1 +='<tr>';
                                                        content1 +='<td>Came for : '+value.disease+'</td>';
                                                    content1 +='</tr>';
                                                content1 +='</tbody>';
                                            content1 +='</table>';
                                        content1 +='</td>';
                                    content1 +='</tr>';
                                content1 +='</tbody>';
                            content1 +='</table>'
                        content1 +='</div>';
                        }
                    });
                    $('#fetch_header').html(content1);

                    content = '';
                    $.each(data, function(key,value)
                    {
                        
                        if(typeof value.disease!= 'undefined')                        
                        {
                            content += '<li>';
                            content += '<div  >';
                                content += '<table class=chattbl width=100%>';
                                content += '<tbody> ';
                                    content += '<tr>';
                                        content += '<td width=100%>';
                                            content += '<div>';
                                            content += '<h4>'+value.disease+'</h4>';
                                            content += '<p>'+value.pat_mobile+'</p>';
                                            content += '</div>';
                                            content += '<div>';
                                            content += '<p>'+value.pat_address+'</p>';
                                            content += '</div>';
                                        content += '</td>';
                                    content += '</tr>';
                                content += '</tbody>';
                            content += '</table>';
                            content += '</div>';
//                            content += '<div>';
                        }
                        content += '</li>';
                        if(typeof value.url!= 'undefined')                        
                        {                        

//                            content += '<table style=width:100%; class=chattbl>';
//                            content += '<tbody>';
//                            content += '<tr>';
//                            content += '<td>';


                            content += '<img id=img-'+key+' src='+value.url+' onclick=myfun('+key+');>';
                            content +='<div id=myModal class=modal>';
                            content +=  '<span class=close>&times;</span>';
                            content +=  '<img class=modal-content id=img01>';
                            content += '<div id=caption></div>';
                            content += '</div>';





//                            content    += '<img src='+value.url+' style=border-radius: 8px;>';

//                            content    += '<p>'+value.url+'</p>';
//                            content    += '</td>';
//                            content += '</tr>';
//                            content += '</tbody>';
//                            content += '</table>';
                        }
//                        content += '</div>';
                        
                        content += '</div>';
                        //content +='</li>' ;

                    });
//alert(content);
                    $('#fetch_details').html(content);
                }
            });
}//get_deatils()



function myfun(key)
{
var modal = document.getElementById('myModal');
var img = document.getElementById('img-'+key);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
    img.onclick = function()
    {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
    }

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
    span.onclick = function() 
    { 
        modal.style.display = "none";
    }

}

function openImg(id)
{
window.open(id);
}
    

function viewAttachment(file_url)
{
window.open(id);
//$('#open_img').append(file_url);
}



    function addPatient()  //show pop-up
        {
            document.getElementById("contactPopUp").style.display="block";
        }
/*

        function submit_pat_details(e) //store input
        {

            var obj ={};
            obj.p_name=document.getElementById("p_name").value;
            obj.p_mobile=document.getElementById("p_mobile").value;
            obj.p_address=document.getElementById("p_address").value;
            obj.disaese=document.getElementById("disaese").value;
            obj.prescription=document.getElementById("prescription").value;
            obj.userData=document.getElementById("userData").value;
            obj.fileToUpload=document.getElementById("fileToUpload").src;
//            obj.videoToUpload=document.getElementById("videoToUpload").src;
            $.ajax({
                type: "POST",
                url:'insert.php',
                data: new FormData($('#submit_form1')),
                    cache:false,
                    contentType: false,
                    processData: false,
                success: function (data) 
                    {
                        //   alert("success"+data);
                    },
                error : function (data)
                    {
                        //alert("fail"+data);
                    }
                });
            $('#contactPopUp').hide();
return false;
        }//submit_pat_details END
        
*/
        function renderList()
        {
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
//alert(data);
},
error: function(){
alert('some thing wrong');
}             
});
$('#contactPopUp').hide();
}));
});


$(document).ready(function (e){
$("#search_dt_Form").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "search_by_date.php",
type: "POST",
data:  new FormData(this),
contentType: false,
dataType: 'json',
cache: false,
processData:false,
success: function(data){

cnt=0;
   content5 = '';
            $.each(data, function(key,value)
            {
                        cnt+=1;
                        content5 += '<li id=list-'+key +' onclick=get_deatils("'+value.pid+'");>';
                        content5 += '<a href=javascript:void(0); class=tabopen tab-id=1 ripple=ripple ripple-color=#FFF>';
                        content5 += '<table cellpadding=0 cellspacing=0 width=100% id=bheri_tbl>';
                        content5 += '<tbody>';

                        content5 += '<tr>';
                        content5 +='<td width=100%>';
                        content5 += '<div class=mailList>';
                        content5 += '<div class=userContent>';
                        content5 += '<h1>'+value.pat_name+'</h1>';
                        content5 += '<p>'+value.disease+'</p>';
                        content5 += '</div>';
                        content5 += '</div>';
                        content5 += '<div id=pid  style="display: none;">';
                        content5 += '<p>'+value.pid+'</p>';
                        content5 += '</div>';
                        content5 += '</div>';
                        content5 += '</td>';
                        content5 += '</tr>';
                        content5 +='</tbody>';
                        content5 +='</table>';
                        content5 +='</a>'
                        content5 +='</li>' 
         });
                    $('#fetch_list').html(content5);
        },
error: function(){}             
});
$('#search_dt_Form').hide();
}));
});


/*function search_date()
{
alert('saeraching');
$.ajax({
            url:'http://localhost/final/search.php',
            data: { 
                search_name : name
                      },
            method: 'post',
            dataType: 'json',
            success: function (data) 
                {
                         content = '';
                        $.each(data, function(key,value)
                    {
                        content += '<li id=list-'+key +' onclick=get_deatils("'+value.pid+'");>';
                        content += '<a href=javascript:void(0); class=tabopen tab-id=1 ripple=ripple ripple-color=#FFF>';
                        content += '<table cellpadding=0 cellspacing=0 width=100% id=bheri_tbl>';
                        content += '<tbody>';

                        content += '<tr>';
                        content +='<td width=100%>';
                        content += '<div class=mailList>';
                        content += '<div class=userContent>';
                        content += '<h1>'+value.pat_name+'</h1>';
                        content += '<p>'+value.disease+'</p>';
                        content += '</div>';
                        content += '</div>';
                        content += '<div id=pid  style="display: none;">';
                        content += '<p>'+value.pid+'</p>';
                        content += '</div>';
                        content += '</div>';
                        content += '</td>';
                        content += '</tr>';
                        content +='</tbody>';
                        content +='</table>';
                        content +='</a>'
                        content +='</li>' 
                        });
                    $('#fetch_list').html(content);
                }
            });

}

*/




//serach code
$(document).ready(function(){
$( "#searchauto" ).keypress(function(event) {
  if ( event.keyCode == 13 ) {
var name=document.getElementById("searchauto").value;
        $.ajax({
            url:'http://localhost/final/search.php',
            data: { 
                search_name : name
                      },
            method: 'post',
            dataType: 'json',
            success: function (data) 
                {
                         content = '';
                        $.each(data, function(key,value)
                    {
                        content += '<li id=list-'+key +' onclick=get_deatils("'+value.pid+'");>';
                        content += '<a href=javascript:void(0); class=tabopen tab-id=1 ripple=ripple ripple-color=#FFF>';
                        content += '<table cellpadding=0 cellspacing=0 width=100% id=bheri_tbl>';
                        content += '<tbody>';

                        content += '<tr>';
                        content +='<td width=100%>';
                        content += '<div class=mailList>';
                        content += '<div class=userContent>';
                        content += '<h1>'+value.pat_name+'</h1>';
                        content += '<p>'+value.disease+'</p>';
                        content += '</div>';
                    /*    content += '<div class=location>';
                        content += '<p>'+value.mobile+'</p>';
                        content += '</div>';
                    */
                        content += '</div>';
                        content += '<div id=pid  style="display: none;">';
                        content += '<p>'+value.pid+'</p>';
                        content += '</div>';
                        content += '</div>';
                        content += '</td>';
                        content += '</tr>';
                        content +='</tbody>';
                        content +='</table>';
                        content +='</a>'
                        content +='</li>' 
                        });
                    $('#fetch_list').html(content);
                }
            });
  }
});
});
 $( function() {
                                  $(".start_datepick").datepicker(
                                     {
                                          maxDate: '0',
                                          altFormat: 'yy,mm,dd', 
                                          altField: '#alt-start-date',
                                          dateFormat: 'dd-M-yy',
                                          beforeShow : function()
                                          {
                                              if(jQuery('.end_datepick').val().length > 0){
                                                  jQuery( this ).datepicker('option','maxDate', jQuery('.end_datepick').val());
                                              }
                                          }
                                      }
                                  );
                                  $(".end_datepick").datepicker(
                                     {
                                          maxDate: '0',
                                          altFormat: 'yy,mm,dd', 
                                          altField: '#alt-end-date',
                                          dateFormat: 'dd-M-yy',
                                          beforeShow : function()
                                          {
                                              jQuery( this ).datepicker('option','minDate', jQuery('.start_datepick').val());
                                          } 
                                      }
                                  );
                                } );




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

