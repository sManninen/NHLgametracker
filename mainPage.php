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
<table class="gameReel" id="gameReel">
<tr class="gameReelRow" id="gameReelRow">
<th valign="top" class="gameReelCell" id="gameReelCell0">
<table class="singleGame" id="singleGame0">
<colgroup><col style="width:30%"><col style="width:40%"><col style="width:30%"></colgroup> 
<tr class="teamsAndScore" id="teamsAndScore">
<td class="team" id="teamOne0"></td>
<td class="teamScore" id="teamScore0"></td>
<td class="team" id="teamTwo0"></td>
</tr>
</table>
<table class="eventList" id="eventList0">
</table>
</th>

<th valign="top" class="gameReelCell" id="gameReelCell1"><table class="singleGame" id="singleGame1"><colgroup><col style="width:30%"><col style="width:40%"><col style="width:30%"></colgroup> <tr class="teamsAndScore"><td class="team" id="teamOne1"></td><td class="teamScore" id="teamScore1"></td><td class="team" id="teamTwo1"></td></tr></table><table class="eventList" id="eventList1"></table></th>
<th valign="top" class="gameReelCell" id="gameReelCell2"><table class="singleGame" id="singleGame2"><colgroup><col style="width:30%"><col style="width:40%"><col style="width:30%"></colgroup> <tr class="teamsAndScore"><td class="team" id="teamOne2"></td><td class="teamScore" id="teamScore2"></td><td class="team" id="teamTwo2"></td></tr></table><table class="eventList" id="eventList2"></table></th>
<th valign="top" class="gameReelCell" id="gameReelCell3"><table class="singleGame" id="singleGame3"><colgroup><col style="width:30%"><col style="width:40%"><col style="width:30%"></colgroup> <tr class="teamsAndScore"><td class="team" id="teamOne3"></td><td class="teamScore" id="teamScore3"></td><td class="team" id="teamTwo3"></td></tr></table><table class="eventList" id="eventList3"></table></th>
<th valign="top" class="gameReelCell" id="gameReelCell4"><table class="singleGame" id="singleGame4"><colgroup><col style="width:30%"><col style="width:40%"><col style="width:30%"></colgroup> <tr class="teamsAndScore"><td class="team" id="teamOne4"></td><td class="teamScore" id="teamScore4"></td><td class="team" id="teamTwo4"></td></tr></table><table class="eventList" id="eventList4"></table></th>

</tr>
</table>
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