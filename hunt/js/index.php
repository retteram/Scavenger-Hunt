<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title> Data Visualization</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

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
            ["Silos", "I hold grain and I'm tall, Climb me and Don't fall", "39.509107", "-84.748095"], 
            ["Alumni Roof", "I'm often in the Public Eye, Go real high until I Underlie", "39.50789", "-84.736371"],
            ["Stables", "Go down the Rocky Path and Bring a Carrot, Find a big creature with whom you can share it", "39.508643", "-84.723923"],
            ["Ghost", "In your car you will go, Flash your lights down low, Three times a charm in the dead of night, Do it correctly and you'll see a fright", "39.557396", "-84.702922"],
            ["Skatepark", "A meeting place of kids of twenty, Grab a board there will be plenty, Do a trick a drop a flip, Show your skills but don't dare trip", "39.506549", "-84.754366"],
			["Hueston Woods", "Ferocious and Fierce a creature once stood, No need to be careful, it would bite you if it could", "39.582308", "-84.761839"],
            ["Lake", "Down and Deep the muck sticks heavy, go as far as you can and grab as much as you can levy", "39.577181", "-84.752741"],
            ["High Dive", "This particular challenge will make such a splash, Do the highest level and make a quick dash", "39.502654", "-84.738482"],
			["Cemetery", "I was born here and I died then, Find me and become my friend", "39.49664", "-84.727938"],
            ["Baseball Field", "Enter here and put on your cap, If your friend hits it home give him a clap, Be aware of the hours though, If you make a scene the police will show", "39.513229", "-84.73242"],
            ["Cold Feet", "Slippery, Slidy, Glistening Ice, Doesn't it sound nice? Why not take off your shoes, If you don't, you will loose", "39.503498", "-84.737034"],
			["Taxidermy", "Stuffed and Hung according to species, find the right one and it's yours for keepsies", "39.508453", "-84.733713"],
            ["Upham", "Find someone you like, A friend, A lover, Even if it's raining you will have a cover",  "39.508738", "-84.733703"],
            ["Krishna", "Do you dare to up your level? If 6 is the maximum, 20s the devil", "39.510634", "-84.743546"],
			["Covered Bridge", "All you must do is prove you were there, many don't know this game is unfair", "39.523984", "-84.734762"]
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

            var content = '<div class="map-content"><h3>' + clue  + '<br /><a href="http://maps.google.com/?daddr=' + lat + ' ' + lng + ' " target="_self">Get Directions</a></div>'+'<form action="toPost.php" method="POST" enctype="multipart/form-data" id="photoForm"><label for="photo">Photo Upload:</label><input type="file" name="photo" id="photo" /><input type="hidden" name="user" id="user" value="user001" /><input type="submit" value="Submit!" id="submitButton" /></form>';					
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

.background {
  fill: none;
  pointer-events: all;
}


#map {
	width:1000px;
	height:600px;
	border:solid;
	border-radius:20px;
	border-color:black;
	border-radius:10px;
	border-width:2px;
	margin-left: 50px;
	margin-top: 50px;

}


</style>
<body>
	<div id="tabs">
		<ul>
		    <li><a href="#tabs-1">Map</a></li>
		    <li><a href="#tabs-2">List</a></li>
		  </ul>
		
		<div id="tabs-1">
			<div id="map_canvas" style="height: 500px; width: 800px;"></div>
			
			<input form="photoForm" type="hidden" name="lat" value="" id="lat" /><input form="photoForm" type="hidden" name="long" value="" id="long" />
			</form>
		    
		  </div>
		  <div id="tabs-2">
		    <h1>List View</h1>
	
		
		  </div>
		
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
<a href="profile.php">Profile</a>
<a href="stats.php">Stats</a>
    <p id="locationFeedback" style="visibility:hidden">
        Determining your location... <img src="../img/loader.gif" />
    </p>
</body>
</html>