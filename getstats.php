<?php 

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'getStats':
			def();
            break;
    }
}

function def(){
	
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
	
	$vientidata = array();
	
	$games = array();	
	array_push($games, $match1);
	array_push($games, $match2);
	
	foreach($games as $value){
		
		$playerStatsAway = array();
		$playerStatsHome = array();
		
		//get away stats
		$sql = "SELECT name, position, gamesPlayed, goals, assists, points, plusMinus, shots, hits, penaltyMinutes FROM `".$value["gameData"]["teams"]["away"]["name"]."`";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//print_R($row);
				//echo"<br></br>";
				array_push($playerStatsAway, $row);			
			}
		}
		
		//get home stats
		$sql = "SELECT name, position, gamesPlayed, goals, assists, points, plusMinus, shots, hits, penaltyMinutes FROM `".$value["gameData"]["teams"]["home"]["name"]."`";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//print_R($row);
				//echo"<br></br>";
				array_push($playerStatsHome, $row);			
			}
		}		
		
		$matchData = array(
		"gameStats" => $value,
		"awayStats" => $playerStatsAway,
		"homeStats" => $playerStatsHome
		);	
		array_push($vientidata, $matchData);
		
	}
	echo(json_encode($vientidata, JSON_UNESCAPED_UNICODE));
	
}

?>