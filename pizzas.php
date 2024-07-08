<?php
session_start();
echo $_SESSION['email'];
echo $_SESSION['title'];
echo $_SESSION['ingredients'];
require "vendor/autoload.php";
$client = new \MongoDB\Client("mongodb://localhost:27017");
$pizzadb = $client->pizzadb;
$result1 = $pizzadb->createCollection('pizzacollection');
var_dump($result1);

?>
<!DOCTYPE html>
<html lang="en">
<?php include('layout/header.php')?>

<?php include('layout/footer.php')?>
</html>