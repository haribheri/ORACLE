<?php

	$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=postgres password=1234") or die("pg_not connect");//home

	//$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office

	$sql1= "select * from patient_details";

	$res = pg_query($dbh, $sql1);

	        if(!$res)
	        {
	              echo pg_last_error($dbh);
	        }
                 $result=pg_fetch_all($res);

		print json_encode($result);

	        pg_close($dbh);
?>

