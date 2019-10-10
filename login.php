<?php


include "db_connect.php";
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$sql = "SELECT username, password FROM user_pass";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        if($row["username"] == $_POST["Username"] and $row["password"]==$_POST["Password"])
        {
            header("Location: home.php");
            exit;
        }
    }
} 
else 
{
    header("Location: index.php");
    exit;
}

$mysqli->close();

?>