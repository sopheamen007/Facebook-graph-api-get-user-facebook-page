<?php 
session_start();
require_once __DIR__ . '/Facebook/autoload.php';

$fb = new \Facebook\Facebook([
  'app_id' => '1145321875517395',
  'app_secret' => '2ecf70ed6ffb20481a5f5cc8920bab53',
  'default_graph_version' => 'v2.8',
]);

   $permissions = []; // optional
   $helper = $fb->getRedirectLoginHelper();
   $accessToken = $helper->getAccessToken();
   
if (isset($accessToken)) {
	
 		$url = "https://graph.facebook.com/v2.8/me/accounts?access_token={$accessToken}";
		$headers = array("Content-type: application/json");
		
			 
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $url);
	         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		   
		 $st=curl_exec($ch); 
		 $result=json_decode($st,TRUE);
		 echo "<pre>";
		 var_dump($result['data']);
		 echo "</pre>";
		 // foreach ($result['data'] as $item) {
		 // 	echo "<center>";
		 // 	echo "<h3>Page Name: ".$item['name']." Page ID :".$item['id']."</h3>";
		 // 	echo "</center>";
		 // }
		 
		 
		 
		

} else {

	$loginUrl = $helper->getLoginUrl('http://localhost/Facebook-User-Facebook-Page/', $permissions);
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
	