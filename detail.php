<?php

	$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=medical password=1234") or die("pg_not connect");//home
	//$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=srihari password=123456") or die("pg_not connect"); //office

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

 $sql1="select uniq_id,p_name,gender,mobile,dob,mr_number,op_ip,to_char(insert_date,'dd-MON-yyyy')insert_date,to_char(recent_date,'dd-MON-yyyy')recent_date from tbl_patient where  uniq_id=$pid";
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



	if($result2!=NULL)
		$result2=array_merge($result1,$result2);
	else
		$result2=$result1;


		$sql3="select medical_history,surgical_history,rt_chemo_history from tbl_med_history where fk_uniq_id=$pid";
	$res3 = pg_query($dbh, $sql3);
	if(!$res3)
	{
		echo pg_last_error($dbh);
	}
	$result3=pg_fetch_all($res3);

	if($result3!=NULL)
		$result3=array_merge($result2,$result3);
	else
		$result3=$result2;


	//$sql4="select code_1,code1_url from tbl_med_codes_1 where fk_uniq_id=$pid";
	$sql4="select code_1, string_agg(code1_url,',')code1_url from tbl_med_codes_1 where fk_uniq_id=$pid group by code_1";
	$res4 = pg_query($dbh, $sql4);
	if(!$res4)
	{
		echo pg_last_error($dbh);
	}
	$result4=pg_fetch_all($res4);




	if($result4!=NULL)
		$result4=array_merge($result3,$result4);
	else
		$result4=$result3;


	$sql5="select code_2, string_agg(code2_url,',')code2_url from tbl_med_codes_2 where fk_uniq_id=$pid group by code_2";
	$res5 = pg_query($dbh, $sql5);
	if(!$res5)
	{
		echo pg_last_error($dbh);
	}
	$result5=pg_fetch_all($res5);

	if($result5!=NULL)
		$result5=array_merge($result4,$result5);
	else
		$result5=$result4;


	$sql6="select code_3, string_agg(code3_url,',')code3_url from tbl_med_codes_3 where fk_uniq_id=$pid group by code_3";
	$res6 = pg_query($dbh, $sql6);
	if(!$res6)
	{
		echo pg_last_error($dbh);
	}
	$result6=pg_fetch_all($res6);
	
	if($result6!=NULL)
		$result6=array_merge($result5,$result6);
	else
		$result6=$result5;


	$sql7="select code_4, string_agg(code4_url,',')code4_url from tbl_med_codes_4 where fk_uniq_id=$pid group by code_4";
	$res7 = pg_query($dbh, $sql7);
	if(!$res7)
	{
		echo pg_last_error($dbh);
	}
	$result7=pg_fetch_all($res7);
	

	if($result7!=NULL)
		$result7=array_merge($result6,$result7);
	else
		$result7=$result6;



	$sql8="select code_5,string_agg(code5_url,',')code5_url from tbl_med_codes_5 where fk_uniq_id=$pid group by code_5";
	$res8 = pg_query($dbh, $sql8);
	if(!$res8)
	{
		echo pg_last_error($dbh);
	}
	$result8=pg_fetch_all($res8);
	

	if($result8!=NULL)
		$result8=array_merge($result7,$result8);
	else
		$result8=$result7;

	print json_encode($result8);

	pg_close($dbh);

?>
