<?php
//sudo chown -R www-data:www-data /home/bheri/Desktop/img/
	$name=$_POST["p_name"];
	$gender=$_POST["gender"];
	$mobile=$_POST["p_mobile"];
	$birth_date=$_POST["birth_date"];
	$mr_num=$_post["mr_num"];
	$op_ip=$_post["op_ip"];

	$disease_code=$_POST["disease_code"];
	$disease_name=$_POST["disease_name"];

	$complaints=$_POST["complaints"];

	$present_medicine=$_POST["present_medicine"];
	$ge=$_POST["ge"];
	$pa=$_POST["pa"];
	$eg=$_POST["eg"];
	$dre=$_POST["dre"];

	$medical_history=$_POST["medical_history"];
	$surgical_history=$_POST["surgical_history"];
	$rt_chemo_history=$_POST["rt_chemo_history"];


//	$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=medical password=1234") or die("pg_not connect");//home
	$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office

/*
tbl_patient (uniq_id numeric,p_name text, gender text,mobile text,dob  timestamp without time zone, mr_number numeric,op_ip text,disease_code numeric, insert_date  timestamp without time zone, recent_date  timestamp without time zone );

tbl_disease(fk_uniq_id numeric,disease_code numeric,disease_name text,complaints text, present_medicine text,ge text,pa text,eg text,dre text);

tbl_med_history(f_uniq_id numeric,fk_disease_code numeric,medical_history text, surgical_history text, rt_chemo_history text);
*/

	if (isset($_POST['p_name']) && $_POST['p_name'] !='')
	{
		$name="'".$_POST['p_name']."'";
	}
	else
	{
		$name='null';
	}

	if (isset($_POST['gender']) && $_POST['gender'] !='')
	{
		$gender="'".$_POST['gender']."'";
	}
	else
	{
		$gender='null';
	}

	if (isset($_POST['p_mobile']) && $_POST['p_mobile'] !='')
	{
		$mobile="'".$_POST['p_mobile']."'";
	}
	else
	{
		$mobile='null';
	}

	if (isset($_POST['birth_date']) && $_POST['birth_date'] !='')
	{
		$birth_date="'".$_POST['birth_date']."'";
	}
	else
	{
		$birth_date='null';
	}
	if (isset($_post['mr_num']) && $_post['mr_num'] !='')
	{
		$mr_num="'".$_post['mr_num']."'";
	}
	else
	{
		$mr_num='null';
	}

	if (isset($_post['op_ip']) && $_post['op_ip'] !='')
	{
		$op_ip="'".$_post['op_ip']."'";
	}
	else
	{
		$op_ip='null';
	}

	if (isset($_POST['disease_code']) && $_POST['disease_code'] !='')
	{
		$disease_code="'".$_POST['disease_code']."'";
	}
	else
	{
		$disease_code='null';
	}

	if (isset($_POST['disease_name']) && $_POST['disease_name'] !='')
	{
		$disease_name="'".$_POST['disease_name']."'";
	}
	else
	{
		$disease_name='null';
	}



	if (isset(=$_POST['complaints']) && =$_POST['complaints'] !='')
	{
		$complaints="'".=$_POST['complaints']."'";
	}
	else
	{
		$complaints='null';
	}

	if (isset($_POST['present_medicine']) && $_POST['present_medicine'] !='')
	{
		$present_medicine="'".$_POST['present_medicine']."'";
	}
	else
	{
		$present_medicine='null';
	}

	if (isset($_POST['ge']) && $_POST['ge'] !='')
	{
		$ge="'".$_POST['ge']."'";
	}
	else
	{
		$ge='null';
	}

	if (isset($_POST['pa']) && $_POST['pa'] !='')
	{
		$pa="'".$_POST['pa']."'";
	}
	else
	{
		$pa='null';
	}

	if (isset($_POST['eg']) && $_POST['eg'] !='')
	{
		$eg="'".$_POST['eg']."'";
	}
	else
	{
		$eg='null';
	}

	if (isset($_POST['dre']) && $_POST['dre'] !='')
	{
		$dre="'".$_POST['dre']."'";
	}
	else
	{
		$dre='null';
	}

	if (isset($_POST['medical_history']) && $_POST['medical_history'] !='')
	{
		$medical_history="'".$_POST['medical_history']."'";
	}
	else
	{
		$medical_history='null';
	}

	if (isset($_POST['surgical_history']) && $_POST['surgical_history'] !='')
	{
		$surgical_history="'".$_POST['surgical_history']."'";
	}
	else
	{
		$surgical_history='null';
	}

	if (isset($_POST['rt_chemo_history']) && $_POST['rt_chemo_history'] !='')
	{
		$rt_chemo_history="'".$_POST['rt_chemo_history']."'";
	}
	else
	{
		$rt_chemo_history='null';
	}

/*

tbl_patient (uniq_id numeric,p_name text, gender text,mobile text,dob  timestamp without time zone, mr_number numeric,op_ip text,disease_code numeric, insert_date  timestamp without time zone, recent_date  timestamp without time zone );

tbl_disease(fk_uniq_id numeric,disease_code numeric,disease_name text,complaints text, present_medicine text,ge text,pa text,eg text,dre text);

tbl_med_history(fk_uniq_id numeric,fk_disease_code numeric,medical_history text, surgical_history text, rt_chemo_history text);
*/

	$sql_1="insert into tbl_patient(p_name,gender,mobile,dob,mr_number,op_ip) values ($name,$gender,$mobile,$birth_date,$mr_num,$op_ip) returning uniq_id";

	$res_1=pg_query($dbh,$sql_1);
	
	if(!$res_1)
	{
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully fro tbl_patient\n";
	}

	$res_data_1=pg_fetch_all($res_1);
//print_r($res_data_1);
		$uniqid=$id[0]['uniq_id'];


	$sql_2="insert into tbl_disease(disease_code,disease_name,fk_uniq_id,complaints,present_medicine,ge,pa,eg,dre) values ($disease_code,$disease_name,$uniqid,$complaints,$present_medicine,$ge,$pa,$eg,$dre)";

	$res_2=pg_query($dbh,$sql_2);
	
	if(!$res_2)
	{
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_disease\n";
	}


	$sql_3="insert into tbl_med_history(fk_uniq_id,fk_disease_code,medical_history,surgical_history,rt_chemo_history) values ($uniqid,$disease_code,$medical_history,$surgical_history,$rt_chemo_history)";

	$res_3=pg_query($dbh,$sql_3);
	
	if(!$res_3)
	{
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_med_history\n";
	}

                                                                                                                                                                                                                                               


?>a
