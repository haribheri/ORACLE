<?php
//sudo chown -R www-data:www-data /home/bheri/Desktop/img/

//PATIENT DETAILS
	$name=$_POST["p_name"];
	$gender=$_POST["gender"];
	$mobile=$_POST["p_mobile"];
	$birth_date=$_POST["birth_date"];
	$mr_num=$_post["mr_num"];
	$op_ip=$_post["op_ip"];

//DESEASE DETAILS

	$disease_code=$_POST["disease_code"];
	$disease_name=$_POST["disease_name"];
	$complaints=$_POST["complaints"];
	$present_medicine=$_POST["present_medicine"];
	$ge=$_POST["ge"];
	$pa=$_POST["pa"];
	$eg=$_POST["eg"];
	$dre=$_POST["dre"];


//Medicl history


$total = count($_FILES['c_url_1']['name']);



print "count is ".$total."\n";


	$medical_history=$_POST["medical_history"];
	$surgical_history=$_POST["surgical_history"];
	$rt_chemo_history=$_POST["rt_chemo_history"];

print "name is ".$name."\n";
print "gender is ".$gender."\n";
print "disease code is". $disease_code."\n";
print "med history is ".$medical_history."\n";



	$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=medical password=1234") or die("pg_not connect");//home
	//$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office

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
		$uniqid=$res_data_1[0]['uniq_id'];

//print "o/p is ".$uniqid.'\n';






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



	if (isset($_POST['complaints']) && $_POST['complaints'] !='')
	{
		$complaints="'".$_POST['complaints']."'";
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



	$sql_2="insert into tbl_disease(fk_uniq_id,disease_code,disease_name,complaints,present_medicine,ge,pa,eg,dre) 
				values ($uniqid,$disease_code,$disease_name,$complaints,$present_medicine,$ge,$pa,$eg,$dre)";

	$res_2=pg_query($dbh,$sql_2);
	
	if(!$res_2)
	{
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_disease\n";
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

//medical-codes


/*

tbl_patient (uniq_id numeric,p_name text, gender text,mobile text,dob  timestamp without time zone, mr_number numeric,op_ip text,disease_code numeric, insert_date  timestamp without time zone, recent_date  timestamp without time zone );

tbl_disease(fk_uniq_id numeric,disease_code numeric,disease_name text,complaints text, present_medicine text,ge text,pa text,eg text,dre text);

tbl_med_history(fk_uniq_id numeric,fk_disease_code numeric,medical_history text, surgical_history text, rt_chemo_history text);

tbl_med_codes_1(fk_uniq_id numeric,code_1 numeric,code1_url text);

tbl_med_codes_2(fk_uniq_id numeric,code_2 numeric,code2_url text);

tbl_med_codes_3(fk_uniq_id numeric,code_3 numeric,code3_url text);

tbl_med_codes_4(fk_uniq_id numeric,code_4 numeric,code4_url text);

tbl_med_codes_5(fk_uniq_id numeric,code_5 numeric,code5_url text);

*/

	
//medical codes


$code_1=$_POST["code_1"];

$fileName = $_FILES["c_url_1"]["name"]; // The file name
$fileTmpLoc = $_FILES["c_url_1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["c_url_1"]["type"]; // The type of file it is
$fileSize = $_FILES["c_url_1"]["size"]; // File size in bytes

print "count is ".count($fileName)."\n";

		for($i=0;$i<count($fileName);$i++)
		{
			for($j=0;$j<strlen($fileType[$i]);$j++)
			{
	
				if($fileType[$i][$j]=='/')
					break;
			}
			print "\n=========\n";
			$var=getimagesize($fileTmpLoc[$i]);
			print_r($var);
			print "\n=========\n";

			/*print substr($fileName[$i],-4);
			print "\n=========\n";
			print substr($fileName[$i], -1, strpos($fileName[$i], "."));
			print "\n=========\n";
			*/

			$url=$uniqid.".".$i.".".substr($fileType[$i],$j+1);
			print "value at ".$i." is ".$url."\n";
			//$new_url;
			//$sql_1="insert into patient_url(pid,url) values ($pid,'$url') returning url";
		//	$res_1 = pg_query($dbh, $sql_1);
		//	if(!$res_1)
        	//	{
		//		echo pg_last_error($dbh);
        	//	}
			
		//	$new_url=pg_fetch_all($res_1);
		//	$new_url=$new_url[0]['url'];
		//	$fileName[$i]=$new_url;
			//move_uploaded_file($fileTmpLoc[$i],'/home/bheri/Desktop/img/'.$fileName[$i]);  //home
		//	move_uploaded_file($fileTmpLoc[$i],'/var/www/html/uploads/'.$fileName[$i]);	//office
		}

exit;
/*

 fk_uniq_id | numeric | 
 code_1     | numeric | 
 code1_url  | text    | 
*/
	$sql_4="insert into tbl_med_codes_1(fk_uniq_id,code_1,code1_url) values ($uniqid,$code_1,$code1_url) returning $code1_url" ;
	
	$res_4=pg_query($dbh,$sql_4);

	if(!$res_4)
	{		
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_med_history\n";
	}


	$sql_5="insert into tbl_med_codes_2(fk_uniq_id,code_2,code2_url) values ($uniqid,$code_2,$code2_url)" ;
	
	$res_5=pg_query($dbh,$sql_5);

	if(!$res_5)
	{		
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_med_history\n";
	}



	$sql_6="insert into tbl_med_codes_3(fk_uniq_id,code_3,code3_url) values ($uniqid,$code_3,$code3_url)" ;
	
	$res_6=pg_query($dbh,$sql_6);

	if(!$res_6)
	{		
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_med_history\n";
	}

	$sql_7="insert into tbl_med_codes_4(fk_uniq_id,code_4,code1_url) values ($uniqid,$code_4,$code4_url)" ;
	
	$res_7=pg_query($dbh,$sql_7);

	if(!$res_7)
	{		
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_med_history\n";
	}

	$sql_8="insert into tbl_med_codes_5(fk_uniq_id,code_5,code5_url) values ($uniqid,$code_5,$code5_url)" ;
	
	$res_8=pg_query($dbh,$sql_8);

	if(!$res_8)
	{		
		echo pg_last_error($dbh);
	}
	else
	{
		echo "Records created successfully for tbl_med_history\n";
	}


                                                                                                                                                                                                                       


?>
