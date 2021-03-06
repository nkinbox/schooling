
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
		<title>Distance Calculator</title>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
		<style type="text/css">
			#map_canvas { 
				height: 100%;
			}
		</style>
		<script type="text/javascript">
		var directionDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;
		
		function initialize() {
			directionsDisplay = new google.maps.DirectionsRenderer();
			var melbourne = new google.maps.LatLng(-37.813187, 144.96298);
			var myOptions = {
				zoom:12,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center: melbourne
			}

			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			directionsDisplay.setMap(map);
		}

		function calcRoute() {
			var start = document.getElementById("start").value;
			var end = document.getElementById("end").value;
			var distanceInput = document.getElementById("distance");
			
			var request = {
				origin:start, 
				destination:end,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
					distanceInput.value = response.routes[0].legs[0].distance.value / 1000;
				}
			});
		}
		</script>
	</head>
	<body onload="initialize()">
		<div>
			<p>
				<label for="start">Start: </label>
				<input type="text" name="start" id="start" />
				
				<label for="end">End: </label>
				<input type="text" name="end" id="end" />
				
				<input type="submit" value="Calculate Route" onclick="calcRoute()" />
			</p>
			<p>
				<label for="distance">Distance (km): </label>
				<input type="text" name="distance" id="distance" readonly="true" />
			</p>
		</div>
		<div id="map_canvas"></div>
	</body>
</html>
