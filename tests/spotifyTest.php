<?php

 use PHPUnit\Framework\TestCase;
class spotifyErrTest extends \PHPUnit_Framework_TestCase
{
	public function spotifyError() {
		$musicId = 'SpotifyResultI';
		if ($musicId != 'SpotifyResultId')
			{
			return 'incorrect spotify ID';
			}
	}
	
	public function testSpotify()
	{
		$this->assertSame('incorrect spotify ID', $this->spotifyError());
	}
	
	
}