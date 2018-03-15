<?php

	$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=medical password=1234") or die("pg_not connect");//home
	//$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office

	$postData = json_decode(file_get_contents('php://input'), true);

//	$name=$postData["p_name"];
	$pid=$postData["pid"];
//print "id is".$pid."\n";
//print "name is is".$name."\n";


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

$sql1="select uniq_id,p_name,gender,mobile,dob,mr_number,op_ip,insert_date,recent_date from tbl_patient where  uniq_id=$pid";
	$res1 = pg_query($dbh, $sql1);
	if(!$res1)
	{
		echo pg_last_error($dbh);
	}
	$result1=pg_fetch_all($res1);


	$sql2="select disease_code,complaints, present_medicine,ge,pa,eg,dre from tbl_disease where fk_uniq_id=$pid";
	$res2 = pg_query($dbh, $sql2);
	if(!$res2)
	{
		echo pg_last_error($dbh);
	}
	$result2=pg_fetch_all($res2);

		$sql3="select medical_history,surgical_history,rt_chemo_history from tbl_med_history where fk_uniq_id=$pid";
	$res3 = pg_query($dbh, $sql3);
	if(!$res3)
	{
		echo pg_last_error($dbh);
	}
	$result3=pg_fetch_all($res3);





 $sql4="select code_1,code1_url from tbl_med_codes_1 where fk_uniq_id=$pid";
	$res4 = pg_query($dbh, $sql4);
	if(!$res4)
	{
		echo pg_last_error($dbh);
	}
	$result4=pg_fetch_all($res4);
	foreach ($result4 as $key => $value) 
	{
	        $result[$key]['code1_url'] = '/home/bheri/Desktop/img/'.$result[$key]['code1_url'];
	        //$result2[$key]['code1_url'] = 'http://localhost/uploads/'.$result2[$key]['code1_url'];					
	}

$sql5="select code_2, code2_url from tbl_med_codes_2 where fk_uniq_id=$pid";
	$res5 = pg_query($dbh, $sql5);
	if(!$res5)
	{
		echo pg_last_error($dbh);
	}
	$result5=pg_fetch_all($res5);
	foreach ($result5 as $key => $value) 
	{
	        $result[$key]['url'] = '/home/bheri/Desktop/img/'.$result[$key]['url'];
	        //$result2[$key]['url'] = 'http://localhost/uploads/'.$result2[$key]['url'];					
	}



		$sql6="select code_3, code3_url from tbl_med_codes_3 where fk_uniq_id=$pid";
	$res6 = pg_query($dbh, $sql6);
	if(!$res6)
	{
		echo pg_last_error($dbh);
	}
	$result6=pg_fetch_all($res6);
	foreach ($result6 as $key => $value) 
	{
	        $result[$key]['url'] = '/home/bheri/Desktop/img/'.$result[$key]['url'];
	        //$result2[$key]['url'] = 'http://localhost/uploads/'.$result2[$key]['url'];					
	}



	$sql7="select code_4, code4_url from tbl_med_codes_4 where fk_uniq_id=$pid";
	$res7 = pg_query($dbh, $sql7);
	if(!$res7)
	{
		echo pg_last_error($dbh);
	}
	$result7=pg_fetch_all($res7);
	foreach ($result7 as $key => $value) 
	{
	        //$result[$key]['url'] = '/home/bheri/Desktop/img/'.$result[$key]['url'];
	        $result2[$key]['url'] = 'http://localhost/uploads/'.$result2[$key]['url'];					
	}



	$sql8="select code_5,code5_url from tbl_med_codes_5 where fk_uniq_id=$pid";
	$res8 = pg_query($dbh, $sql8);
	if(!$res8)
	{
		echo pg_last_error($dbh);
	}
	$result8=pg_fetch_all($res8);
	foreach ($result8 as $key => $value) 
	{
	        //$result[$key]['url'] = '/home/bheri/Desktop/img/'.$result[$key]['url'];
	        $result2[$key]['url'] = 'http://localhost/uploads/'.$result2[$key]['url'];					
	}


	print json_encode(array_merge($result1,$result2,$result3,$result4,$result5,$result6,$result7,$result8));

	pg_close($dbh);
/*
//print_r($result2);

	foreach ($result2 as $key => $value) 
	{
	        //$result[$key]['url'] = '/home/bheri/Desktop/img/'.$result[$key]['url'];
	        $result2[$key]['url'] = 'http://localhost/uploads/'.$result2[$key]['url'];					
	}

//print_r(array_merge($a1,$a2));
	print json_encode(array_merge($result1,$result2));

//	print json_encode($result1);
//	print json_encode($result2);




	//$sql="select a.*,url from patient_details a,patient_url b where a.pid=b.pid and (a.pid= or a.pat_name= or a.disease=)";
$sql="select a.*,url from patient_details a,patient_url b where a.pid=b.pid and a.pid=".$pid;




	$res = pg_query($dbh, $sql);

	if(!$res)
	{
		echo pg_last_error($dbh);
	}
	$result=pg_fetch_all($res);

	foreach ($result as $key => $value) 
	{
	        //$result[$key]['url'] = '/home/bheri/Desktop/img/'.$result[$key]['url'];
	        $result[$key]['url'] = 'http://localhost/uploads/'.$result[$key]['url'];					
	}

	foreach ($result as $key => $value) 
	{
	        $result[$key]['url'] = 'https://i.pinimg.com/736x/e3/47/d1/e347d197853ca6bfdc756c988dce5939.jpg';
//	        $result[$key]['url'] = 'https://instagram.fdel1-1.fna.fbcdn.net/t51.2885-19/s1080x1080/23161850_126256574711506_2011976802745974784_n.jpg';
	}


	print json_encode($result);
//url=/home/bheri/Desktop/img/.url;
*/

?>
