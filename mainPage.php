 <!DOCTYPE HTML>
 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="mainPage.js"></script> 
 <title>Testisivu</title>

 </head>
 <body>
 
 <ul>
	<li><a class="active" href="bonecharms.php">HOME</a></li>
	<!-- <li><a href="bonecharmsList.php">BONECHARMS</a><div class="bhover"></div></li> -->
 </ul>

<div class="gameReelWrapper">
<input type="button" id="slideLeft" value="◄" class='button' ></input>

<div class="wrapper2" id="wrapper2">
<div class="gameReel" id="gameReel">

<div class="gameReelCell" id="gameReelCell0">
<div class="singleGame" id="singleGame0">
<div class="team1" id="teamOne0"></div>
<div class="teamScore" id="teamScore0"></div>
<div class="team2" id="teamTwo0"></div>
</div>
<table class="eventList" id="eventList0">
</table>
</div>

<div class="gameReelCell" id="gameReelCell1"><div class="singleGame" id="singleGame1"><div class="team1" id="teamOne1"></div><div class="teamScore" id="teamScore1"></div><div class="team2" id="teamTwo1"></div></div><table class="eventList" id="eventList1"></table></div>
<div class="gameReelCell" id="gameReelCell2"><div class="singleGame" id="singleGame2"><div class="team1" id="teamOne2"></div><div class="teamScore" id="teamScore2"></div><div class="team2" id="teamTwo2"></div></div><table class="eventList" id="eventList2"></table></div>
<div class="gameReelCell" id="gameReelCell3"><div class="singleGame" id="singleGame3"><div class="team1" id="teamOne3"></div><div class="teamScore" id="teamScore3"></div><div class="team2" id="teamTwo3"></div></div><table class="eventList" id="eventList3"></table></div>
<div class="gameReelCell" id="gameReelCell4"><div class="singleGame" id="singleGame4"><div class="team1" id="teamOne4"></div><div class="teamScore" id="teamScore4"></div><div class="team2" id="teamTwo4"></div></div><table class="eventList" id="eventList4"></table></div>
<div class="gameReelCell" id="gameReelCell5"><div class="singleGame" id="singleGame5"><div class="team1" id="teamOne5"></div><div class="teamScore" id="teamScore5"></div><div class="team2" id="teamTwo5"></div></div><table class="eventList" id="eventList5"></table></div>
<div class="gameReelCell" id="gameReelCell6"><div class="singleGame" id="singleGame6"><div class="team1" id="teamOne6"></div><div class="teamScore" id="teamScore6"></div><div class="team2" id="teamTwo6"></div></div><table class="eventList" id="eventList6"></table></div>
<div class="gameReelCell" id="gameReelCell7"><div class="singleGame" id="singleGame7"><div class="team1" id="teamOne7"></div><div class="teamScore" id="teamScore7"></div><div class="team2" id="teamTwo7"></div></div><table class="eventList" id="eventList7"></table></div>
<div class="gameReelCell" id="gameReelCell8"><div class="singleGame" id="singleGame8"><div class="team1" id="teamOne8"></div><div class="teamScore" id="teamScore8"></div><div class="team2" id="teamTwo8"></div></div><table class="eventList" id="eventList8"></table></div>
<div class="gameReelCell" id="gameReelCell9"><div class="singleGame" id="singleGame9"><div class="team1" id="teamOne9"></div><div class="teamScore" id="teamScore9"></div><div class="team2" id="teamTwo9"></div></div><table class="eventList" id="eventList9"></table></div>
<div class="gameReelCell" id="gameReelCell10"><div class="singleGame" id="singleGame10"><div class="team1" id="teamOne10"></div><div class="teamScore" id="teamScore10"></div><div class="team2" id="teamTwo10"></div></div><table class="eventList" id="eventList10"></table></div>
<div class="gameReelCell" id="gameReelCell11"><div class="singleGame" id="singleGame11"><div class="team1" id="teamOne11"></div><div class="teamScore" id="teamScore11"></div><div class="team2" id="teamTwo11"></div></div><table class="eventList" id="eventList11"></table></div>
<div class="gameReelCell" id="gameReelCell12"><div class="singleGame" id="singleGame12"><div class="team1" id="teamOne12"></div><div class="teamScore" id="teamScore12"></div><div class="team2" id="teamTwo12"></div></div><table class="eventList" id="eventList12"></table></div>
<div class="gameReelCell" id="gameReelCell13"><div class="singleGame" id="singleGame13"><div class="team1" id="teamOne13"></div><div class="teamScore" id="teamScore13"></div><div class="team2" id="teamTwo13"></div></div><table class="eventList" id="eventList13"></table></div>
<div class="gameReelCell" id="gameReelCell14"><div class="singleGame" id="singleGame14"><div class="team1" id="teamOne14"></div><div class="teamScore" id="teamScore14"></div><div class="team2" id="teamTwo14"></div></div><table class="eventList" id="eventList14"></table></div>
<div class="gameReelCell" id="gameReelCell15"><div class="singleGame" id="singleGame15"><div class="team1" id="teamOne15"></div><div class="teamScore" id="teamScore15"></div><div class="team2" id="teamTwo15"></div></div><table class="eventList" id="eventList15"></table></div>
<div class="gameReelCell" id="gameReelCell16"><div class="singleGame" id="singleGame16"><div class="team1" id="teamOne16"></div><div class="teamScore" id="teamScore16"></div><div class="team2" id="teamTwo16"></div></div><table class="eventList" id="eventList16"></table></div>

</div>
</div>

<input type="button" id="slideRight" value="►" class='button' ></input>
</div>

<div class="content" id="content">

<table class="statTable" id="statTableAway" style="float:left">
<tr id="keyRow">
<td>Player</td><td>POS</td><td>GP</td><td>G</td><td>A</td><td>P</td><td>+/-</td><td>S</td><td>H</td><td>PIM</td>
</tr>
</table>

<table class="statTable" id="statTableHome" style="float:right">
<tr id="keyRow">
<td>Player</td><td>POS</td><td>GP</td><td>G</td><td>A</td><td>P</td><td>+/-</td><td>S</td><td>H</td><td>PIM</td>
</tr>
</table>

</div>

<div class="footer" id="footer">
</div>

</body>
</html>