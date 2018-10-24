<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nhlstats";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


	//get gamedata
	$ch = curl_init('http://statsapi.web.nhl.com/api/v1/game/2017030321/feed/live');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result=curl_exec($ch);
	$match1=json_decode($result, true);
	curl_close($ch);
	
	$ch = curl_init('http://statsapi.web.nhl.com/api/v1/game/2017030311/feed/live');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result=curl_exec($ch);
	$match2=json_decode($result, true);
	curl_close($ch);
	
	$games = array();	
	array_push($games, $match1);
	array_push($games, $match2);
	
	foreach($games as $value){
		$ch = curl_init('http://statsapi.web.nhl.com'.$value["gameData"]["teams"]["away"]["link"].'/roster');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result=curl_exec($ch);
		$awayRoster=json_decode($result, true);
		curl_close($ch);
		
		$ch = curl_init('http://statsapi.web.nhl.com'.$value["gameData"]["teams"]["home"]["link"].'/roster');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result=curl_exec($ch);
		$homeRoster=json_decode($result, true);
		curl_close($ch);
		
		//insert away stats
		foreach($awayRoster["roster"] as $value2){
			$ch2 = curl_init('http://statsapi.web.nhl.com/api/v1/people/'.$value2["person"]["id"].'/stats?stats=statsSingleSeason&season=20172018');
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			$result2=curl_exec($ch2);
			$awayStats=json_decode($result2, true);
			
			if($value2["position"]["code"] != "G" && !empty($awayStats["stats"][0]["splits"])){

				$sql = "INSERT INTO `".$value["gameData"]["teams"]["away"]["name"]."` (id, name, position, gamesPlayed, goals, assists, points, plusMinus, shots, hits, penaltyMinutes)
				VALUES ('".$value2["person"]["id"]."', '".$value2["person"]["fullName"]."', '".$value2["position"]["code"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["games"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["goals"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["assists"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["points"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["plusMinus"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["shots"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["hits"]."', '".$awayStats["stats"][0]["splits"][0]["stat"]["pim"]."' )";	


				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				$sql2 = "UPDATE `".$value["gameData"]["teams"]["away"]["name"]."` SET position='".$value2["position"]["code"]."', gamesPlayed='".$awayStats["stats"][0]["splits"][0]["stat"]["games"]."', goals='".$awayStats["stats"][0]["splits"][0]["stat"]["goals"]."', assists='".$awayStats["stats"][0]["splits"][0]["stat"]["assists"]."', points='".$awayStats["stats"][0]["splits"][0]["stat"]["points"]."', plusMinus='".$awayStats["stats"][0]["splits"][0]["stat"]["plusMinus"]."', shots='".$awayStats["stats"][0]["splits"][0]["stat"]["shots"]."', hits='".$awayStats["stats"][0]["splits"][0]["stat"]["hits"]."', penaltyMinutes='".$awayStats["stats"][0]["splits"][0]["stat"]["pim"]."' WHERE id='".$value2["person"]["id"]."'";
				
				if ($conn->query($sql2) === TRUE) {
					//echo "Player stats updated successfully";
				} else {
					echo "Error: " . $sql2 . "<br>" . $conn->error;
				}
			}
		}
		
		// insert home stats
		foreach($homeRoster["roster"] as $value2){
			$ch2 = curl_init('http://statsapi.web.nhl.com/api/v1/people/'.$value2["person"]["id"].'/stats?stats=statsSingleSeason&season=20172018');
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			$result2=curl_exec($ch2);
			$homeStats=json_decode($result2, true);
			
			if($value2["position"]["code"] != "G" && !empty($homeStats["stats"][0]["splits"])){

				$sql = "INSERT INTO `".$value["gameData"]["teams"]["home"]["name"]."` (id, name, position, gamesPlayed, goals, assists, points, plusMinus, shots, hits, penaltyMinutes)
				VALUES ('".$value2["person"]["id"]."', '".$value2["person"]["fullName"]."', '".$value2["position"]["code"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["games"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["goals"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["assists"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["points"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["plusMinus"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["shots"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["hits"]."', '".$homeStats["stats"][0]["splits"][0]["stat"]["pim"]."' )";	


				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				$sql2 = "UPDATE `".$value["gameData"]["teams"]["home"]["name"]."` SET position='".$value2["position"]["code"]."', gamesPlayed='".$homeStats["stats"][0]["splits"][0]["stat"]["games"]."', goals='".$homeStats["stats"][0]["splits"][0]["stat"]["goals"]."', assists='".$homeStats["stats"][0]["splits"][0]["stat"]["assists"]."', points='".$homeStats["stats"][0]["splits"][0]["stat"]["points"]."', plusMinus='".$homeStats["stats"][0]["splits"][0]["stat"]["plusMinus"]."', shots='".$homeStats["stats"][0]["splits"][0]["stat"]["shots"]."', hits='".$homeStats["stats"][0]["splits"][0]["stat"]["hits"]."', penaltyMinutes='".$homeStats["stats"][0]["splits"][0]["stat"]["pim"]."' WHERE id='".$value2["person"]["id"]."'";
				
				if ($conn->query($sql2) === TRUE) {
					//echo "Player stats updated successfully";
				} else {
					echo "Error: " . $sql2 . "<br>" . $conn->error;
				}
			}
		}
		
	}

$conn->close(); 




?>