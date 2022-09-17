<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "traveldb";


$con = new mysqli($host, $user, $pass, $db);
if($con->connect_error)
{die("Connection failed: " .$con->connect_error);
}
$sql="select countries.countryName,sites.Landmarks from sites JOIN cities ON sites.cityName=cities.cityName JOIN countries ON cities.countryName=countries.countryName;";
$result=$con->query($sql);
echo "<table border = 1>";
  echo "<tr><th>Country</th><th>Landmark</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["countryName"] .  "</td><td>" . $row["Landmarks"] . "</td></tr>";
  }

?>