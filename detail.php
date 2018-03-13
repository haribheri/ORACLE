<?php

	$dbh = pg_connect("host=localhost port=5432 user=bheri dbname=medical password=1234") or die("pg_not connect");//home
	//$dbh = pg_connect("host=localhost port=5433 user=postgres dbname=bheri password=123456") or die("pg_not connect"); //office

	$postData = json_decode(file_get_contents('php://input'), true);

	$name=$postData["p_name"];
	$pid=$postData["pid"];
print "id is".$pid."\n";
print "name is is".$name."\n";
exit;
	 $sql1="select pid, pat_name, disease, pat_mobile, pat_address, to_char(first_visit,'dd-MON-yyyy')first_visit , to_char(latest_visit,'dd-MON-yyyy')latest_visit,data from patient_details where pid=".$pid;

	$sql2 ="select url from patient_url where pid=".$pid;

	$res1 = pg_query($dbh, $sql1);
	$res2 = pg_query($dbh, $sql2);

	if(!$res1)
	{
		echo pg_last_error($dbh);
	}
	$result1=pg_fetch_all($res1);

	if(!$res2)
	{
		echo pg_last_error($dbh);
	}
	$result2=pg_fetch_all($res2);

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


/*

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
/*
	foreach ($result as $key => $value) 
	{
	        $result[$key]['url'] = 'https://i.pinimg.com/736x/e3/47/d1/e347d197853ca6bfdc756c988dce5939.jpg';
//	        $result[$key]['url'] = 'https://instagram.fdel1-1.fna.fbcdn.net/t51.2885-19/s1080x1080/23161850_126256574711506_2011976802745974784_n.jpg';
	}


	print json_encode($result);
*/

//url=/home/bheri/Desktop/img/.url;

	pg_close($dbh);
?>
