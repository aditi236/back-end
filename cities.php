<?php

include "pdo.php";

echo "<html><body>";
echo "<form action='cities.php' method='post'>";
echo "<select name='Cities_cityName'>";
$selected_Cities_cityName = $_POST["Cities_cityName"];

$result = $pdo->query("SELECT DISTINCT cityName FROM Cities ORDER BY cityName");

while ($row = $result->fetch()) {
  $cityName = $row["cityName"];
  if ($cityName == $selected_Cities_cityName) {
    $option = "<option selected>";
  } else {
    $option = "<option>";
  }
  echo $option . $cityName . "</option>";
}

echo "</select>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

if ($selected_Cities_cityName) {
  echo "<table border = 1>";
  echo "<tr><th align='left'>Sites</th><th align='left'> Average Rating</th></tr>";
  $stmt = $pdo->prepare("select UserVisits.Landmarks, AVG(UserVisits.Rating) from UserVisits JOIN Sites ON UserVisits.Landmarks=Sites.Landmarks where Sites.cityName=? Group by UserVisits.Landmarks");
  $stmt->execute([$selected_Cities_cityName]);

  while ($row = $stmt->fetch()) {
    echo "<tr><td>" . $row["Landmarks"] . "</td><td>" . $row["AVG(UserVisits.Rating)"] . "</td></tr>";
  }
}


echo "</table>";
echo "</body></html>";

?>