<?php
use PHPUnit\Framework\TestCase;
$_SESSION["user_id"] = "tjsase";
include '../profile.php';
// include 'profile_details.php';
include "../util/db_connect.php";
$sql = "SELECT * FROM user_pass";
$result = $mysqli->query($sql);
class ProfileDetailsTest extends TestCase
{

    public function testShowBio()
    {
        $this->assertNull(ProfileDetails::showBio("tjsase", "Bio Test"));
    }

    public function testPostNum()
    {
        include "../util/db_connect.php";
        $sql = "SELECT * FROM user_pass";
        $result = $mysqli->query($sql);
        $this->assertNotNull(ProfileDetails::postNum($result,"tjsase"));
    }

    public function testUploadProfilePic()
    {
        $this->assertNull(ProfileDetails::uploadProfilePic("tjsase"));
    }

    public function testShowFollowers()
    {
        include "../util/db_connect.php";
        $this->assertNull(ProfileDetails::showFollowers($mysqli, "tjsase"));
    }

    public function testShowPlaylists()
    {
        include "../util/db_connect.php";
        $this->assertNull(ProfileDetails::showPlaylists($mysqli, "tjsase"));
    }

    public function testShowFollowing()
    {
        include "../util/db_connect.php";
        $this->assertNull(ProfileDetails::showFollowing($mysqli, "tjsase"));
    }
}
