<?php
// Skip these two lines if you're using Composer
define('FACEBOOK', '/facebook/src/Facebook/');
require __DIR__ . '/facebook/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\GraphLocation;

FacebookSession::setDefaultApplication('app id','app secret');

$session = new FacebookSession('access token');
$request = new FacebookRequest(
  $session,
  'GET',
  '/892043704200316/conversations'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
for ($i=0; $i < 100; $i++) { 
	var_dump($graphObject->getProperty('data')->getProperty("" . $i)->getProperty('snippet'));
}
?>