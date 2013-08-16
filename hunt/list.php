<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Stunt Hunt</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<!--
/* @license
 * MyFonts Webfont Build ID 2551130, 2013-05-08T16:01:53-0400
 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s).
 * 
 * You may obtain a valid license at the URLs below.
 * 
 * Webfont: Museo 300 by exljbris
 * URL: http://www.myfonts.com/fonts/exljbris/museo/300/
 * Copyright: Copyright (c) 2008 by Jos Buivenga/exljbris. All rights reserved.
 * Licensed pageviews: Unlimited
 * 
 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2551130
 * 
 * © 2013 MyFonts Inc
*/

-->

<link rel="stylesheet" type="text/css" href="MyFontsWebfontsKit.css">
<link rel="stylesheet" type="text/css" href="css/college.css">
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">


<script src="js/libs/d3.v2.min.js"></script>

<script src="js/libs/modernizr-2.5.3.min.js"></script>
<script src="js/libs/jquery-1.7.2.min.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDDgpxglxLASkwzsSiEpcJnhoDlAeCYePA&sensor=false"></script>
    <script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(41.850033, -87.6500523)
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions-panel'));

  var control = document.getElementById('control');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
}

function calcRoute() {
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var request = {
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>

<!-- 
<script type="text/javascript" src="//use.typekit.net/pnb8lnm.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
 
<article>

 <script>

 	// Set the Map variable
	
      	var map;
      	function initialize() {	
            var myOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var all = [
            ["Tunnels", "", "39.500404", "-84.728268"], 
            ["Western Lake", "", "39.501700", "-84.727407"],
            ["Green House", "", "39.503143", "-84.725272"],
            ["Bridge", "", "39.503283", "-84.726933"],
            ["Band Stand", "", "39.502762", "-84.729846"],
			      ["Rock Wall", "", "39.502625", "-84.737957"],
            ["Fountain", "", "39.505626", "-84.731863"],
            ["The Seal", "", "39.508734", "-84.734491"],
			      ["Baseball", "", "39.513279", "-84.732351"],
            ["Score Board", "", "39.515409", "-84.733346"],
			      ["Taxidermy", "", "39.508453", "-84.733713"],
            ["Every Kiss Begins With K", "",  "39.508738", "-84.733703"],
            ["Formal Gardens", "", "39.513519", "-84.728923"],
			      ["Marckam Conference", "", "39.512620", "-84.724932"]
			      ["Turtle Power", "", "39.506425", "-84.734555"]
      	];		
      						
        var infoWindow = new google.maps.InfoWindow;
        map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
        // Set the center of the map
       	var pos = new google.maps.LatLng(39.5069, -84.7453);
		
        map.setCenter(pos);
        function infoCallback(infowindow, marker) { 
            return function() {
            infowindow.open(map, marker);
        };
   }		
	
   function setMarkers(map, all) {	
   	for (var i in all) {										
            var name 	= all[i][0];
            var clue = all[i][1];
            var lat 	= all[i][2];
            var lng 	= all[i][3];
			
            var latlngset;
            latlngset = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({  
              map: map,  title: name,  position: latlngset  
            });

            var content = '<div class="map-content"><h3>' + name + '<br />' + clue  + '<br /><a href="http://maps.google.com/?daddr=' + lat + ' ' + lng + ' " target="_self">Get Directions</a></div>'+'<form action="toPost.php" method="POST" enctype="multipart/form-data" id="photoForm"><label for="photo">Photo Upload:</label><input type="file" name="photo" id="photo" /><input type="hidden" name="user" id="user" value="user001" /><input type="submit" value="Submit!" id="submitButton" /></form>';					
            var infowindow = new google.maps.InfoWindow();
              infowindow.setContent(content);
              google.maps.event.addListener(marker, 'click', infoCallback(infowindow, marker), function() {
				infowindow.close();
				infowindow.setContent(content);
				infowindow.open(map,this)
  			  });
          }
        }	
	
        // Set all markers in the all variable
        setMarkers(map, all);
      };
      // Initializes the Google Map
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
	  $(function() {
	    $( "#tabs" ).tabs();
	  });
	  </script>
  </head>

    
  
<style>

body.listPage {
	background-image: url('img/graybackground.png');
}
.background {
  fill: none;
  pointer-events: all;
}
a.listLink {
	text-decoration: none;
}
.switcher {
	list-style-type: none;
	
}
ol {
	margin-left:-40px;
	
}

.logo {
	width:80px;
	margin-left:23px;
	margin-top:-30px;
}

li.listView {
	list-style-type: none;
	background-color: #fff;
	margin: 20px;
	padding-top: 10px;
	padding-bottom: 10px;
	box-shadow: 3px 3px 1px #888888;
	
}
span.listNumb {
	font-family: 'CollegeRegular';
	font-size: 1.2em;
	margin-right: 30px;
	color: #3e687c;
}


span.listItem {
	font-family: MuseoSans-500;
	font-size: .9em !important;
	margin-left: 30px;
	color: #000;
}

a.map:visited {
	font-family: 'CollegeRegular';
	font-size: 1.5em;	
	color:black;
	list-style:none;
}

.map {
	font-family: 'CollegeRegular';
	font-size: 1.5em;
	color:black;
	list-style:none;
	text-decoration:none;
	float:right;
	margin-top:35px;
	margin-right:24px;
}

.mapImage img{
	width:129px;
	height:95px;
	float:right;
	margin-right:18px;
	margin-top:-30px;
}
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
<body class="listPage">
	
	<?php
			echo "<div id=\"topBar\"/><a href=\"map.php\"><img id=\"backB\" src=\"img/back.png\"/></a><span class=\"listNumb\"><h3 id=\"huntTitle\">Scavenger Stunt Hunt</h3></h3></div>";
			echo '<hr>';
	?>
	<img class="logo" src="img/logo.png" />

	
	<a class="mapImage" href="map.php"><img class="mapView" src="img/map.png" /></a>
	<a class="map" href="map.php">LIST VIEW</a>
	
		
		<ol>
      <a class="listLink" href="homeRun.php"><li class="listView"><span class="listNumb">1<span class="listItem">America's Past Time</span></li></a>
      <a class="listlink" href="westernbridge.php"><li class="listView"><span class="listNumb">2<span
class="listItem">Bridge To Terabithia</span></li></a>
      <a class="listLink" href="goggin.php"><li class="listView"><span class="listNumb">3<span class="listItem">Cold Feet</span></li></a>
      <a class="listLink" href="everyKiss.php"><li class="listView"><span class="listNumb">4<span class="listItem">Every Kiss Begins With K</span></li></a>
      <a class="listLink" href="formalGardens.php"><li class="listView"><span class="listNumb">5<span class="listItem">A Formal Party</span></li></a>
      <a class="listLink" href="scoreboard.php"><li class="listView"><span class="listNumb">6<span class="listItem">Good Eatin'</span></li></a>
      <a class="listLink" href="greenhouse.php"><li class="listView"><span class="listNumb">7<span class="listItem">The Green House Effect</span></li></a>
      	<a class="listLink" href="foresttrail.php"><li class="listView"><span class="listNumb">8<span class="listItem">Out In The Woods</span></li></a>
      <a class="listLink" href="westernpond.php"><li class="listView"><span class="listNumb">9<span class="listItem">Skippin' Stones</span></li></a>
      <a class="listLink" href="fountain.php"><li class="listView"><span class="listNumb">10<span class="listItem">Splash Attack</span></li></a>
      <a class="listLink" href="taxidermy.php"><li class="listView"><span class="listNumb">11<span class="listItem">Taxidermy</span></li></a>
      <a class="listLink" href="bandstand.php"><li class="listView"><span class="listNumb">12<span class="listItem">This One Time at Band Camp</span></li></a>
      	<a class="listLink" href="starcrossed.php"><li class="listView"><span class="listNumb">13<span class="listItem">Tubular</span></li></a>
      	<a class="listLink" href="sundial.php"><li class="listView"><span class="listNumb">14<span class="listItem">Turtle Power</span></li></a>
      	<a class="listLink" href="rockwall.php"><li class="listView"><span class="listNumb">15<span class="listItem">Yodelayheehoo</span></li></a>
  		</ol>
		  
	

<script>
  function getLocation() {
			//Set an error message if user location cannot be gathered
			document.getElementById("locationFeedback").innerHTML="Your device or browser does not support location services, so your location cannot be determined.";
			if(navigator.geolocation) {
				//Location can be gathered, show a spinning wheel until it's found
				document.getElementById("locationFeedback").innerHTML="Determining your location... <img src='../img/loader.gif' />";
				navigator.geolocation.getCurrentPosition(function(position) {  
					//location found, set the hidden form values to store long/lat of the location, hide the spinning wheel, and activate the submit button
					document.getElementById("long").value = position.coords.longitude;
					document.getElementById("lat").value = position.coords.latitude;
					document.getElementById("locationFeedback").innerHTML="";
					document.getElementById("submitButton").disabled = false;
					document.getElementById("submitButton").value = "Submit!";
				});
			}
		}
	
		getLocation();
</script>

<table class="navBottom">
	<tr>
		<td><a href="stats.php"><img class="mapView" src="img/stats.png"/></a></td>
		<td><a href="profile.php"><img class="mapView" src="img/profile-1.png"/></a></td>
		<td><img class="mapView" src="img/play.png"/></td>
		</tr>
	</table>

</body>