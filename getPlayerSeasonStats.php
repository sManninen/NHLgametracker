<?php
	
if ($_REQUEST['away'] != "" && $_REQUEST['home'] != "" ) {
	def();
}
	
function def() {
	
	$teamKey = array(
	"WPG" => "winnipeg jets",
	"VGK" => "vegas golden knights",
	"WSH" => "washington capitals",
	"TBL" => "tampa bay lightning"
	);
	
	$awayTeam = $teamKey[$_REQUEST['away']];
	$homeTeam = $teamKey[$_REQUEST['home']];
		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nhlstats";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);


	$vientidata = array();

	$playerStatsAway = array();
	$playerStatsHome = array();
	
	//get away stats
	$sql = "SELECT name, position, gamesPlayed, goals, assists, points, plusMinus, shots, hits, penaltyMinutes FROM `".$awayTeam."`";
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
	$sql = "SELECT name, position, gamesPlayed, goals, assists, points, plusMinus, shots, hits, penaltyMinutes FROM `".$homeTeam."`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//print_R($row);
			//echo"<br></br>";
			array_push($playerStatsHome, $row);			
		}
	}		
	
	$playerStats = array(
	"awayStats" => $playerStatsAway,
	"homeStats" => $playerStatsHome
	);	
	array_push($vientidata, $playerStats);

	echo(json_encode($playerStats, JSON_UNESCAPED_UNICODE));
}

?>