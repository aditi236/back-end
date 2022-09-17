<?php

include "pdo.php";


echo "<html><body>";
echo "<form action='users.php' method='post'>";
echo "<select name='UserVisits_userName'>";
$selected_UserVisits_userName = $_POST["UserVisits_userName"];

$result = $pdo->query("SELECT DISTINCT userName FROM UserVisits ORDER BY userName");

while ($row = $result->fetch()) {
  $userName = $row["userName"];
  if ($userName == $selected_UserVisits_userName) {
    $option = "<option selected>";
  } else {
    $option = "<option>";
  }
  echo $option . $userName . "</option>";
}

echo "</select>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

if ($selected_UserVisits_userName) {
  echo "<table border = 1>";
  echo "<tr><th align='left'>User Name</th><th align='left'>Visited Sites</th><th align='left'>Rating</th></tr>";

  $stmt = $pdo->prepare("SELECT userName,Landmarks,Rating FROM UserVisits WHERE userName = ? order by Rating desc");
  $stmt->execute([$selected_UserVisits_userName]);

  while ($row = $stmt->fetch()) {
    echo "<tr><td>" . $row["userName"] . "</td><td>" . $row["Landmarks"] ."</td><td>" . $row["Rating"] . "</td></tr>";
  }
}


echo "</table>";
echo "</body></html>";

?>