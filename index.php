<!DOCTYPE html>

 <form action="login.php" method="post">
  Username:<br>
  <input type="text" name="Username"><br>
  Password:<br>
  <input type="text" name="Password"><br><br>
  <input type="submit" value="Submit">
</form> 


</html>


<?php

include "db_connect.php";
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "SELECT username, password FROM user_pass";
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