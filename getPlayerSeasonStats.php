<?php
	
if ($_REQUEST['away'] != "" && $_REQUEST['home'] != "" ) {
	def();
}
	
function def() {
	
	$teamKey = array(
	"NJD" => "new jersey devils",
	"NYI" => "new york islanders",
	"NYR" => "new york rangers",
	"PHI" => "philadelphia flyers",
	"PIT" => "pittsburgh penguins",
	"BOS" => "boston bruins",
	"BUF" => "buffalo sabres",
	"MTL" => "montréal canadiens",
	"OTT" => "ottawa senators",
	"TOR" => "toronto maple leafs",
	"CAR" => "carolina hurricanes",
	"FLA" => "florida panthers",
	"TBL" => "tampa bay lightning",
	"WSH" => "washington capitals",
	"CHI" => "chicago blackhawks",
	"DET" => "detroit red wings",
	"NSH" => "nashville predators",
	"STL" => "st. louis blues",
	"CGY" => "calgary flames",
	"COL" => "colorado avalanche",
	"EDM" => "edmonton oilers",
	"VAN" => "vancouver canucks",
	"ANA" => "anaheim ducks",
	"DAL" => "dallas stars",
	"LAK" => "los angeles kings",
	"SJS" => "san jose sharks",
	"CBJ" => "columbus blue jackets",
	"MIN" => "minnesota wild",
	"WPG" => "winnipeg jets",
	"ARI" => "arizona coyotes",
	"VGK" => "vegas golden knights"
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