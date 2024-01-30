<?php
if (!session_id()) {
	session_start();
} ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>This is redirect page</title>
</head>

<body>
	<?php

	require_once 'conection/index.php';
	if (isset($_GET)) {
		foreach ($_GET as $key => $val) {
			$l = mysqli_real_escape_string($con, $key);
			$l = str_replace('/', '', $l);
			$res = mysqli_query($con, "select link from shorturl where short_link='$l' and status='1'");
			$count = mysqli_num_rows($res);
			if ($count > 0) {
				$row = mysqli_fetch_assoc($res);
				$link = $row['link'];
				mysqli_query($con, "update shorturl set hit_count=hit_count+1 where short_link='$l'");

				$row_shorturl = mysqli_fetch_assoc($con->query("SELECT * FROM `shorturl` where `short_link`='$l'"));
				if ($row_shorturl['short_link'] == $l) {


					// get personal ip address
					// get personal ip address
					// get personal ip address


					//Language
					if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
						$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
						$language = str_replace("'", "\'", $language);
					}


					//Browser
					if (isset($_SERVER['HTTP_SEC_CH_UA'])) {
						$browser = explode(";", $_SERVER['HTTP_SEC_CH_UA'])[0];
						$browser = str_replace("'", "\'", $browser);
					} elseif (isset($_SERVER['HTTP_USER_AGENT'])) {
						$browser = explode("(", $_SERVER['HTTP_USER_AGENT'])[0];
						$browser = str_replace("'", "\'", $browser);
					}


					//platform
					if (isset($_SERVER['HTTP_SEC_CH_UA_PLATFORM'])) {
						$platform = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'];
						$platform = str_replace("'", "\'", $platform);
					} elseif (isset($_SERVER['HTTP_USER_AGENT'])) {
						$platform = explode("(", $_SERVER['HTTP_USER_AGENT'])[1];
						$platform = explode(")", $_SERVER['HTTP_USER_AGENT'])[0];

						$platform = str_replace("'", "\'", $platform);
					}


					//Remote Address
					if (isset($_SERVER['REMOTE_ADDR'])) {
						$remote_ip = $_SERVER['REMOTE_ADDR'];
						$remote_ip = str_replace("'", "\'", $remote_ip);
					}


					//Remote port
					if (isset($_SERVER['REMOTE_PORT'])) {
						$remote_port = $_SERVER['REMOTE_PORT'];
						$remote_port = str_replace("'", "\'", $remote_port);
					}


					//user who created link
					$user_type =  $_SESSION['user_admin'] = $row_shorturl['user_type'];
					$user_type = str_replace("'", "\'", $user_type);


					//link come form
					$url = $_SESSION['url'] = $l;
					$url = str_replace("'", "\'", $url);





					$ch = curl_init('http://ipwhois.app/json/' . $remote_ip);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$json = curl_exec($ch);
					curl_close($ch);
					// Decode JSON response
					$geoLocationData = json_decode($json, true);
					//print_r($geoLocationData);
					// Country code output, field "country_code"


					//country		
					$country =  $geoLocationData['country'];
					$country = str_replace("'", "\'", $country);

					//country code	
					$country_code = $geoLocationData['country_code'];
					$country_code = str_replace("'", "\'", $country_code);

					//ip version
					$ip_version = $geoLocationData['type'];
					$ip_version = str_replace("'", "\'", $ip_version);

					//country_capital
					$country_capital = $geoLocationData['country_capital'];
					$country_capital = str_replace("'", "\'", $country_capital);

					//country_phone
					$country_phone = $geoLocationData['country_phone'];
					$country_phone = str_replace("'", "\'", $country_phone);

					//org
					$org = $geoLocationData['org'];
					$org = str_replace("'", "\'", $org);

					//isp
					$isp = $geoLocationData['isp'];
					$isp = str_replace("'", "\'", $isp);

					//timezone
					$timezone = $geoLocationData['timezone'];
					$timezone = str_replace("'", "\'", $timezone);

					//timezone_name
					$timezone_name = $geoLocationData['timezone_name'];
					$timezone_name = str_replace("'", "\'", $timezone_name);

					//currency_symbol
					$currency_symbol = $geoLocationData['currency_symbol'];
					$currency_symbol = str_replace("'", "\'", $currency_symbol);

					//currency_rates
					$currency_rates = $geoLocationData['currency_rates'];
					$currency_rates = str_replace("'", "\'", $currency_rates);
					//city
					$city = $geoLocationData['city'];
					$city = str_replace("'", "\'", $city);
					//region
					$region = $geoLocationData['region'];
					$region = str_replace("'", "\'", $region);

					//country_flag
					$country_flag = $geoLocationData['country_flag'];
					$country_flag = str_replace("'", "\'", $country_flag);

					//continent
					$continent = $geoLocationData['continent'];
					$continent = str_replace("'", "\'", $continent);

					//currency_plural
					$currency_plural = $geoLocationData['currency_plural'];
					$currency_plural = str_replace("'", "\'", $currency_plural);

					if ($con->query("INSERT `information` SET `user_type`='$user_type',`url`='$url',`language`='$language',`browser`='$browser',`platform`='$platform',`remote_ip`='$remote_ip',`remote_port`='$remote_port',`country`='$country',`country_code`='$country_code',`ip_version`='$ip_version',`country_capital`='$country_capital',`country_phone`='$country_phone',`org`='$org',`isp`='$isp',`timezone`='$timezone',`timezone_name`='$timezone_name',`currency_symbol`='$currency_symbol',`currency_rates`='$currency_rates',`city`='$city',`region`='$region',`country_flag`='$country_flag',`continent`='$continent',`currency_plural`='$currency_plural'")) {
						header('location:' . $link);
					} else {
						echo 'query worng';
					}

					// end get personal ip address
					// end get personal ip address
					// end get personal ip address

				} else {
					echo ('<script>window.location.href="/home"</script>');
				}




				//echo "we are Success";
				die();
			} else {
				echo ('<script>window.location.href="/home"</script>');
				//echo 'in database not found';
			}
		}
		//print_r($_GET);

		if (!$_GET) {
			echo ('<script>window.location.href="/home"</script>');
			//echo 'not found get';
		}
	} else {
		echo ('<script>window.location.href="/home"</script>');
		//echo "Something Wrong";
	}
	?>
</body>

</html>