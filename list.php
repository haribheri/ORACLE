<?php


	$dbh = pg_connect("host=localhost port=5433 user=bheri dbname=medical password=1234") or die("pg_not connect");//home
	//$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office

	$sql1= "select uniq_id,p_name,disease_code,disease_name from tbl_patient,tbl_disease where fk_uniq_id=uniq_id;";

	$res = pg_query($dbh, $sql1);

	        if(!$res)
	        {
	              echo pg_last_error($dbh);
	        }
                 $result=pg_fetch_all($res);

		print json_encode($result);

	        pg_close($dbh);
?>

