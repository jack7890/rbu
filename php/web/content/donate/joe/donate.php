<?PHP
include ('../mysql.php');
require_once "Mail.php";


$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$pieces = explode("/", $actual_link);
$url = $pieces[4];


$query = "SELECT COUNT(*) FROM companies WHERE url = '$url' AND active = 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

if ($row[0] == 1){
	$query = "SELECT admin_ID FROM companies WHERE url = '$url' AND active = 1";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$admin_ID = $row[0];
	$submitted = escape_data(htmlspecialchars($_POST['submitted']));
	
	if ($submitted == "yes"){
		$cause = escape_data(htmlspecialchars($_POST['cause']));
		$name = escape_data(htmlspecialchars($_POST['name']));
		
		$query = "INSERT INTO names (name, cause, admin_ID) VALUES ('$name', '$cause', '$admin_ID')";
		$result = mysql_query($query);
		
		print <<<END
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RBU Share</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/leaguegothic/stylesheet.css">
        <link rel="stylesheet" href="../css/icomoon-rbu/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="../js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body class="share-form">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <footer class="co-brand">
                <img src="../img/10gen_Logo_White_Large-(727x176).png" alt="10gen: The MongoDB Company" />
                <img src="../img/rbu-logo.svg" alt="RAISEDBY.US" />
            </footer>
            <h1 class="title">UPDATED!<br><br>Enter your name and who you gave to <br>and it will appear on the site.</h1>
            <form class="form"  action="donate.php" method = "POST"><input type = "hidden" name = "submitted" value = "yes">
                <input type="text" placeholder="your name" id="name" name="name">
                <select id="cause" name="cause">
                    <option value="" selected> - select - </option>
                    <option value="Cause 1">Cause 1</option>
                    <option value="Cause 2">Cause 2</option>
                    <option value="Cause 3">Cause 3</option>
                </select>
                <span class="select-icon" data-icon="&#xe002;"></span>
                 <label for="agreement">
                  
                    By clicking submit I understand that this information will appear on screens and websites viewable by my coworkers.
                </label>
                <input type="submit">
            </form>
            <section class="social-media">
                <h2>Tell the world who you gave to.</h2>
                <a href="#" 
  onclick="
    var url='http://raisedby.us/impact/thrillist';
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(url), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" class="social-media__facebook"><span data-icon="&#xe003;"></span>Share on Facebook</a>
                <a href="https://twitter.com/share?url=http%3A%2F%2Fraisedby.us%2Fimpact%2Fthrillist" class="social-media__twitter"><span data-icon="&#xe004;"></span>Tweet</a>
            </section>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../js/vendor/jquery.icheck.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>
		
END;

		

	}
	else{
		print <<<END
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RBU Share</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/leaguegothic/stylesheet.css">
        <link rel="stylesheet" href="../css/icomoon-rbu/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="../js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body class="share-form">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <footer class="co-brand">
                <img src="../img/10gen_Logo_White_Large-(727x176).png" alt="10gen: The MongoDB Company" />
                <img src="../img/rbu-logo.svg" alt="RAISEDBY.US" />
            </footer>
            <h1 class="title">Enter your name and who you gave to <br>and it will appear on the site.</h1>
            <form class="form" action="donate.php" method = "POST"><input type = "hidden" name = "submitted" value = "yes">
                <input type="text" placeholder="your name" id="name" name="name">
                <select id="cause" name="cause">
                    <option value="" selected> - select - </option>
                    <option value="Cause 1">Cause 1</option>
                    <option value="Cause 2">Cause 2</option>
                    <option value="Cause 3">Cause 3</option>
                </select>
                <span class="select-icon" data-icon="&#xe002;"></span>
                <label for="agreement">
                  
                    By clicking submit I understand that this information will appear on screens and websites viewable by my coworkers.
                </label>
                <input type="submit">
            </form>
            <section class="social-media">
                <h2>Tell the world who you gave to.</h2>
                <a href="#" 
  onclick="
    var url='http://raisedby.us/impact/thrillist';
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(url), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" class="social-media__facebook"><span data-icon="&#xe003;"></span>Share on Facebook</a>
                <a href="https://twitter.com/share?url=http%3A%2F%2Fraisedby.us%2Fimpact%2Fthrillist" class="social-media__twitter"><span data-icon="&#xe004;"></span>Tweet</a>
            </section>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../js/vendor/jquery.icheck.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>
		
END;


	}
}
else{
	print "Error";
	

}



?>