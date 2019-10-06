<html>
<head>
<body>
<h1>humdrum login test</h1>

<?php

$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "test";

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);


if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$sql = "SELECT username, password FROM user_login";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>" . "username: " . $row["username"]. " - password: " . $row["password"]. "<br>";
    }
} else {
    echo "wrong password or username";
}
$mysqli->close();

?>

</head>
</body>

</html>