<html>
  <head><h1>WELCOME TO TRAVELS & TOURS</h1></head>
  <style>
body {background-color: powderblue; text-align:center;}
h1   {color: black;}

</style>
  <body>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "traveldb";

$dsn = "mysql:host=$host;dbname=$db";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
  echo $e->getMessage();
}

?>
</body>
</html>