<?php

use humdrum\util;

use PHPUnit\Framework\TestCase;
//use util\SpotifyClass\spotifyResult;
$root = $_SERVER['DOCUMENT_ROOT'];
//include $root. '/util/simpleSpotifyApp.php';
include 'simpleSpotifyApp.php';


class firstTest extends TestCase
{
    function testIfSpotifyArtistsAreSetCorrectly()
    {
        $artists = new \humdrum\util\spotifyResult();
        $artistArray = array();
        array_push($artistArray, "billy");
        array_push($artistArray, "eyelash");
        $artists->setArtists($artistArray);
        $this->assertEquals($artistArray, $artists->getArtistNames(), "Test if spotifyResult class is set correctly");

    }

    function testIfSpotifyAlbumsAreSetCorrectly()
    {
        $albums = new \humdrum\util\spotifyResult();
        $albumArray = array();
        array_push($albumArray, "kid a");
        array_push($albumArray, "test album");
        $albums->setAlbums($albumArray);
        $this->assertEquals($albumArray, $albums->getAlbumNames(), "Test if spotifyResult class is set correctly");
    }

    function testIfSpotifyPlaylistAreSetCorrectly()
    {
        $playlists = new \humdrum\util\spotifyResult();
        $playlistArray = array();
        array_push($playlistArray, "billy");
        array_push($playlistArray, "eyelash");
        $playlists->setPlaylists($playlistArray);
        $this->assertEquals($playlistArray, $playlists->getPlaylistNames(), "Test if spotifyResult class is set correctly");
    }

    function testIfSpotifyUrisAreSetCorrectly()
    {
        $uri = new \humdrum\util\spotifyResult();
        $uriArray = array();
        array_push($uriArray, "123456789");
        array_push($uriArray, "12345");
        $uri->setPlaylists($uriArray);
        $this->assertEquals($uriArray, $uri->getPlaylistNames(), "Test if spotifyResult class is set correctly");
    }

    function testIfMusicTypeSessionVariableIsCorrect(){

        $musicType = \humdrum\util\setMusicType("artist");
        $this->assertEquals("artists", $musicType);

        $musicType = \humdrum\util\setMusicType("playlist");
        $this->assertEquals("playlists", $musicType);

        $musicType = \humdrum\util\setMusicType("album");
        $this->assertEquals("albums", $musicType);


    }

    function testChopIDFunction(){

        $result = \humdrum\util\chopID("spotify:artist:");
        $this->assertEquals("", $result);

        $result = \humdrum\util\chopID("spotify:playlist:");
        $this->assertEquals("", $result);

        $result = \humdrum\util\chopID("spotify:album:");
        $this->assertEquals("", $result);


    }


}


