<?php
include('config.php');

// Taken from: https://developers.facebook.com/docs/php/howto/example_facebook_login

$fb = new Facebook\Facebook([
  'app_id' => $config['app_id'], // Replace {app-id} with your app id
  'app_secret' => $config['app_secret'],
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($config['app_callback_url'], $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';