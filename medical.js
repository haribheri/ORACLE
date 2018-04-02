//code for left list
$(document).ready(function(){
        
        $.ajax({
            url:'http://localhost/list.php',//listing php url
            method: 'post',
            dataType: 'json',
            success: function (data) 
                {
                         content = '';
                        val='';
                        $.each(data, function(key,value)
                    {
                        //alert(value.uniq_id);
                    //val=value.pat_name
                        //content += '<li id=list-'+key +' onclick=get_deatils("'+value.pat_name+'");>';
                        content += '<li id=list-'+key +' onclick=get_deatils("'+value.uniq_id+'");>';
                        content += '<a href=javascript:void(0); class=tabopen tab-id=1 ripple=ripple ripple-color=#FFF>';
                        content += '<table cellpadding=0 cellspacing=0 width=100% id=bheri_tbl>';
                        content += '<tbody>';

                        content += '<tr>';
                        content +='<td width=100%>';
                        content += '<div class=mailList>';
                        content += '<div class=userContent>';
                        content += '<h1>'+value.p_name+'</h1>';
                        content += '<p>'+value.disease_name+'</p>';
                        content += '<p>'+value.disease_code+'</p>';
            
                        content += '</div>';
                        content += '<div id=pid  style="display: none;">';
                        content += '<p>'+value.uniq_id+'</p>';
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

/*
tbl_patient (uniq_id numeric,p_name text, gender text,mobile text,pat_address text,dob  timestamp without time zone, mr_number numeric,op_ip text, insert_date  timestamp without time zone, recent_date  timestamp without time zone );

tbl_disease(fk_uniq_id numeric,disease_code numeric,complaints text, present_medicine text,ge text,pa text,eg text,dre text);

tbl_med_history(fk_uniq_id numeric,fk_disease_code numeric,medical_history text, surgical_history text, rt_chemo_history text);

tbl_med_codes_1(fk_uniq_id numeric,code_1 numeric,code1_url text);

tbl_med_codes_2(fk_uniq_id numeric,code_2 numeric,code2_url text);

tbl_med_codes_3(fk_uniq_id numeric,code_3 numeric,code3_url text);

tbl_med_codes_4(fk_uniq_id numeric,code_4 numeric,code4_url text);

tbl_med_codes_5(fk_uniq_id numeric,code_5 numeric,code5_url text);
*/

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

    function get_deatils(id)
    {    
        var obj ={};
        obj.pid=id;    

        $.ajax({
            type: "POST",
            url:'http://localhost/detail.php',  //detail pge url
            data: JSON.stringify(obj),
            dataType: 'json',
            success: function (data) 
                {

                    	content1= '';
                    	$.each(data, function(key,value)
                    	{
					content1 += '<div>';
					content1 +='<table style=width:100%;>';
					content1 += '<tbody>';
					if(value.p_name!=null && typeof value.p_name!= 'undefined')
					{
						content1 +='<tr><td>'+value.p_name+'</td>';
					}
					if(value.gender!=null && typeof value.gender!= 'undefined')
					{
						content1 +='<td>'+value.gender+'</td></tr>';
					}
					if(value.mobile!=null && typeof value.mobile!= 'undefined')
					{
						content1 +='<tr><td class=mobil> contact num:-'+value.mobile+'</td></tr>';
					}

					if(value.dob!=null && typeof value.dob!= 'undefined')
					{
						content1 +='<tr><td class=mobil> Age :-'+getAge(value.dob)+'</td></tr>';
					}

					content1 +='</tbody>';    
					content1 +='</table>';

					content1 +='<table style=width:100%; class=chattbl>';
					content1 += '<tbody>';
					if(value.mr_number!=null && typeof value.mr_number!= 'undefined')
					{
						content1 +='<tr><td calss=mr_num>mr num:- '+value.mr_number+'</td></tr>';
					}
					if(value.op_ip!= null && typeof value.op_ip!= 'undefined')               
					{
						content1 +='<tr><td class=op_ip>'+value.op_ip+'</td></tr>';
					}             
					if(value.pa!= null && typeof value.pa!= 'undefined')               
					{
						content1 +='<td class=pa>pa :- '+value.pa+'</td>';
					}

					if(value.eg!= null && typeof value.eg!= 'undefined')               
					{
						content1 +='<td class=eg>eg :- '+value.eg+'</td>';
					}
					if(value.dre!= null && typeof value.dre!= 'undefined')               
					{
						content1 +='<td class=dre>dre :- '+value.dre+'</td></tr>';
					}
					content1 +='</tbody>';    
					content1 +='</table>';
					content1 +='</div>';


					content1 +='<div style=float:left>';
					content1 +='<table style=width:100%; class=chattbl>';
					content1 +='<tbody>';

					content1 +='<tr>';
					if(value.insert_date !='undefined' && value.insert_date !=null)
					{
						content1 +='<td> Last visited on : '+value.insert_date+'</td>';
					}
					content1 +='</tr>';
					content1 +='<tr>';

					if(typeof value.disease!='undefined' && value.disease !=null)
					{
						content1 +='<td>Came for : '+value.disease+'</td>';
					}
					if(typeof value.disease_code!='undefined' && value.disease_code!=null)
					{
						content1 +='<td>Corresponding Code is : '+value.disease_code+'</td></tr>';
					}

					if(value.complaints !=null && typeof value.complaints !='undefined')
					{
						content1 +='<tr><td> Compaint :- '+value.complaints+'</td></tr>';
					}

					if(value.present_medicine !=null && typeof value.present_medicine !='undefined')
					{
						content1 +='<tr><td>Present medicine :- '+value.present_medicine+'</td></tr>';
					}

					if(value.medical_history !=null && typeof value.medical_history !='undefined')
					{
						content1 +='<tr><td>--------History ----------</td></tr>';
						content1 +='<tr><td> Med hist :- '+value.medical_history+'</td></tr>';
					}


					if(value.surgical_history !=null && typeof value.surgical_history !='undefined')
					{
						content1 +='<tr><td> Surgical Hist :- '+value.surgical_history+'</td></tr>';
					}


					if(value.rt_chemo_history !=null && typeof value.rt_chemo_history !='undefined')
					{
						content1 +='<tr><td> Chemo hist :- '+value.rt_chemo_history+'</td></tr>';
						content1 +='<tr><td>--------History ----------</td></tr>';
					}


					content1 +='</tbody>';
					content1 +='</table>';
					//content1 +='</td>';
					//content1 +='</tr>';
					content1 +='</tbody>';
					content1 +='</table>'
					content1 +='</div>';
                        	
                    	});
                    	$('#fetch_header').html(content1);

                    	content = '';
                    	$.each(data, function(key,value)
                    	{	

				if(value.code_1 !=null)
				{
					content += '<table style=width:100%; class=chattbl>';
					content += '<tbody>';

					content += '<tr><td calss=code_1>code -1 is '+value.code_1+'</td></tr>';

					content += '</tbody>';
					content += '</table>';
				}


				

				if( value.code1_url!=null)
				{
					content += '<table style=width:100%; class=chattbl>';
                                        content += '<tbody>';


					var str_array_1 = value.code1_url.split(',');

					for(var i = 0; i < str_array_1.length; i++)
						{

							str_array_1[i] = 'http://localhost/img/'+str_array_1[i];

							content += '<tr>';
							content += '<img src='+str_array_1[i]+'>';
							content += '</tr>';
						}
					content += '</tbody>';
					content += '</table>';

				}



				if(value.code_2 !=null)
				{
					content += '<table style=width:100%; class=chattbl>';
					content += '<tbody>';

					content += '<tr><td calss=code_2>code -2 is '+value.code_2+'</td></tr>';

					content += '</tbody>';
					content += '</table>';

				}
				
				if( value.code2_url!=null)
				{
					content += '<table style=width:100%; class=chattbl>';
								    content += '<tbody>';


					var str_array_2 = value.code2_url.split(',');

					for(var i = 0; i < str_array_2.length; i++)
						{

							str_array_2[i] = 'http://localhost/img/'+str_array_2[i];

							content += '<tr>';
							content += '<img src='+str_array_2[i]+'>';
							content += '</tr>';
						}
					content += '</tbody>';
					content += '</table>';

				}



				if(value.code_3 !=null)
				{
					content += '<table style=width:100%; class=chattbl>';
					content += '<tbody>';
	
					content += '<tr><td calss=code_3>code -3 is '+value.code_3+'</td></tr>';

					content += '</tbody>';
					content += '</table>';
				}



				if( value.code3_url!=null)
				{
					content += '<table style=width:100%; class=chattbl>';
                                        content += '<tbody>';

					var str_array_3 = value.code3_url.split(',');

					for(var i = 0; i < str_array_3.length; i++)
						{

							str_array_3[i] = 'http://localhost/img/'+str_array_3[i];

							content += '<tr>';
							content += '<img src='+str_array_3[i]+'>';
							content += '</tr>';
						}
					content += '</tbody>';
					content += '</table>';

				}




				if(value.code_4 !=null)
				{
					content += '<table style=width:100%; class=chattbl>';
					content += '<tbody>';

					content += '<tr><td calss=code_1>code -4 is '+value.code_4+'</td></tr>';

					content += '</tbody>';
					content += '</table>';
				}



				if( value.code4_url!=null)
				{
					content += '<table style=width:100%; class=chattbl>';
                                        content += '<tbody>';

					var str_array_4 = value.code4_url.split(',');

					for(var i = 0; i < str_array_4.length; i++)
						{

							str_array_4[i] = 'http://localhost/img/'+str_array_4[i];

							content += '<tr>';
							content += '<img src='+str_array_4[i]+'>';
							content += '</tr>';
						}
					content += '</tbody>';
					content += '</table>';

				}


				if(value.code_5 !=null)
				{
					content += '<table style=width:100%; class=chattbl>';
					content += '<tbody>';

					content += '<tr><td calss=code_1>code -5 is '+value.code_5+'</td></tr>';
	
					content += '</tbody>';
					content += '</table>';
				}


				if( value.code5_url!=null)
				{
					content += '<table style=width:100%; class=chattbl>';
                                        content += '<tbody>';

					var str_array_5 = value.code5_url.split(',');

					for(var i = 0; i < str_array_5.length; i++)
						{

							str_array_5[i] = 'http://localhost/img/'+str_array_5[i];

							content += '<tr>';
							content += '<img src='+str_array_5[i]+'>';
							content += '</tr>';
						}
					content += '</tbody>';
					content += '</table>';

				}


                        
                        content += '</div>';
                        //content +='</li>' ;

	                    });

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

