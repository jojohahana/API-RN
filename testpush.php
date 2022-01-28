<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAAMyqpmzA:APA91bE0Ku6WBANP7HAFffnVLpHkOGQzuE_bMNSp3eZpw6vJCJj-ButeMAvZhI_tUi3RmQ0G9t38YcCtLNESonVPe4FZR3Skcl4j9al9y6FAJwVg7wrpxPkwBoYRmEPYEsJgrSDHhv86' );


//$registrationIds = array( $_GET['id'] );
$token1 = "euUDmzLEQDi5q6LjOe65KB:APA91bHDbzNFl4C1a6U3OsFCnl0AOcFRm2JvBdHlsPT-KKNcOMT2d9uA6jq4u_ixiHpwAnJ2RnnqaM1ls4nd4FemGDs7y_n3hlYOgAG-GT73sZQJIDh3X6ZCHW2SZ-RP0Wfwin7ay-Cc";

// prep the bundle
$msg = array
(
	//'message' 	=> 'here is a message. message',
    'body'      => 'here is a message. message 1',
	'title'		=> 'This is a title. title',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon',
    'icon'      => 'ic_launcher'
);

$fields = array
(
	//'registration_ids' 	=> $registrationIds,
	//'data'			=> $msg
    'to'        => $token1,
    'priority'  => 'high',
    'notification'  => $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;