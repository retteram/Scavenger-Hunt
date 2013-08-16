<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>User Profile</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="MyFontsWebfontsKit.css">
<link rel="stylesheet" type="text/css" href="css/college.css">


<script src="js/libs/d3.v2.min.js"></script>

<script src="js/libs/modernizr-2.5.3.min.js"></script>
<script src="js/libs/jquery-1.7.2.min.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDDgpxglxLASkwzsSiEpcJnhoDlAeCYePA&sensor=false"></script>
</head>

<!-- 
<script type="text/javascript" src="//use.typekit.net/pnb8lnm.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
 
<article>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style>
.navBottom {
	background-color: #000;
	width: 100%;
	position: fixed;
	bottom: 0;
	left: 0;
	padding-top: 10px;
	padding-bottom: 10px;
}
tr {
	padding-top: 10px;
	padding-bottom: 10px;
}
td {
	background-color: #000;
	padding-left: 30px;
	padding-top: 10px;
	padding-bottom: 10px;
}
img.mapView {
	width: 45px;
	height: 45px;
}
</style>
</head>
<body id="profBG">
<?php
	mysql_connect('localhost', 'esignby9_admin', 'MUohio1809!');
	$query = "SELECT * FROM `esignby9_stuntHunt`.`stuntPhotos`";
	$result = mysql_query($query);
	//Scavenger Stunt w/ User
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['key']==24) {
		//you WILL have to play with the relationship between p and h3 to get it to line up
		echo "<div id=\"topBar\"/><a href=\"map.php\"><img id=\"backB\" src=\"img/back.png\"/></a><span class=\"listNumb\"><h3 id=\"huntTitle\">Scavenger Stunt Hunt</h3></h3></div><img id=\"banner\" src=\"img/banner.png\" /><span class=\"listNumb\"><h2 id=\"userName\">".$row['user']."</h2></span><section>";
		echo '<hr>';
	}
	}
	
	$count = 0;
	$query = "SELECT * FROM `esignby9_stuntHunt`.`stuntPhotos`";
	$result = mysql_query($query);
	//total number of stunts
	while ($row = mysql_fetch_assoc($result)) {
		if (1==1) {
		$count = $count + 1;	
	}
	}
	echo "<div class=\"boxA\">";
	echo "<span class=\"listNumb\"><h3 id=\"boxNum\"><b>";
	echo $count;
	echo "</b></span><br>&nbsp;<span id=\"subTitle\" class=\"listItem\">Stunts</span></h3>";
	echo "</div>";
	
		
	$count = 0;
	$query = "SELECT * FROM `esignby9_stuntHunt`.`stuntPhotos`";
	$result = mysql_query($query);
	//number of unjudged stunts
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['judged']==0) {
		$count = $count + 1;	
	}
	}
	echo "<div class=\"boxA\">";
	echo "<span class=\"listNumb\"><h3 id=\"boxNum\"><b>";
	echo $count;
	echo "</b></span><br>&nbsp;<span id=\"subTitle\" class=\"listItem\">Waiting</span></h3>";
	echo "</div>";

	
	
	$count = 0;
	$query = "SELECT * FROM `esignby9_stuntHunt`.`stuntPhotos`";
	$result = mysql_query($query);
	//point tally
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['score']==1) {
		$count = $count + 1;	
	}
	}
	echo "<div class=\"boxA\">";
	echo "<span class=\"listNumb\"><h3 id=\"boxNum\"><b>";
	echo $count;
	echo "</b></span><br>&nbsp;<span id=\"subTitle\" class=\"listItem\">Points</span></h3>";
	echo "</div>";
	echo "<img id=\"profilePic\" src=\"img/profilePic.png\" />";
	
	echo "</section>";
?>
	<div id="midBar"></div>

<?php
	echo "<section class=\"sectionB\">";
$query = "SELECT * FROM `esignby9_stuntHunt`.`stuntPhotos`";
	$result = mysql_query($query);		
	//photos				
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['judged']==1) {
			
		echo "<img class=\"stuntPic\" src=img/".$row['photo']." /><b id=\"userText\">";
		echo $row['user'];
		echo "</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id=\"userScore\">Score:";
		echo $row['score'];
		echo "</b><br><hr class=\"normalHr\"><br>";		
	}
	}
	
	echo "</section>";
	
	echo "<span class=\"listNumb\"><h3 id=\"userName\">Stunts Not Yet Judged</h3></span>";
	echo "<section class=\"sectionB\">";	
	
	$query = "SELECT * FROM `esignby9_stuntHunt`.`stuntPhotos`";
	$result = mysql_query($query);		
	//unjudged photos				
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['judged']==0) {

		echo "<img class=\"stuntPic\" src=img/".$row['photo']." /><b id=\"userText\">";
		echo $row['user'];
		echo "</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id=\"userScore\">Not Yet Judged</b>";
		//echo $row['score'];
		echo "<br><hr class=\"normalHr\"><br>";		
	}
	}
	echo "<br><br></section>";
?>
<table class="navBottom">
	<tr>
		<td><a href="stats.php"><img class="mapView" src="img/stats.png"/></a></td>
		<td><a href="profile.php"><img class="mapView" src="img/profile-1.png"/></a></td>
		<td><img class="mapView" src="img/play.png"/></td>
		</tr>
	</table>
</body>
</html>