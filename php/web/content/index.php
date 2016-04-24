<?php
define('ROOT_DIR', '../../');
require ROOT_DIR . 'vendor/autoload.php';
require ROOT_DIR . 'lib/Causes.php';
date_default_timezone_set('America/New_York');
$app = new \Slim\Slim();
$app->config(array(
	'templates.path' => ROOT_DIR . 'views',
	'data.causes'    => ROOT_DIR . 'data/causes.csv'
));
$app->view->setData(array(
	'showGetInvolved'  => true,
	'title'            => 'Workspace Giving',
	'linkPrefix'       => '/index.php/',
	'resPrefix'        => '/',
	'path'	           => rtrim($app->request->getResourceUri(), '/'),
	'scripts'          => array(),
	'socialLinkParams' => array(
		'facebook'     => http_build_query(array(
			'u'        => 'http://raisedby.us/',
		)),
		'google'       => http_build_query(array(
			'url'      => 'http://raisedby.us/',
		)),
		'twitter'      => http_build_query(array(
			'url'      => 'http://raisedby.us/',
			'text'     => 'RaisedBy.Us, a new philanthropic initiative for startups. Learn more at',
		)),
	)
));

$app->get('/', function () use ($app){
	$app->render('index.html', array(
		'showGetInvolved' => false
	));
});

$app->get('/workplace-giving/', function () use ($app){
	$app->render('workplace-giving.html');
});

$app->get('/education/', function () use ($app){
	$app->render('education.html', array(
		'title' => 'Education Programs'
	));
});

$app->get('/ambassadors/', function () use ($app){
	$app->render('ambassadors.html', array(
		'title' => 'Ambassador Programs'
	));
});

$app->get('/causes(/)(/:id)(/)', function ($id = 0) use ($app){
	$causes = new Causes($app->config('data.causes'));
	$app->render('causes.html', array(
		'title'      => 'Causes',
		'categories' => $causes->getCategories(),
		'selCause'   => $id,
		'causes'     => $causes->getCauses($id),
		'scripts'    => array(
			'js/vendor/jquery.sticky-kit.min.js',
			'js/causes.js'
		)
	));
});

$app->get('/faq/', function () use ($app){
	$app->render('faq.html', array(
		'title' => 'Frequently Asked Questions',
		'scripts'    => array(
			'js/faq.js'
		)
	));
});

$app->get('/get-involved/', function () use ($app){
	$app->render('get-involved.html', array(
		'title' => 'Get Involved',
		'showGetInvolved' => false
	));
});

$app->get('/terms/', function () use ($app){
	$app->render('terms.html', array(
		'title' => 'Terms of Use'
	));
});

$app->get('/privacy/', function () use ($app){
	$app->render('privacy.html', array(
		'title' => 'Privacy Policy'
	));
});

$app->run();