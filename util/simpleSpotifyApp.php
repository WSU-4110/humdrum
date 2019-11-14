<?php 
//function searchSpotify(){
if(!isset($_SESSION))
    {
	session_start();
    }
include "db_connect.php";
//require "C:/wamp64/www/humdrum/home.php";
require 'C:/wamp64/www/humdrum/vendor/autoload.php';

class spotifyResult{
	public $artistNames = array();
	public $albumNames = array();
	public $uri = array();
	
	public function setArtists($artistList){
		echo "this is inside the function " . $artistList[2];
		$this->artistNames = $artistList;
		echo "<br>". $this->artistNames[2];
	}
	public function getArtistNames(): array{
		echo $this->artistNames[2];
		return $this->artistNames;
	}
}


if(isset($_POST['SearchVal'])){
// ========================================
$sql = "SELECT * FROM SpotifyKey";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$SpotifyKey = $row["AccessToken"];
//echo $SpotifyKey;


$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($SpotifyKey);
$searchVal = $_REQUEST["SearchVal"];
echo $searchVal;
// It's now possible to request data from the Spotify catalog
$results = $api->search($searchVal, 'artist');
$resultArray = array();
$nameArray = array();


$iter = 0;
echo '<br>';
foreach ($results->artists->items as $artist) {
	array_push($nameArray, $artist->name);
	//$spotifyInstance->addArtist($artist->name);
    //echo $spotifyInstance->artistName[$iter], '  <br>  ';
	array_push($resultArray, $artist->uri);
	echo $nameArray[$iter], '  <br>';
	$iter++;
	
}


// creating an instance of a class to hold the information from the spotify search
$spotifyInstance = new spotifyResult();
$spotifyInstance->setArtists($nameArray);
$aristNames = array();
$artistNames = $spotifyInstance->getArtistNames();

$test = $resultArray[0];

$test = str_replace("spotify:artist:", "", $test);

$_SESSION["Spotify"] = $test;
$_SESSION["SpotifyResult"] = $artistNames;
//unset($_POST['SearchVal']);


header("Location: ../home.php");
	exit;
	//return $spotifyInstance;
		//					}
}


?>

<!-- <iframe src="https://open.spotify.com/embed/artist/
<?php echo $test;?>" width="300" height="380" frameborder="0" 
allowtransparency="true" allow="encrypted-media"></iframe> -->

