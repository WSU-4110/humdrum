<?php 
//function searchSpotify(){
if(!isset($_SESSION))
    {
	session_start();
    }
include "db_connect.php";
//require "C:/wamp64/www/humdrum/home.php";
//require 'C:/wamp64/www/humdrum/vendor/autoload.php';
require '../vendor/autoload.php';

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
/*
$sql = "SELECT * FROM SpotifyKey";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
		$SpotifyKey = $row["AccessToken"];}
//echo $SpotifyKey;
*/
$SpotifyKey = $_SESSION["accessToken"];

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($SpotifyKey);

// now get the post requests from the form in the previous page
$searchVal = $_REQUEST["SearchVal"];
$searchType = $_REQUEST["searchType"];

if($searchType == "artist")
{
	$resultType = "artists";
	$_SESSION["musicType"] = "artist";}

else if($searchType == "album"){
	$resultType = "albums";
	$_SESSION["musicType"] = "album";}
else {
	$resultType = "playlists";
	$_SESSION["musicType"] = "playlist";}
echo $searchVal;
// It's now possible to request data from the Spotify catalog
$results = $api->search($searchVal, $searchType);
$resultArray = array();
$nameArray = array();


$iter = 0;
echo '<br>';
foreach ($results->$resultType->items as $music) {
	array_push($nameArray, $music->name);
	//$spotifyInstance->addArtist($artist->name);
    //echo $spotifyInstance->artistName[$iter], '  <br>  ';
	array_push($resultArray, $music->uri);
	echo $nameArray[$iter], '  <br>';
	$iter++;
	
}
/*
foreach ($results->$searchType->items as $artist) {
	array_push($nameArray, $artist->name);
	//$spotifyInstance->addArtist($artist->name);
    //echo $spotifyInstance->artistName[$iter], '  <br>  ';
	array_push($resultArray, $artist->uri);
	echo $nameArray[$iter], '  <br>';
	$iter++;
	
}


*/

// creating an instance of a class to hold the information from the spotify search
$spotifyInstance = new spotifyResult();
$spotifyInstance->setArtists($nameArray);
$aristNames = array();
$artistNames = $spotifyInstance->getArtistNames();

$test = array();
$test = $resultArray;

$test = str_replace("spotify:artist:", "", $test);
$test = str_replace("spotify:playlist:", "", $test);
$test = str_replace("spotify:album:", "", $test);

$_SESSION["SpotifyResultId"] = $test;
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

