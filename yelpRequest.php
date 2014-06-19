<?php		
	
		$string = $_GET['type'];
		$address = $_GET['place'];
		

		// Enter the path that the oauth library is in relation to the php file
		require_once ('./OAuth.php');
		//$unsigned_url = "http://api.yelp.com/v2/business/the-waterboy-sacramento";
		//$unsigned_url = "http://api.yelp.com/v2/search?term=".$_POST['txtString']."&location=".$_POST['txtCountry'];		// For examaple, search for 'tacos' in 'sf'
		
		//return "http://api.yelp.com/v2/search?term=".$string."&location=".$address;

		$unsigned_url = "http://api.yelp.com/v2/search?term=".$string."&location=".$address;

		// Set your keys here
		$consumer_key = "YpWzQOi_-k1N8CIHNiuRCQ";
		$consumer_secret = "1iRf9YC2FQIgty2puaxdMMHdLrc";
		$token = "3RGTHtXKpkd6ru0r0J6Y-NYDuu0cISGF";
		$token_secret = "oaszNzW38uiYeRrZ_ck-jLGyLq8";
				
		// Token object built using the OAuth library
		$token = new OAuthToken($token, $token_secret);
				
		// Consumer object built using the OAuth library
		$consumer = new OAuthConsumer($consumer_key, $consumer_secret);
				
		// Yelp uses HMAC SHA1 encoding
		$signature_method = new OAuthSignatureMethod_HMAC_SHA1();
				
		// Build OAuth Request using the OAuth PHP library. Uses the consumer and token object created above.
		$oauthrequest = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $unsigned_url);
				
		// Sign the request
		$oauthrequest->sign_request($signature_method, $consumer, $token);
				
		// Get the signed URL
		$signed_url = $oauthrequest->to_url();
				
		// Send Yelp API Call
		$ch = curl_init($signed_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch); // Yelp response
		curl_close($ch);
				
		// Handle Yelp response data
		//$response = json_decode($data);
		$response =$data;

		echo $response;
		//prepareArray($response);
		
		

	

	
?>