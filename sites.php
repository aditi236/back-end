<?php

include "pdo.php";
$selected_Sites_Landmarks = $_POST["Sites_Landmarks"];
echo "<html><body>";
echo "<form action='sites.php' method='post'>";
echo "<select name='Sites_Landmarks'>";

$result = $pdo->query("SELECT DISTINCT Landmarks FROM Sites");

while ($row = $result->fetch()) {
  $Landmarks = $row["Landmarks"];
  if ($Landmarks == $selected_Sites_Landmarks) {
    $option = "<option selected>";
  } else {
    $option = "<option>";
  }
  echo $option . $Landmarks . "</option>";
}

echo "</select>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

if ($selected_Sites_Landmarks) {
  echo "<table border = 1>";
  echo "<tr><th align='left'>City</th><th align='left'>Category</th><th align='left'>Country</th><th align='left'>On Arrival Visa</th></tr>";

  $stmt = $pdo->prepare("select Sites.cityName,Sites.Catagories,countries.countryName,Countries.VisaNeeded from Sites JOIN Cities ON Sites.cityName = Cities.cityName JOIN Countries ON Cities.countryName = Countries.countryName where Landmarks=?");
  $stmt->execute([$selected_Sites_Landmarks]);

  while ($row = $stmt->fetch()) {
    echo "<tr><td>" . $row["cityName"] . "</td><td>" . $row["Catagories"] . "</td><td>" . $row["countryName"] . "</td><td>" . $row["VisaNeeded"] . "</td></tr>";
  }
}


echo "</table>";
echo "</body></html>";

?>