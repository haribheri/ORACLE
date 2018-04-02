<?php
//sudo chown -R www-data:www-data /home/srihari/Desktop/img/

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



//print "count is ".$total."\n";


	$medical_history=$_POST["medical_history"];
	$surgical_history=$_POST["surgical_history"];
	$rt_chemo_history=$_POST["rt_chemo_history"];

//print "name is ".$name."\n";
//print "gender is ".$gender."\n";
//print "disease code is". $disease_code."\n";
//print "med history is ".$medical_history."\n";



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

/************************************code-1*********************************/

$code_1=$_POST["code_1"];

$fileName_1 = $_FILES["c_url_1"]["name"]; // The file name
$fileTmpLoc_1 = $_FILES["c_url_1"]["tmp_name"]; // File in the PHP tmp folder
$fileType_1 = $_FILES["c_url_1"]["type"]; // The type of file it is
$fileSize_1 = $_FILES["c_url_1"]["size"]; // File size in bytes

print "count for code-1 is ".count($fileName_1)."\n";

			if (isset($code_1) && $code_1 !='')
				{
					$code_1="'".$code_1."'";
				}
				else
				{
					$code_1='null';
				}
			if (isset($url_1) && $url_1 !='')
				{
					$url_1="'".$url_1."'";
				}
				else
				{
					$url_1='null';
				}

		for($i=0;$i<count($fileName_1);$i++)
		{

			for($j=0;$j<strlen($fileType_1[$i]);$j++)
			{
	
				if($fileType_1[$i][$j]=='/')
					break;
			}
			print "\n====img size is=====\n";
			$var_1=getimagesize($fileTmpLoc_1[$i]);
			print_r($var);
			print "\n====img size is=====\n";

			/*print substr($fileName_1[$i],-4);
			print "\n=========\n";
			print substr($fileName_1[$i], -1, strpos($fileName_1[$i], "."));
			print "\n=========\n";
			*/

			if($var_1[bits]>0)
			{
				$url_1=$i.".".substr($fileType_1[$i],$j+1);
				print "value at ".$i." is ".$url_1."\n";
				//$new_url;


				echo $sql_4="insert into tbl_med_codes_1(fk_uniq_id,code_1,code1_url) values ($uniqid,$code_1,'$url_1') returning code1_url" ;
	
				$res_4=pg_query($dbh,$sql_4);

				if(!$res_4)
				{		
					echo pg_last_error($dbh);
				}
				else
				{
					echo "Records created successfully for tbl_med_history\n";
				}

			
				$new_url_1=pg_fetch_all($res_4);
				print_r($new_url_1);
				$new_url_1=$new_url_1[0]['code1_url'];
				print "bheri url is ".$new_url_1."\n";
				$fileName_1[$i]=$new_url_1;
				// sudo chmod 777 /home/srihari/Desktop/img/
			
				move_uploaded_file($fileTmpLoc_1[$i],'/var/www/html/img/'.$fileName_1[$i]);  //home

				//move_uploaded_file($fileTmpLoc_1[$i],'/home/srihari/Desktop/img/'.$fileName_1[$i]);  //home
				//move_uploaded_file($fileTmpLoc_1[$i],'/var/www/html/uploads/'.$fileName_1[$i]);	//office
			}
		}


/************************************code-2*********************************/

$code_2=$_POST["code_2"];

$fileName_2 = $_FILES["c_url_2"]["name"]; // The file name
$fileTmpLoc_2 = $_FILES["c_url_2"]["tmp_name"]; // File in the PHP tmp folder
$fileType_2 = $_FILES["c_url_2"]["type"]; // The type of file it is
$fileSize_2 = $_FILES["c_url_2"]["size"]; // File size in bytes

print "count for code-2 is ".count($fileName_2)."\n";

				if (isset($code_2) && $code_2 !='')
					{
						$code_2="'".$code_2."'";
					}
					else
					{
						$code_2='null';
					}
				if (isset($url_2) && $url_2 !='')
					{
						$url_2="'".$url_2."'";
					}
					else
					{
						$url_2='null';
					}



		for($i=0;$i<count($fileName_2);$i++)
		{
			for($j=0;$j<strlen($fileType_2[$i]);$j++)
			{
	
				if($fileType_2[$i][$j]=='/')
					break;
			}
			//print "\n=========\n";
			$var_2=getimagesize($fileTmpLoc_2[$i]);
			//print_r($var);
			//print "\n=========\n";

			/*print substr($fileName_2[$i],-4);
			print "\n=========\n";
			print substr($fileName_2[$i], -1, strpos($fileName_2[$i], "."));
			print "\n=========\n";
			*/
			if($var_2[bits]>0)
			{
				$url_2=$i.".".substr($fileType_2[$i],$j+1);
				print "value at ".$i." is ".$url_2."\n";
				//$new_url;



				$sql_5="insert into tbl_med_codes_2(fk_uniq_id,code_2,code2_url) values ($uniqid,$code_2,'$url_2') returning code2_url" ;
	
				$res_5=pg_query($dbh,$sql_5);

				if(!$res_5)
				{		
					echo pg_last_error($dbh);
				}
				else
				{
					echo "Records created successfully for tbl_med_history\n";
				}

			
				$new_url_2=pg_fetch_all($res_5);
				print_r($new_url_2);
				$new_url_2=$new_url_2[0]['code2_url'];
				print "final url is ".$new_url_2."\n";
				$fileName_2[$i]=$new_url_2;
				// sudo chmod 777 /home/srihari/Desktop/img/
			
				move_uploaded_file($fileTmpLoc_2[$i],'/var/www/html/img/'.$fileName_2[$i]);  //home
				//move_uploaded_file($fileTmpLoc_2[$i],'/home/srihari/Desktop/img/'.$fileName_2[$i]);  //home
				//move_uploaded_file($fileTmpLoc_2[$i],'/var/www/html/uploads/'.$fileName_2[$i]);	//office
			}
		}




/************************************code-3*********************************/

$code_3=$_POST["code_3"];

$fileName_3 = $_FILES["c_url_3"]["name"]; // The file name
$fileTmpLoc_3 = $_FILES["c_url_3"]["tmp_name"]; // File in the PHP tmp folder
$fileType_3 = $_FILES["c_url_3"]["type"]; // The type of file it is
$fileSize_3 = $_FILES["c_url_3"]["size"]; // File size in bytes

print "count for code-3 is ".count($fileName_3)."\n";


			if (isset($code_3) && $code_3 !='')
			{
				$code_3="'".$code_3."'";
			}
			else
			{
				$code_3='null';
			}
			if (isset($url_3) && $url_3 !='')
			{
				$url_3="'".$url_3."'";
			}
			else
			{
				$url_3='null';
			}


		for($i=0;$i<count($fileName_3);$i++)
		{
			for($j=0;$j<strlen($fileType_3[$i]);$j++)
			{
	
				if($fileType_3[$i][$j]=='/')
					break;
			}
			//print "\n=========\n";
			$var_3=getimagesize($fileTmpLoc_3[$i]);
			//print_r($var);
			//print "\n=========\n";

			/*print substr($fileName_3[$i],-4);
			print "\n=========\n";
			print substr($fileName_3[$i], -1, strpos($fileName_3[$i], "."));
			print "\n=========\n";
			*/
			if($var_3[bits]>0)
			{	
				$url_3=$i.".".substr($fileType_3[$i],$j+1);
				print "value at ".$i." is ".$url_3."\n";
				//$new_url;
				$sql_6="insert into tbl_med_codes_3(fk_uniq_id,code_3,code3_url) values ($uniqid,$code_3,'$url_3') returning code3_url" ;
				$res_6=pg_query($dbh,$sql_6);
				if(!$res_6)
				{		
					echo pg_last_error($dbh);
				}
				else
				{
					echo "Records created successfully for tbl_med_history\n";
				}

			
				$new_url_3=pg_fetch_all($res_6);
				print_r($new_url_3);
				$new_url_3=$new_url_3[0]['code3_url'];
				print "final url is ".$new_url_3."\n";
				$fileName_3[$i]=$new_url_3;
				// sudo chmod 777 /home/srihari/Desktop/img/
				move_uploaded_file($fileTmpLoc_3[$i],'/var/www/html/img/'.$fileName_3[$i]);  //home
				//move_uploaded_file($fileTmpLoc_3[$i],'/home/srihari/Desktop/img/'.$fileName_3[$i]);  //home
				//move_uploaded_file($fileTmpLoc_3[$i],'/var/www/html/uploads/'.$fileName_3[$i]);	//office
			}
		}

/************************************code-4*********************************/

$code_4=$_POST["code_4"];

$fileName_4 = $_FILES["c_url_4"]["name"]; // The file name
$fileTmpLoc_4 = $_FILES["c_url_4"]["tmp_name"]; // File in the PHP tmp folder
$fileType_4 = $_FILES["c_url_4"]["type"]; // The type of file it is
$fileSize_4 = $_FILES["c_url_4"]["size"]; // File size in bytes

print "count for code-4 is ".count($fileName_4)."\n";


			if (isset($code_4) && $code_4 !='')
			{
				$code_4="'".$code_4."'";
			}
			else
			{
				$code_4='null';
			}
			if (isset($url_4) && $url_4 !='')
			{
				$url_4="'".$url_4."'";
			}
			else
			{
				$url_4='null';
			}


		for($i=0;$i<count($fileName_4);$i++)
		{
			for($j=0;$j<strlen($fileType_4[$i]);$j++)
			{
	
				if($fileType_4[$i][$j]=='/')
					break;
			}
			//print "\n=========\n";
			$var_4=getimagesize($fileTmpLoc_4[$i]);
			//print_r($var);
			//print "\n=========\n";

			/*print substr($fileName_4[$i],-4);
			print "\n=========\n";
			print substr($fileName_4[$i], -1, strpos($fileName_4[$i], "."));
			print "\n=========\n";
			*/


			if($var_4[bits]>0)
			{
				$url_4=$i.".".substr($fileType_4[$i],$j+1);
				print "value at ".$i." is ".$url_4."\n";
				//$new_url;




				$sql_7="insert into tbl_med_codes_4(fk_uniq_id,code_4,code4_url) values ($uniqid,$code_4,'$url_4') returning code4_url" ;
		
				$res_7=pg_query($dbh,$sql_7);

				if(!$res_7)
				{		
					echo pg_last_error($dbh);
				}
				else
				{
					echo "Records created successfully for tbl_med_history\n";
				}

			
				$new_url_4=pg_fetch_all($res_7);
				print_r($new_url_4);
				$new_url_4=$new_url_4[0]['code4_url'];
				print "final url is ".$new_url_4."\n";
				$fileName_4[$i]=$new_url_4;
				//sudo chmod 777 /home/srihari/Desktop/img/
				move_uploaded_file($fileTmpLoc_4[$i],'/var/www/html/img/'.$fileName_4[$i]);  //home
//				move_uploaded_file($fileTmpLoc_4[$i],'/home/srihari/Desktop/img/'.$fileName_4[$i]);  //home
				//move_uploaded_file($fileTmpLoc_4[$i],'/var/www/html/uploads/'.$fileName_4[$i]);	//office
			}
		}



/************************************code-5*********************************/

$code_5=$_POST["code_5"];

$fileName_5 = $_FILES["c_url_5"]["name"]; // The file name
$fileTmpLoc_5 = $_FILES["c_url_5"]["tmp_name"]; // File in the PHP tmp folder
$fileType_5 = $_FILES["c_url_5"]["type"]; // The type of file it is
$fileSize_5 = $_FILES["c_url_5"]["size"]; // File size in bytes

print "count for code-5 is ".count($fileTmpLoc_5)."\n";

			if (isset($code_5) && $code_5 !='')
			{
				$code_5="'".$code_5."'";
			}
			else
			{
				$code_5='null';
			}


		for($i=0;$i<count($fileName_5);$i++)
		{
			for($j=0;$j<strlen($fileType_5[$i]);$j++)
			{
	
				if($fileType_5[$i][$j]=='/')
					break;
			}
			print "\n====img size is=====\n";
			$var_5=getimagesize($fileTmpLoc_5[$i]);
			print_r($var);
			print "\n====img size is=====\n";

			/*print substr($fileName_5[$i],-4);
			print "\n=========\n";
			print substr($fileName_5[$i], -1, strpos($fileName_5[$i], "."));
			print "\n=========\n";
			*/

			if($var_5[bits]>0)
			{
				$url_5=$i.".".substr($fileType_5[$i],$j+1);
				print "value at ".$i." is ".$url_5."\n";
				//$new_url;

				$sql_8="insert into tbl_med_codes_5(fk_uniq_id,code_5,code5_url) values ($uniqid,$code_5,'$url_5') returning code5_url" ;
	
				$res_8=pg_query($dbh,$sql_8);

				if(!$res_8)
				{		
					echo pg_last_error($dbh);
				}
				else
				{
					echo "Records created successfully for tbl_med_history\n";
				}

			
				$new_url_5=pg_fetch_all($res_8);
				print_r($new_url_5);
				$new_url_5=$new_url_5[0]['code5_url'];
				print "final url is ".$new_url_5."\n";
				$fileName_5[$i]=$new_url_5;
				// sudo chmod 777 /home/srihari/Desktop/img/
				move_uploaded_file($fileTmpLoc_5[$i],'/var/www/html/img/'.$fileName_5[$i]);  //home
				//move_uploaded_file($fileTmpLoc_5[$i],'/home/srihari/Desktop/img/'.$fileName_5[$i]);  //home
				//move_uploaded_file($fileTmpLoc_5[$i],'/var/www/html/uploads/'.$fileName_5[$i]);	//office
			}
}                                                                                                                                                                                                                     
?>
