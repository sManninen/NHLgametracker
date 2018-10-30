<?php




	//get schedule
	$ch = curl_init('http://statsapi.web.nhl.com/api/v1/schedule');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result=curl_exec($ch);
	$schedule=json_decode($result, true);
	curl_close($ch);
	
	print_r($schedule);




	
?>