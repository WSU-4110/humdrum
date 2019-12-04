<?php
namespace SpotifyApp;
//function searchSpotify(){
if(!isset($_SESSION))
{
    session_start();
}
include "db_connect.php";
//require "C:/wamp64/www/humdrum/home.php";
$root = $_SERVER['DOCUMENT_ROOT'];
require $root. '\vendor\autoload.php';

class spotifyResult{
    public $artistNames = array();
    public $albumNames = array();
    public $playlistNames = array();
    public $uriList = array();

    public function setArtists($artistList){

        $this->artistNames = $artistList;

    }
    public function getArtistNames(): array{

        return $this->artistNames;
    }
    public function setAlbums($albumList){

        $this->albumNames = $albumList;

    }
    public function getAlbumNames(): array{

        return $this->albumNames;
    }
    public function setPlaylists($playlistList){

        $this->playlistNames = $playlistList;

    }
    public function getPlaylistNames(): array{

        return $this->playlistNames;
    }
    public function setUriList($uriList){

        $this->uriList = $uriList;

    }
    public function getURI(): array{

        return $this->uriList;
    }
}

// ======================================================
function setMusicType($searchType){
    // now get the post requests from the form in the previous page

    //$resultType = new String();
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


    return $resultType;
}

function chopID($ID)
{
    $ID = str_replace("spotify:artist:", "", $ID);
    $ID = str_replace("spotify:playlist:", "", $ID);
    $ID = str_replace("spotify:album:", "", $ID);

    return $ID;
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


// this is replaced by a function that does the same thing
    /*if($searchType == "artist")
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

    */

    $resultType = setMusicType($searchType);
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
        array_push($resultArray, $music->id);
        echo $nameArray[$iter], '  <br>';
        chopID($nameArray[$iter]);
        $iter++;

    }


// creating an instance of a class to hold the information from the spotify search
    $spotifyInstance = new spotifyResult();
    $spotifyInstance->setArtists($nameArray);
    $aristNames = array();
    $artistNames = $spotifyInstance->getArtistNames();

    $test = array();
    $test = $resultArray;

    $test = chopId($test);

    $_SESSION["SpotifyResultId"] = $test;
    $_SESSION["SpotifyResult"] = $artistNames;
//unset($_POST['SearchVal']);



    header("Location: ../home.php");
    exit;
    //return $spotifyInstance;
    //					}
}


?>


