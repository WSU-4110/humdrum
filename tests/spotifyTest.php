<?php

 use PHPUnit\Framework\TestCase;
class spotifyErrTest extends TestCase
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