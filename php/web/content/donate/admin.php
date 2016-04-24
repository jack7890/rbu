<?PHP
include ('mysql.php');
require_once "Mail.php";

$turnofflogo = 1;
###ADD IN HTML

#error_reporting(E_ALL);
#
#ini_set('display_errors', true);


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

if ($submitted == "yes"){
	$name = escape_data(htmlspecialchars($_POST['name']));
	$url = escape_data(htmlspecialchars($_POST['url']));
	$num = escape_data(htmlspecialchars($_POST['num']));
	$email = escape_data(htmlspecialchars($_POST['email']));
	
	$query = "INSERT INTO companies (company, email, url, num_employ) VALUES ('$name', '$email','$url','$num')";
	$result = mysql_query($query);
	
	$query = "SELECT MAX(admin_ID) FROM companies WHERE company = '$name'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$admin_ID = $row[0];
	
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if (((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 20000)
	&& in_array($extension, $allowedExts)) || $turnofflogo == 1)
	  {
	  if ($_FILES["file"]["error"] > 0  && $turnofflogo <> 1)
		{
			$error = "File upload error. Please click <href='admin.php'>here</a> and try again.";
		}
	  else
		{
		if (file_exists("logo/$admin_ID" ."_". $_FILES["file"]["name"])  && $turnofflogo <> 1)
		  {
			$error = "File already exists. Change name. Please click <href='admin.php'>here</a> and try again.";
		  }
		else
		  {
			if ($turnofflogo <> 1){
				move_uploaded_file($_FILES["file"]["tmp_name"],"logo/$admin_ID" ."_". $_FILES["file"]["name"]);
				$filename = "$admin_ID" ."_". $_FILES["file"]["name"];
			}
			else{
				$filename = "";
			}
			  
			  $query = "SELECT count(*) FROM companies WHERE url = '$url' AND active = 1";
			  $result = mysql_query($query);
			  $row = mysql_fetch_array($result);
			  if ($row[0] > 0){
				$error = "URL already taken. Please click <href='admin.php'>here</a> and try again.";
				
			  }
			  else{
					mkdir($url, 0777, true);
					copy("master/index.php", "$url/index.php");
					copy("master/donate.php", "$url/donate.php");
					
					$password = get_rand_id(10);
					
					$error = "Created. Your password is $password. You will get an email with this as well. The url to update your donation information is http://www.raisedby.us/donate/admin_update.php?p=$password . Your monitor screen can be found at http://www.raisedby.us/donate/$url/index.php and your employees can vist http://www.raisedby.us/donate/$url to indicate where they donated.";
					
					
					$query = "UPDATE companies SET log = '$filename', password = '$password', active = 1 WHERE admin_ID = $admin_ID";
					$result = mysql_query($query);
					
					$message = $error;

					$to      = $email;

					$subject = "Create";

					
					$host = "smtp.gmail.com";
					$username = "info@raisedby.us";
					$password = "nytech66";

					$headers = array ('From' => "Raisedby.us",
					  'To' => $to,
					  'Subject' => $subject);
					$smtp = Mail::factory('smtp',
					  array ('host' => $host,
					  'port' => '587',
						'auth' => true,
						'username' => $username,
						'password' => $password));
					 
					$mail = $smtp->send($to, $headers, $message);
					
					
					
			  }
		  }
		}
	  }
	else
	  {
		$error = "Invalid file type and size. Please click <href='admin.php'>here</a> and try again.";
	  }
	print $error;
}
else{

	###<label for="file">Employer Logo:</label><input type="file" name="file" id="file"><br>
	##take out
	
	print <<<END
		<html>
			<head>
			<title>
				Admin Page
			</title>
			</head>
			<body>
				<form method = "POST" action = "admin.php" enctype="multipart/form-data"><input type ="hidden" name = "submitted" value = "yes">
				<label for="name">Employer Name:</label><input type="text" name="name" id="name"><br>
				<label for="url">Requested URL:</label><input type="text" name="url" id="url"><br>
				
				<label for="num"># of Employees:</label><input type="text" name="num" id="num"><br>
				<label for="email">Contact Email:</label><input type="text" name="email" id="email"><br>
				<input type="submit" name="submit" value="Submit">
				
				</form>
			
			</body>
		</html>
	
END;


}



?>