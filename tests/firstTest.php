<?php


use PHPUnit\Framework\TestCase;
//use util\SpotifyClass\spotifyResult;

include '../util/simpleSpotifyApp.php';


class firstTest extends TestCase
{
    function testIfSpotifyArtistsAreSetCorrectly()
    {
        $artists = new spotifyResult;
        $artistArray = array();
        array_push($artistArray, "billy");
        array_push($artistArray, "eyelash");
        $artists->setArtists($artistArray);
        $this->assertEquals($artistArray, $artists->getArtistNames(), "Test if spotifyResult class is set correctly");

    }

    function testIfSpotifyAlbumsAreSetCorrectly()
    {
        $albums = new spotifyResult;
        $albumArray = array();
        array_push($albumArray, "kid a");
        array_push($albumArray, "test album");
        $albums->setAlbums($albumArray);
        $this->assertEquals($albumArray, $albums->getAlbumNames(), "Test if spotifyResult class is set correctly");
    }

    function testIfSpotifyPlaylistAreSetCorrectly()
    {
        $playlists = new spotifyResult;
        $playlistArray = array();
        array_push($playlistArray, "billy");
        array_push($playlistArray, "eyelash");
        $playlists->setPlaylists($playlistArray);
        $this->assertEquals($playlistArray, $playlists->getPlaylistNames(), "Test if spotifyResult class is set correctly");
    }

    function testIfSpotifyUrisAreSetCorrectly()
    {
        $uri = new spotifyResult;
        $uriArray = array();
        array_push($uriArray, "123456789");
        array_push($uriArray, "12345");
        $uri->setPlaylists($uriArray);
        $this->assertEquals($uriArray, $uri->getPlaylistNames(), "Test if spotifyResult class is set correctly");
    }

    function testIfMusicTypeSessionVariableIsCorrect(){

        $musicType = setMusicType("artist");
        $this->assertEquals("artists", $musicType);

        $musicType = setMusicType("playlist");
        $this->assertEquals("playlists", $musicType);

        $musicType = setMusicType("album");
        $this->assertEquals("albums", $musicType);


    }

    function testChopIDFunction(){

        $result = chopID("spotify:artist:");
        $this->assertEquals("", $result);

        $result = chopID("spotify:playlist:");
        $this->assertEquals("", $result);

        $result = chopID("spotify:album:");
        $this->assertEquals("", $result);


    }


}


