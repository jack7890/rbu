<?PHP
include ('../mysql.php');
require_once "Mail.php";

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$pieces = explode("/", $actual_link);


$query = "SELECT admin_ID, log, num_employ FROM companies WHERE url = '".$pieces[4]."' AND active = 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$admin_ID = $row[0];
$log = $row[1];
$num_employ_total = $row[2];

$query = "SELECT amt, num_employ FROM donations_v1 WHERE admin_ID = $admin_ID ORDER BY datetime DESC";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$total = $row[0];
$num_employ = $row[1];

if ($total == ""){
	$total = 0;
}

$percent = round($num_employ / $num_employ_total, 2) * 100;
$average = round($total / $num_employ, 0);




if ($percent >= 50){
	$totpercent = 50;
	$left = round($num_employ_total/2,0) - $num_employ;
}
else{
	$totpercent = 100;
	$left = $num_employ_total - $num_employ;
}


$list_people = "";

$query = "SELECT name, cause FROM names WHERE admin_ID = $admin_ID ORDER BY datetime DESC";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){

	$list_people .=<<<END
	 <li class="pledged__contributions__contributor"><span class="pledged__contributions__contributor-name">$row[0]</span> gave to $row[1]</li>

END;
}

print <<<END
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RBU Dashboard</title>
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
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <img class="wrapper__background" src="../img/shutterstock_140375239.jpg" alt="" />
            <section class="participation">
                <div class="participation__scale">
                    <div class="participation__scale__tick participation__scale__tick--95-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--90-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--85-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--80-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--major-tick participation__scale__tick--75-percent">75%</div>
                    <div class="participation__scale__tick participation__scale__tick--70-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--65-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--60-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--55-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--major-tick participation__scale__tick--50-percent">50%</div>
                    <div class="participation__scale__tick participation__scale__tick--45-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--40-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--35-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--30-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--major-tick participation__scale__tick--25-percent">25%</div>
                    <div class="participation__scale__tick participation__scale__tick--20-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--15-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--10-percent"></div>
                    <div class="participation__scale__tick participation__scale__tick--5-percent"></div>
                </div>
                <div class="participation__total">
                    <h1 class="participation__total__value">$percent%</h1>
                    <h2 class="participation__total__metric">participation</h2>
                </div>
                <div class="participation__fill" style="height:$percent%">
                    <h3 class="participation__fill__title">$left more people to reach $totpercent%</h3>
                </div>
            </section>
            <section class="pledged">
                <div class="pledged__total">
                    <h1 class="pledged__total__value">$$total</h1>
                    <h2 class="pledged__total__metric">pledged</h2>
                    <h3 class="pledged__total__info">Avg. donation: $$average</h3>
                </div>
            </section>
            <section class="pledged obscured">
                <div class="pledged__contributions">
                    <ol class="pledged__contributions__contributor-list">
                       
                       $list_people
                    </ol>
                    <aside class="pledged__contributions__share">
                        <h4 class="pledged__contributions__share__title">Share your contribution at:</h4>
                        <h5 class="pledged__contributions__share__url"><a href="form.html">raisedby.us/donate/$pieces/donate.php</a></h5>
                    </aside>
                </div>
            </section>
            <footer class="co-brand">
                
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../js/main.js"></script>
    </body>
</html>

		
END;

#<img src="../img/10gen_Logo_White_Large-(727x176).png" alt="10gen: The MongoDB Company" />


?>