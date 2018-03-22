<?php require_once('admin_panel/includes/function.php');
global $GFH_Admin;
	$schoolid=$_POST['schoolid'];

	$schools=$GFH_Admin->getSchool($schoolid);
	$school=mysqli_fetch_assoc($schools);
	$address=$school['address'];
	$distance = distaceCalc($latitude, $longitude,$address,"K");
echo $distance;

function distaceCalc($latitude,$longitude,$address,$unit)
{
	// $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
	//     $outputFrom = json_decode($geocodeFrom);
	    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
	    $outputTo = json_decode($geocodeTo);
	    
	    //Get latitude and longitude from geo data
	    // $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
	    // $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
	    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
	    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
	    
	    //Calculate distance from latitude and longitude
	    $theta = $longitude - $longitudeTo;
	    $dist = sin(deg2rad($latitude)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitude)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
	    $dist = acos($dist);
	    $dist = rad2deg($dist);
	    $miles = $dist * 60 * 1.1515;
	    $unit = strtoupper($unit);
	    if ($unit == "K") {
	        return ($miles * 1.609344).' km';
	    } else if ($unit == "N") {
	        return ($miles * 0.8684).' nm';
	    } else {
	        return $miles.' mi';
	    }
}

?>