<?PHP

// error_reporting(0);

// global $db;
// $db = @mysql_connect('box608.bluehost.com', 'boxmydor', 'Lugle$$1234') OR die ("Error DB 34.");
// @mysql_select_db("boxmydor_test");

// function escape_data($data){
	// global $db;
	// if (ini_get('magic_quotes_gpc')){
		// $data = stripslashes($data);
	// }
	// return mysql_real_escape_string(trim($data), $db);

// }

error_reporting(0);


global $db;
$db = @mysql_connect('mysql51-028.wc1.dfw1.stabletransit.com', '387101_36734380', 'Eloise18f') OR die ("Error DB 34.");
@mysql_select_db("387101_raised");

function escape_data($data){
	global $db;
	if (ini_get('magic_quotes_gpc')){
		$data = stripslashes($data);
	}
	return mysql_real_escape_string(trim($data), $db);

}





?>