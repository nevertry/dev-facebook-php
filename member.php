<?php
include('config.php');

// Taken from : https://developers.facebook.com/docs/php/howto/example_retrieve_user_profile

$fb = new Facebook\Facebook([
  'app_id' => $config['app_id'], // Replace {app-id} with your app id
  'app_secret' => $config['app_secret'],
  'default_graph_version' => 'v2.2',
  ]);

echo "fb_access_token: ";
echo "<pre>".$_SESSION['fb_access_token']."</pre>";

try {
  // Returns a `Facebook\FacebookResponse` object
  $fieldToGet = ['id', 'name', 'email'];
  $response = $fb->get('/me?fields='.implode(',',$fieldToGet), $_SESSION['fb_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo '<pre>';
print_r($user);
echo '</pre>';

echo 'Name: ' . $user['name'];
// OR
// echo 'Name: ' . $user->getName();