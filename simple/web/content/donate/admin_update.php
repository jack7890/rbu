<?PHP
include ('mysql.php');
require_once "Mail.php";

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= $num;
   }
  }
return $rand_id;
} 

$submitted = $_POST['submitted'];
$flag = "";

$password = $_REQUEST['p'];

$query = "SELECT COUNT(*) FROM companies WHERE password = '$password' AND active = 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if ($row[0] == 1){
	$query = "SELECT admin_ID FROM companies WHERE password = '$password' AND active = 1";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$admin_ID = $row[0];

	if ($submitted == "yes"){
		$total = escape_data(htmlspecialchars($_POST['total']));
		$num2 = escape_data(htmlspecialchars($_POST['num']));
		
		$query = "INSERT INTO donations_v1 (amt, num_employ, admin_ID) VALUES ('$total', '$num2', '$admin_ID')";
		$result = mysql_query($query);
		
		print "Updated.";
		

	}
	else{
		print <<<END
			<html>
				<head>
				<title>
					Admin Page
				</title>
				</head>
				<body>
					<form method = "POST" action = "admin_update.php?p=$password" enctype="multipart/form-data"><input type ="hidden" name = "submitted" value = "yes"><input type ="hidden" name = "admin_ID" value = "$admin_ID">
					<label for="total">Total Donation:</label><input type="text" name="total" id="total"> - Only enter numbers WITHOUT commas or dollar signs<br>
					<label for="num"># Donated Employees:</label><input type="text" name="num" id="num"> - Only enter numbers, Make sure number entered does not exceed total number of employees<br>
					<input type="submit" name="submit" value="Submit">
					
					</form>
				
				</body>
			</html>
		
END;


	}
}
else{
	print "Invalid Password";
}



?>