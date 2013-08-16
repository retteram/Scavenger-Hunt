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
    <style>
		.windowText{margin-bottom:-100px !important;}
	</style>
    
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
			      ["Turtle Power", "", "39.503768", "-84.737061"]
      	];					
        var infoWindow = new google.maps.InfoWindow;
        map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
        
        // Turn on HTML5 geolocation
 
  if(navigator.geolocation) {  		
  	navigator.geolocation.getCurrentPosition(function(position) {
      	var you = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
                                       
                                       
             var marker2 = new google.maps.Marker({  
              map: map,
              position: you,
              icon:'user.png',
              animation:google.maps.Animation.BOUNCE   
            });
            map.setCenter(marker2.getPosition());
        });
	}
        
        // Set the center of the map

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
        		map: map,
                title: name,
              	position: latlngset,
              	icon:'stunticon.png'  
            });

            var content = '<div class="map-content"><h6>' + name + '<br />' + clue + '<br /><a href="http://maps.google.com/?daddr=' + lat + ' ' + lng + ' " target="_self">Get Directions</a></div>'+'<form action="toPost.php" method="POST" enctype="multipart/form-data" id="photoForm"><label for="photo">Photo Upload:</label><input type="file" name="photo" id="photo" /><input type="hidden" name="user" id="user" value="user001" /><input type="submit" value="Submit!" id="submitButton" /></form>';					
            var infowindow = new google.maps.InfoWindow();
              infowindow.setContent(content);
              google.maps.event.addListener(marker, 'click', (function(marker, content) {
            return function() {
                infowindow.setContent(content);
                infowindow.open(map, marker);
            }
        })(marker, content));
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

  </head>

    
  
<style>

.background {
  fill: none;
  pointer-events: all;
}

body.mapPage {
	background-image: url('img/graybackground.png');
}

.switcher {
	list-style-type: none;
}
ol li {
	font-family: College;
}
span.listItem {
	font-family: Museo;
}
div.shape2 {
	background-color: #000;
	width: 100%;
	height: 100px;
	position: fixed;
	bottom: 0;
	left: 0;
}
div img.mapView {
	width: 100px;
	margin-right: 15px;
	margin-left: 15px;
	height: auto;
	float: left;
}
.banner{
	margin-left:25px;
	width:80px;	
}
.map {
	margin-top: 10px;
}

.navBottom {
	background-color: #000;
	width: 150%;
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
	padding-left: 15px;
	padding-top: 10px;
	padding-bottom: 10px;
}
img.mapView {
	width: 60px;
	height: 60px;
}
img.listIcon {
	width: 80px;
	float: right;
	margin-right: -73px;
}

.mapBar{
	width:130% !important;	
}

#mapBanner{margin-top:-30px;}

#mapListIcon{margin-left:100%;margin-top:-95px;}


</style>
<body class="mapPage">
	
	<?php
			echo "<div id=\"topBar\" class=\"mapBar\"/><a href=\"index.html\"><img id=\"backB\" src=\"img/back.png\"/></a><span class=\"listNumb\"><h3 id=\"huntTitle\">Scavenger Stunt Hunt</h3></h3></div>";
			echo '<hr>';
	?>
<img id="mapBanner" class="banner" src="img/logo.png" />
<a href="list.php"><img id="mapListIcon" class="listIcon" src="img/list.png" /></a>
		 
		 
		
	
			<div class="map" id="map_canvas" style="height: 300px; width: 130%;"></div>
			
			<input form="photoForm" type="hidden" name="lat" value="" id="lat" /><input form="photoForm" type="hidden" name="long" value="" id="long" />
			</form>
		    
		  </div>
	

	

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
<p id="locationFeedback" style="visibility:hidden">
Determining your location... <img src="../img/loader.gif" />
</p>
</ul>
</body>
</html>