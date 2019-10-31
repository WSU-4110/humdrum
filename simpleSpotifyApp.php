<?php 
session_start();
include "db_connect.php";

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'afb26d61a1f34dfd958e31def5798792',
    '74a1595ea6974b68bc9a10e2897750d0'
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

echo $accessToken;
$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($accessToken);

$searchVal = $_REQUEST["SearchVal"];
echo $searchVal;
// It's now possible to request data from the Spotify catalog
$results = $api->search($searchVal, 'artist');
$resultArray = array();
$iter = 0;
echo '<br>';
foreach ($results->artists->items as $artist) {
    echo $artist->name, '  <br>  ';
	array_push($resultArray, $artist->uri);
	echo $resultArray[$iter], '  <br>';
	$iter++;
	
}


$test = $resultArray[0];

$test = str_replace("spotify:artist:", "", $test);

$_SESSION["Spotify"] = $test;

echo "<br> <br> this is where the session prints:  ";
echo $_SESSION['Spotify'];
echo $_SESSION['spotify'];

header("Location: home.php");
	exit;
?>	

<iframe src="https://open.spotify.com/embed/artist/<?php echo $test;?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>

