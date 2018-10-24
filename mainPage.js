window.onload = function() {
	
	//style for active cell
	var activeCell = document.getElementById("gameReelCell0");
	activeCell.style.borderColor = "red";

// get and display nhl gamedata
data =  {'action': "getStats"};
    $.post('getstats.php', data, function (response) {
		var result = JSON.parse(response);
		var gameCount = result.length -1;
	
	if(gameCount >= 0) {		
		//fill stat-table
		var statTableAway = document.getElementById("statTableAway");
		var statTableHome = document.getElementById("statTableHome");
		
		//fill away-table
		for(i = 0; i < result[0].awayStats.length; i++){
			var newRow = statTableAway.insertRow(-1);
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].name;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].position;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].gamesPlayed;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].goals;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].assists;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].points;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].plusMinus;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].shots;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].hits;
			newRow.insertCell(-1).innerHTML = result[0].awayStats[i].penaltyMinutes;
		}
		
		//fill home-table
		for(i = 0; i < result[0].homeStats.length; i++){
			var newRow = statTableHome.insertRow(-1);
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].name;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].position;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].gamesPlayed;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].goals;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].assists;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].points;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].plusMinus;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].shots;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].hits;
			newRow.insertCell(-1).innerHTML = result[0].homeStats[i].penaltyMinutes;
			
		}
		
		
		// fill the gamereel
		for(i = 0; i <= gameCount; i++){		
			for(j = 0; j < result[i].gameStats.liveData.plays.allPlays.length; j++){
				var table = document.getElementById("eventList"+i);
				var team1 = document.getElementById("teamOne"+i);
				var teamScore = document.getElementById("teamScore"+i);
				var team2 = document.getElementById("teamTwo"+i);
				
				team1.innerHTML = result[i].gameStats.gameData.teams.away.triCode;
				teamScore.innerHTML = result[i].gameStats.liveData.plays.currentPlay.about.goals.away+"\xa0\xa0\xa0-\xa0\xa0\xa0"+result[i].gameStats.liveData.plays.currentPlay.about.goals.home;
				team2.innerHTML = result[i].gameStats.gameData.teams.home.triCode;
				
				if(result[i].gameStats.liveData.plays.allPlays[j].result.event == "Goal"){			
					
					var row = table.insertRow(-1);
					var cell = row.insertCell(0);			
								
					var team;
					var scorer;
					var assist1;
					var assist2;
					
					team = result[i].gameStats.liveData.plays.allPlays[j].team.triCode;
					scorer = result[i].gameStats.liveData.plays.allPlays[j].players[0].player.fullName;
					if (result[i].gameStats.liveData.plays.allPlays[j].players[1].playerType == "Assist"){
						assist1 = (result[i].gameStats.liveData.plays.allPlays[j].players[1].player.fullName);
					} else { assist1 = ""}
					if (result[i].gameStats.liveData.plays.allPlays[j].players[2].playerType == "Assist"){
						assist2 = (", "+result[i].gameStats.liveData.plays.allPlays[j].players[2].player.fullName);
					} else { assist2 = ""}
								
					cell.innerHTML = ("("+team+")"+" "+scorer+"<br>"+assist1+assist2);
				}
			}	
		}
	}
			
});


//get stats for clicked game
$('.gameReelCell').click(function(){
	
	//style for active cell	
	activeCell.style.borderColor = "white";
	this.style.borderColor = "red";	
	activeCell = this;
	
	
	//get team names of selected game
	var team1td = $('.singleGame .teamsAndScore .team1', this);
	var team2td = $('.singleGame .teamsAndScore .team2', this);	
	var team1 = $(team1td).html();
	var team2 = $(team2td).html();
		
	data =  {'away': team1, 'home': team2};
    $.post('getPlayerSeasonStats.php', data, function (response) {
		var result = JSON.parse(response);
		console.log(result);
		
		//fill away-table
		$("#statTableAway tr:not(#keyRow)").remove();
		
		for(i = 0; i < result.awayStats.length; i++){
			var newRow = statTableAway.insertRow(-1);
			newRow.insertCell(-1).innerHTML = result.awayStats[i].name;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].position;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].gamesPlayed;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].goals;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].assists;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].points;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].plusMinus;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].shots;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].hits;
			newRow.insertCell(-1).innerHTML = result.awayStats[i].penaltyMinutes;
		}
		
		//fill home-table
		$("#statTableHome tr:not(#keyRow)").remove();
		
			for(i = 0; i < result.homeStats.length; i++){
			var newRow = statTableHome.insertRow(-1);
			newRow.insertCell(-1).innerHTML = result.homeStats[i].name;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].position;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].gamesPlayed;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].goals;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].assists;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].points;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].plusMinus;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].shots;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].hits;
			newRow.insertCell(-1).innerHTML = result.homeStats[i].penaltyMinutes;
		}
		
		
	});
	
});

//slide the gamereel. Needs conditions
$("#slideLeft").click(function(){
    $("#gameReel").filter(':not(:animated)').animate({left: '-=358px'},{queue: false});
});
$("#slideRight").click(function(){
    $("#gameReel").filter(':not(:animated)').animate({left: '+=358px'},{queue: false});
}); 

}