<?PHP
#include ('../mysql.php');

$array = array('foursquare15' => '51085fb814c51418181da27a1ced78f0', 'sailthru15' => '4961421b6c3069f72cfad9b931df614c', 'thrillist14' => '4adcc8f95350d8c33e2a3d6b39850d09', 'raisedby.us.contently.com' => 'ecb6df604a3043b68de4ab374f556bed', 'mongodb15' => '0674ec1c8b3f5399bf09edf4c4f5b649', 'shutterstock15' => '41faaa0d5e88fff973d93a839148153a');

print_r($array);

foreach ($array as $key => $value){

	$apihost = "https://www.brightfunds.org/api/companies/stats?api_key=$value";
	$contents = file_get_contents($apihost);
	$obj = json_decode($contents);



	$query = "SELECT admin_ID FROM companies WHERE url = '$key' AND active = 1 LIMIT 1";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$admin_ID = $row[0];

	$total = $obj->{'total_donation_amount'};
	$num2 = $obj->{'participant_count'};

	$query = "INSERT INTO donations_v1 (amt, num_employ, admin_ID) VALUES ('$total', '$num2', '$admin_ID')";
	$result = mysql_query($query);

	unset($obj);
}


?>