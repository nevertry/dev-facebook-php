<?php
require_once('./vendor/autoload.php');

if(!session_id()) {
    session_start();
}

$config = [
	'app_id'           => '218200955626237',
	'app_secret'       => '6f6013b5523dbceb68a2a265ce46797d',
	'app_site_url'     => 'https://facebook.local',
	'app_callback_url' => 'https://facebook.local/callback.php',
];